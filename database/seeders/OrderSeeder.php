<?php

namespace Database\Seeders;

use App\Enums\StatusOrderEnum;
use App\Models\Address;
use App\Models\CartItem;
use App\Models\Coupon;
use App\Models\DeliveryTime;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    
    public function run(): void
    {
        
        // إيقاف كل الأحداث أثناء التنفيذ
        \Illuminate\Database\Eloquent\Model::unsetEventDispatcher();

        $users = User::all();
        foreach ($users as $user) {
            for ($i = 0; $i < rand(5, 10); $i++) {
                $orderId = $this->createOrder($user->id);
                for ($j = 0; $j < rand(1, 5); $j++) {
                    $this->createOrderItem($orderId, rand(1, 5));
                }
                if (rand(0, 1) == 1) {
                    $this->createCouponOrder($orderId);
                }
            }
        }

        // إعادة تشغيل الأحداث بعد الانتهاء (اختياري)
        \Illuminate\Database\Eloquent\Model::setEventDispatcher(app('events'));
    }


    private function createOrder($userId)
    {
        $user = User::find($userId);
        $address = $user->addresses()->first();

        $order = Order::create([
            'user_id' => $user->id,
            'address_id' => $address->id,
            'payment_id' => Payment::first()->id,
            'city_id' => $address->city_id,
            'region_id' => $address->region_id,
            'price' => 0,
            'shipping' => $this->getShippingAddress($address->id, $user->id),
            'discount' => 0,
            'price_returned' => 0,
            'total' => 0,
            'status' => StatusOrderEnum::Request->value,
            'delivery_time_id' => DeliveryTime::first()->id,
        ]);
        return $order->id;
    }

    private function createOrderItem($orderId, $amount)
    {
        $order = Order::find($orderId);
        $randomProduct = Product::where('active', 1)->where('is_stock', 1)->inRandomOrder()->first();
        $data = $this->getDataCartItem($randomProduct->id, $amount);
        $order->orderItems()->create($data);
        $order->update([
            'price' => $order->price + $data['total'],
            'shipping' => $order->shipping + $data['shipping'],
            'discount' => $order->discount + $data['total'] - $data['total_price'],
        ]);
        $order->update([
            'total' => $order->price + $order->shipping - $order->discount
        ]);
    }

    private function createCouponOrder($orderId)
    {
        $order = Order::find($orderId);
        $priceBeforeCoupon = $order->price - $order->discount;
        $coupon = Coupon::inRandomOrder()->first();
        if ($priceBeforeCoupon >= $coupon->min_order) {
            $order->update([
                'coupon_id' => $coupon->id,
                'coupon_type' => $coupon->type,
                'coupon_discount' => $coupon->discount,
                'discount' => $order->discount + $this->getOrderDiscountAfterCoupon($priceBeforeCoupon, $coupon->type, $coupon->discount),
            ]);
            $order->update([
                'total' => $order->price + $order->shipping - $order->discount
            ]);
        }
    }

      public function getDataCartItem($productId,$amount){
        $data=[];
        $product = Product::find($productId);
        if($product ->parent_id){
            $data['product_id']=$product->parent_id;
            $data['product_child_id']=$product->id;
        }else{
            $data['product_id']=$product->id;
            $data['product_child_id']=null;
        }
        $data['offer_price']=$product->offer_price;
        $data['price']=$product->price;
        $data['amount']=$amount;
        $data['offer_amount']=$product->offer_amount;
        $data['offer_amount_add']=$product->offer_amount_add;
        $data['free_amount']=$this->calculateFreeAmount($productId,$amount);
        $data['total_amount']=$data['amount'] + $data['free_amount'];
        $data['total']=$data['offer_price'] > 0  ? ($data['offer_price'] * $data['total_amount'] ): ( $data['price'] * $data['total_amount']);
        $data['total_price']=$product->price * $amount;
        $data['shipping']=$product->shipping;
        $data['is_return']=$product->is_returned;
        $returnPeriodDays = 14;    
        $data['return_at']=$data['is_return']==1 && isset($returnPeriodDays) ?
        now()->addDays((int) $returnPeriodDays)
       : null;
        return $data;

    }
    
    public function getShippingAddress($addressId,$userId)
    {
        $user = User::find($userId);
        $address = $user->addresses()->where('id', $addressId)->first();
        $shipping = $address->city->shipping;
        if ($address->region_id) {
            $shipping += $address->region->shipping;
        }
        return $shipping;
    }

    public function calculateFreeAmount($productId,$amount){
        $product = Product::find($productId);
        if($product->offer_amount>0 && $product->offer_amount_add>0){
            $freeAmount=intval($amount / $product->offer_amount) * $product->offer_amount_add;
            return $freeAmount;
        }
        return 0;
    }

    public function getOrderDiscountAfterCoupon(float $priceBeforeCoupon, ?string $couponType = null, ?float $couponDiscount = null,): float
    {
        if (empty($couponType) || empty($couponDiscount)) {
            return 0;
        }
        $discount = 0;
        if ($couponType === 'percent') {
            $discount = ($priceBeforeCoupon * $couponDiscount) / 100;
        } elseif ($couponType === 'fixed') {
            $discount = $couponDiscount;
        }

        if ($discount > $priceBeforeCoupon) {
            $discount = $priceBeforeCoupon;
        }
        return round($discount);
    }
    // craete orderItem -> [product,productChild,offerPrice,offerAmount,returned]

    // user -> order ,order return part ,order return all




}