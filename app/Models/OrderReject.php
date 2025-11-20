<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderReject extends MainModel
{
    protected $fillable = [
        'name',
        'active',
        'order_id',
    ];
}