<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends MainModel
{
    protected $fillable = [
        'name',
        'code',
        'order_id',
        'active',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }
}
