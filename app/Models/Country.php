<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends MainModel
{
    protected $fillable = 
    ['name', 
    'code',
    'currency_id',
    'phone_code',
    'image',
    'active',
    'order_id',
];
    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }
    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
