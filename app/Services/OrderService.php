<?php

namespace App\Services;

use App\Models\User;
use App\Models\Coupon;
use App\Models\Address;
use App\Models\Product;
use App\Enums\StatusOrderEnum;
use App\Exceptions\OrderException;
use App\Services\CartItemsService;
use Illuminate\Support\Facades\DB;

class OrderService
{
    public function  canCreateOrder($userId)
    {
        $user = User::find($userId);


        if (!$user->cart || $user->cart->cartItems->isEmpty()) {
            throw new OrderException(__('api.cart_is_empty'));
        }
        $totalPrice = $user->totalPriceInCart();
        if ($user->addresses()->count() == 0) {
            throw new OrderException(__('api.address_not_found'));
        }

        return true;
    }
    public function handleCoupon($code, $user)
    {
        $coupon = Coupon::where('code', $code)->ValidCoupons()->first();
        if (!$coupon) {
            throw new OrderException(__('api.coupon_not_found'));
        }
        if ($coupon->orders()->where('user_id', $user->id)->count() >= $coupon->user_limit) {
            throw new OrderException(__('api.coupon_limit'));
        }
        if ($coupon->min_order > $user->totalPriceInCart()) {
            return __('api.coupon_min_order', ['min_order' => $coupon->min_order]);
        }
        return true;
    }
    public function handleCreatingOrder($data, $user)
    {
        return DB::transaction(function () use ($user, $data) {

            $data['address_id'] = $this->getAddressId($user->id, $data['address_id'] ?? null);
            $data['city_id'] = $this->getCityID($data['address_id']);
            $data['region_id'] = $this->getRegionID($data['address_id']);
            $data['price'] = $user->totalPriceInCartBeforeDiscount();
            $data['shipping'] = $this->getShippingAddress($data['address_id'], $user->id);

            $couponData = $this->getDataCouponInOrder($data['coupon_code'] ?? null);
            $data = array_merge($data, $couponData);

            $data['discount'] = !empty($data['coupon_code'])
                ? $this->getOrderDiscount($user->id, $data['coupon_type'], $data['coupon_discount'])
                : 0;

            $data['total'] = $data['price'] + $data['shipping'] - $data['discount'];

            $order = $user->orders()->create($data);
            if (isset($data['buy_now']) && $data['buy_now'] == 1) {
                $order->orderItems()->createMany($data['items']);
            } else {
                $items = $user->cart->cartItems;

                $order->orderItems()->createMany($items->toArray());


                $user->cart->delete();
            }


            return $order;
        });
    }

    public function getDataCouponInOrder($couponCode)
    {
        if (empty($code)) {
            return [
                'coupon_id'       => null,
                'coupon_type'     => null,
                'coupon_discount' => null,
            ];
        }
        if ($couponCode) {
            $coupon = Coupon::where('code', $couponCode)->ValidCoupons()->first();
            if (!$coupon) {
                return [];
            }
            return [
                'coupon_id' => $coupon->id,
                'coupon_type' => $coupon->type,
                'coupon_discount' => $coupon->discount,
            ];
        }
        return [];
    }
    public function getOrderDiscount($userId, ?string $couponType = null, ?float $couponDiscount = null)
    {
        if ($couponType === null || $couponDiscount === null) {
            return 0;
        }

        $user = User::find($userId);

        $price = $user->totalPriceInCartBeforeDiscount();

        if ($couponType === 'percent') {
            return round(($price * $couponDiscount) / 100);
        }

        if ($couponType === 'fixed') {
            return round($couponDiscount);
        }

        return 0;
    }

    public function getCityID($addressId)
    {
        $address = Address::find($addressId);
        if (!$address) {
            throw new OrderException(__('api.address_not_found'));
        }
        return $address->city_id;
    }
    public function getRegionID($addressId)
    {
        $address = Address::find($addressId);
        if (!$address) {
            throw new OrderException(__('api.address_not_found'));
        }
        return $address->region_id;
    }
    public function getAddressId($userId, $addressId)
    {
        if ($addressId) {
            $address = Address::find($addressId);
            if (!$address) {
                throw new OrderException(__('api.address_not_found'));
            }
            return $addressId;
        }
        $user = User::find($userId);
        $address = $user->addresses()->where('is_main', 1)->first();
        return $address->id;
    }
    public function getShippingAddress($addressId, $userId)
    {
        $user = User::find($userId);
        $address = $user->addresses()->where('id', $addressId)->first();
        $shipping = $address->city->shipping;
        if ($address->region_id) {
            $shipping += $address->region->shipping;
        }
        return $shipping;
    }
    public function canCancelOrder($status)
    {
        if (in_array($status, [StatusOrderEnum::Request->value, StatusOrderEnum::Delivered->value, StatusOrderEnum::Approved->value, StatusOrderEnum::PreparingFinished->value, StatusOrderEnum::Pending->value])) {
            return true;
        }
        return __('api.order_cannot_cancel');
    }

    public function prepareBuyNowData($user, $data)
    {
        $cartItemsService = new CartItemsService();
        $itemData = $cartItemsService->getCartItem($data['product_id'], $data['quantity']);

        if (!empty($data['product_child_id'])) {
            $itemData['product_child_id'] = $data['product_child_id'];
        }

        return [
            'items' => [$itemData],
            'address_id' => $data['address_id'] ?? null,
            'coupon_code' => $data['coupon_code'] ?? null,
            'buy_now' => 1
        ];
    }

    public function calculateBuyNowItemPrice($data)
    {
        $product = Product::find($data['product_id']);
        $price = $product->price;
        if (!empty($data['product_child_id'])) {
            $child = Product::find($data['product_child_id']);
            $price = $child->price;
        }
        return $price * $data['quantity'];
    }
    public function canCreateOrderForBuyNow($data)
    {
        $item = $data['items'][0];

        $product = Product::find($item['product_id']);

        if (!$product || !$product->is_active) {
            throw new OrderException(__('api.product_not_found'));
        }



        if (!empty($item['product_child_id'])) {
            $child = Product::find($item['product_child_id']);

            if (!$child || !$child->is_active) {
                throw new OrderException(__('api.child_not_found'));
            }
        }

        return true;
    }
}
