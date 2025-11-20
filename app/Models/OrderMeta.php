<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderMeta extends MainModel
{
    protected $fillable = [
        'order_id',
        'phone',
        'name',
        'email',
        'address',
        'geo_address',
        'latitude',
        'longitude',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
