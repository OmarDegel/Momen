<?php

namespace App\Models;



class DeliveryTime extends MainModel
{
    protected $fillable = [
        'name',
        'hour_start',
        'hour_end',
        'type',
        'order_id',
        'active',
    ];

    public function scopeActive($query)
    {
        return $query->where('active', true);
    }
}
