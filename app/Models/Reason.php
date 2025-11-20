<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends MainModel
{
    protected $fillable = [
        'name',
        'active',
        'order_id',
    ];
}
