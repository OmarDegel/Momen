<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends MainModel
{
    protected $fillable = [
        'product_id',
        'product_child_id',
        'order_id',
        'offer_price',
        'price',
        'amount',
        'price_addition',
        'amount_addition',
        'offer_amount',
        'offer_amount_add',
        'free_amount',
        'total_amount',
        'total',
        'total_price',
        'is_return',
        'return_at',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productChild()
    {
        return $this->belongsTo(Product::class, 'product_child_id');
    }
}
