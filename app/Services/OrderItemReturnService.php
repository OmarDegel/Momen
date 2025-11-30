<?php

namespace App\Services;

use App\Models\Order;
use App\Models\Product;
use App\Models\Setting;
use App\Models\OrderItem;
use App\Models\OrderItemReturn;
use Illuminate\Support\Facades\DB;
use App\Enums\StatusOrderItemReturnEnum;
use App\Exceptions\OrderReturnException;

class OrderItemReturnService
{
    protected $imageService;
    public function __construct(ImageHandlerService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function canReturn($orderItemId, $amount)
    {
        $orderItem = OrderItem::find($orderItemId);
        $product = Product::find($orderItem->product_id);
        $return_period_days = Setting::where('key', 'return_period_days')->first();
        if ($product == null) {
            throw new OrderReturnException(__('api.product_not_found'));
        }
        if ($product->is_return == 0) {
            throw new OrderReturnException(__('api.product_not_return'));
        }
        if ($return_period_days == null) {
            throw new OrderReturnException(__('api.return_period_days_not_found'));
        } else {
            if (now()->diffInDays($orderItem->created_at) > $return_period_days->value) {
                throw new OrderReturnException(__('api.return_period_days_expired'));
            }
        }
        if ($orderItem->amount < $amount) {
            throw new OrderReturnException(__('api.amount_not_enough'));
        }
        if ($orderItem->amount_return > $amount) {
            throw new OrderReturnException(__('api.amount_return_not_enough'));
        }
    }
    public function handleReturn($request, $user)
    {
        try {
            DB::transaction(function () use ($request, $user) {
                $data = [];
                $orderItem = OrderItem::find($request->order_item_id);
                $product = Product::find($orderItem->product_id);
                $order = Order::find($orderItem->order_id);
                //data
                $data['user_id'] = $user->id;
                $data['order_id'] = $orderItem->order_id;
                $data['order_item_id'] = $orderItem->id;
                $data['reason_id'] = $request->reason_id ?? null;
                $data['coupon_id'] = $request->coupon_id ?? null;
                //amount
                $data['amount'] = $request->amount;
                $data['offer_amount'] = $product->offer_amount;
                $data['offer_amount_add'] = $product->offer_amount_add;
                $data['free_amount'] = $this->calculateFreeAmount($product->id, $request->amount);
                $data['total_amount'] = $data['amount'] + $data['free_amount'];
                //price
                $data['price'] = $product->price;
                $data['offer_price'] = $product->offer_price;
                $data['total'] = $data['offer_price'] > 0 ? ($data['offer_price'] * $data['total_amount']) : ($data['price'] * $data['total_amount']);
                //return
                $data['price_return'] = $data['price'] * $data['amount'];
                $data['total_price_return'] = $data['total'] * $data['amount'];
                //coupon
                $data['coupon_type'] = $order->coupon_type ?? null;
                $data['coupon_discount'] = $order->coupon_discount ?? null;
                $data['coupon_discount_return'] = $data['coupon_discount'] * $data['amount'];
                //note
                $data['note'] = $request->note ?? null;
                //image
                $imageUrl = $this->imageService->uploadImage('order_item_returns', $request);
                $data['image'] = $imageUrl['image'] ?? null;
                //save
                $orderItemReturn = OrderItemReturn::create($data);
            });
        } catch (\Throwable $th) {
            throw new OrderReturnException($th->getMessage());
        }
    }
    public function calculateFreeAmount($productId, $amount)
    {
        $product = Product::find($productId);
        if ($product->offer_amount > 0 && $product->offer_amount_add > 0) {
            $freeAmount = intval($amount / $product->offer_amount) * $product->offer_amount_add;
            return $freeAmount;
        }
        return 0;
    }

    public function canCancel($status)
    {
        if (in_array($status, [StatusOrderItemReturnEnum::Request->value, StatusOrderItemReturnEnum::Delivered->value, StatusOrderItemReturnEnum::Pending->value])) {
            return true;
        }
        return false;
    }
}
