<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Product;
use App\Models\Setting;

class CartItemsService
{
    public function getExtraInCollection($cartId)
    {
        $cart = Cart::find($cartId);
        return [
            'total' => $cart->cartItems->sum('total'),
            'total_price' => $cart->cartItems->sum('total_price'),
            'total_items' => $cart->cartItems->count(),
        ];
    }

    public function canPlaceProductInCart($productId, $amount, $userId)
    {
        $product = Product::find($productId);

        if ($product->children()->exists()) {
            return __('api.you_must_choose_from_children', ['product_name' => $product->nameLang()]);
        }
        if (! $product->active) {
            return __('api.product_not_active', ['product_name' => $product->nameLang()]);
        }
        if ($product->is_stock == 0) {
            return __('api.product_not_available_amount', ['product_name' => $product->nameLang()]);
        }
        if ($amount > $product->order_max) {
            return __('api.max_order', ['max_order' => $product->max_order]);
        }
        if ($amount < $product->order_limit) {
            return __('api.order_limit', ['order_limit' => $product->order_limit]);
        }

        $maxOrder = Setting::where('key', 'max_order')->first();


        if ($maxOrder < $amount) {
            return __('api.max_order', ['max_order' => $maxOrder]);
        }

        return true;
    }

    public function calculateFreeAmount($productId, $amount)
    {
        $product = Product::find($productId);

        if ($product->offer_amount > 0 && $product->offer_amount_add > 0) {
            return intval($amount / $product->offer_amount) * $product->offer_amount_add;
        }

        return 0;
    }

    public function getCartItem($productId, $amount)
    {
        $product = Product::find($productId);

        $data = [];

        if ($product->parent_id) {
            $data['product_id'] = $product->parent_id;
            $data['product_child_id'] = $product->id;
        } else {
            $data['product_id'] = $product->id;
            $data['product_child_id'] = null;
        }

        $data['offer_price'] = $product->offer_price;
        $data['price'] = $product->price;
        $data['amount'] = $amount;

        $data['offer_amount'] = $product->offer_amount;
        $data['offer_amount_add'] = $product->offer_amount_add;

        $data['free_amount'] = $this->calculateFreeAmount($productId, $amount);
        $data['total_amount'] = $data['amount'] + $data['free_amount'];

        $data['total'] = $data['offer_price'] > 0
            ? ($data['offer_price'] * $data['total_amount'])
            : ($data['price'] * $data['total_amount']);

        $data['total_price'] = $product->price * $amount;
        $data['shipping'] = $product->shipping;
        $data['is_return'] = $product->is_returned;

        $returnPeriodDays =  Setting::where('key', 'return_period_days')->first();;

        $data['return_at'] = $data['is_return'] == 1
            ? now()->addDays($returnPeriodDays)
            : null;

        return $data;
    }

    public function addOrUpdateItem($userId, $productId, $amount)
    {
        $validate = $this->canPlaceProductInCart($productId, $amount, $userId);
        if ($validate !== true) {
            return $validate;
        }

        $cart = Cart::firstOrCreate(
            ['user_id' => $userId],
            ['type' => 'cart']
        );

        $cartItem = $cart->cartItems()
            ->where(function ($q) use ($productId) {
                $q->where('product_id', $productId)
                    ->orWhere('product_child_id', $productId);
            })
            ->first();

        if ($cartItem && $amount <= 0) {
            $cartItem->delete();
            return true;
        }

        if ($cartItem) {
            $cartItem->amount = $amount;
            $cartItem->free_amount = $this->calculateFreeAmount($productId, $amount);
            $cartItem->total_amount = $cartItem->amount + $cartItem->free_amount;
            $cartItem->total = ($cartItem->offer_price > 0 ? $cartItem->offer_price : $cartItem->price)
                * $cartItem->total_amount;
            $cartItem->total_price = $cartItem->price * $amount;

            $cartItem->save();
            return true;
        }

        if ($amount > 0) {
            $cart->cartItems()->create(
                $this->getCartItem($productId, $amount)
            );
        }

        return true;
    }
}
