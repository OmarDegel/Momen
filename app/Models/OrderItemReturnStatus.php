<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItemReturnStatus extends Model
{
    protected $fillable = [
        'order_item_return_id',
        'status',
    ];

    public function orderItems()
    {
        return $this->belongsToMany(OrderItemReturn::class);
    }
}
