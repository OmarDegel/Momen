<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use App\Enums\StatusOrderEnum;
use App\Services\OrderService;
use App\Exceptions\OrderException;
use App\Services\CartItemsService;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\OrderResource;
use App\Http\Requests\Api\OrderRequest;
use App\Http\Resources\OrderCollection;
use App\Http\Requests\Api\OrderNowRequest;

class OrderController extends MainController
{
    protected $orderService, $cartItemsService;
    public function __construct(OrderService $orderService, CartItemsService $cartItemsService)
    {
        $this->orderService = $orderService;
        $this->cartItemsService = $cartItemsService;
    }
    public function index()
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $relations = [
            'user',
            'address',
            'delivery',
            'payment',
            'deliveryTime',
            'coupon',
            'region',
            'city',
            'orderReject',
        ];
        $orders = $user->orders()->with($relations)->paginate($this->perPage);
        return $this->sendDataCollection(new OrderCollection($orders));
    }
    public function store(OrderRequest $request)
    {
        try {
            $user = auth()->guard('api')->user();
            $data = $request->validated();

            $this->orderService->canCreateOrder($user->id);

            if (!empty($data['coupon_code'])) {
                $this->orderService->handleCoupon($data['coupon_code'], $user);
            }

            $this->orderService->handleCreatingOrder($data, $user);

            return $this->messageSuccess(__('api.order_success'));
        } catch (OrderException $e) {
            return $this->messageError($e->getMessage());
        }
    }

    public function show(string $id)
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $relations = [
            'user',
            'address',
            'delivery',
            'payment',
            'deliveryTime',
            'orderItems.product',
            'orderItems.productChild',
            'orderItems.OrderItemReturn',
            'orderItems.OrderItemReturn.reason',
            'orderItemReturns.reason',
            'coupon',
            'region',
            'city',
            'orderReject',
        ];
        $order = $user->orders()->with($relations)->where('id', $id)->first();
        if (!$order) {
            return $this->messageError(__('api.order_not_found'));
        }
        return $this->sendData(new OrderResource($order));
    }
    public function cancel(string $id)
    {
        $auth = Auth()->guard('api')->user();
        $user = User::find($auth->id);
        $order = $user->orders()->where('id', $id)->first();
        if (!$order) {
            return $this->messageError(__('api.order_not_found'));
        }
        $canCancel = $this->orderService->canCancelOrder($order->status->value);
        if ($canCancel !== true) {
            return $this->messageError($canCancel);
        }

        DB::transaction(function () use ($order) {
            $order->update([
                'status' => StatusOrderEnum::Canceled->value,
            ]);
        });

        return $this->messageSuccess(__('api.order_updated'));
    }

    public function buyNow(OrderNowRequest $request)
    {
        try {
            $user = auth()->guard('api')->user();
            $data = $request->validated();

            $orderData = $this->orderService->prepareBuyNowData($user, $data);

            $this->orderService->canCreateOrderForBuyNow($orderData);

            $this->orderService->handleCreatingOrder($orderData, $user);

            return $this->messageSuccess(__('api.order_success'));
        } catch (OrderException $e) {
            return $this->messageError($e->getMessage());
        }
    }
    public function reOrder(string $id)
    {
        $user = auth()->guard('api')->user();

        $order = $user->orders()->where('id', $id)->first();
        if (!$order) {
            return $this->messageError(__('api.order_not_found'));
        }

        $messages = [];

        DB::transaction(function () use ($order, $user, &$messages) {
            $cart = $user->cart;
            if (!$cart) {
                $cart = $user->cart()->create(['type' => 'cart']);
            } else {
                $cart->cartItems()->delete();
            }

            $items = $order->orderItems()->get();

            foreach ($items as $item) {
                $productId = $item->product_child_id ?? $item->product_id;

                $canPlaceProductInCart = $this->cartItemsService
                    ->canPlaceProductInCart($productId, $item->amount, $user->id);

                if ($canPlaceProductInCart === true) {
                    $cartItemData = $this->cartItemsService->getCartItem($productId, $item->amount);
                    $cart->cartItems()->create($cartItemData);
                } else {
                    $messages[] = $canPlaceProductInCart;
                }
            }
        });

        if (!empty($messages)) {
            return $this->messageError(__('Some products could not be added:' . implode(', ', $messages)));
        }

        return $this->messageSuccess(__('api.cart_reordered_success'));
    }
}
