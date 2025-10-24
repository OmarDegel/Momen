<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\StatusOrderItemReturnEnum;

class OrderItemReturn extends MainModel
{
    protected $fillable = [
        'user_id',
        'order_id',
        'order_item_id',
        'reason_id',
        'coupon_id',
        'amount',
        'free_amount',
        'offer_amount',
        'offer_amount_add',
        'actual_amount',
        'price',
        'offer_price',
        'price_return',
        'total_price_return',
        'coupon_type',
        'coupon_discount',
        'coupon_discount_return',
        'note',
        'image',
        'status',
        'is_returned',
        'returned_at',
        'approved_by',
        'approved_at',
        'rejected_by',
        'rejected_at',
    ];

    protected $casts=[
        'status' => StatusOrderItemReturnEnum::class
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }   

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class);
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public function approvedBy()
    {
        return $this->belongsTo(User::class, 'approved_by', 'id');
    }

    public function rejectedBy()
    {
        return $this->belongsTo(User::class, 'rejected_by', 'id');
    }

}