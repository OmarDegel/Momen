<?php

namespace App\Http\Controllers\Api;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use App\Services\CartItemsService;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CartItemRequest;
use App\Http\Resources\CartCollection;

class CartController extends MainController
{
    protected $cartItemsService;

    public function __construct(CartItemsService $cartItemsService)
    {
        $this->cartItemsService = $cartItemsService;
    }


    public function index()
    {
        $auth = Auth()->guard('api')->user();
        $cart = Cart::where('user_id', $auth->id)->first();
        if (!$cart) {
            return $this->messageError(__('site.cart_is_empty'), 404);
        }
        $cartItems = CartItem::with('product', 'productChild')->where('cart_id', $cart->id)->paginate($this->perPage);
        $extra = $this->cartItemsService->getExtraInCollection($cart->id);
        return $this->sendDataCollection(new CartCollection($cartItems), __('site.cart_items'), $extra);
    }

    public function store(CartItemRequest $request)
    {
        $auth = auth()->guard('api')->user();

        $result = $this->cartItemsService->addOrUpdateItem(
            $auth->id,
            $request->product_id,
            $request->amount
        );

        if ($result !== true) {
            return $this->messageError($result);
        }

        return $this->messageSuccess(__('site.cart_item_added'));
    }
    public function destroy($id)
    {
        $auth = Auth()->guard('api')->user();
        $cart = Cart::where('user_id', $auth->id)->first();
        $cartItem = CartItem::where('cart_id', $cart->id)->where('id', $id)->first();
        if (!$cartItem) {
            return $this->messageError(__('site.cart_item_not_found'), 404);
        }
        $cartItem->delete();
        return $this->messageSuccess(__('site.cart_item_deleted'));
    }
}
