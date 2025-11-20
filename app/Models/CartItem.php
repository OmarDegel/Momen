<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'cart_id',
        'product_id',
        'product_child_id',
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
        'shipping',
        'is_return',
        'return_at'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productChild()
    {
        return $this->belongsTo(Product::class, 'product_child_id');
    }   

    public function cart()
    {
        return $this->belongsTo(Cart::class);
    }
}