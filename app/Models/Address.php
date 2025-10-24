<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends MainModel
{
    protected $fillable = [
        'user_id',
        'city_id',
        'region_id',
        'order_id',
        'address',
        'phone',
        'name',
        'type',
        'is_main',
        'latitude',
        'longitude',
        'geo_address',
        'geo_state',
        'geo_city',
        'place_id',
        'postal_code',
        'building',
        'floor',
        'apartment',
        'additional_info',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function region()
    {
        return $this->belongsTo(Region::class);
    }
}
