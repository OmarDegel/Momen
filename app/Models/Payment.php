<?php

namespace App\Models;


class Payment extends MainModel
{
    protected $fillable = [
        'name',
        'content',
        'image',
        'type',
        'order_id',
        'active',
    ];
}
