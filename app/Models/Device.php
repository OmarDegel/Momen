<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Device extends Model
{
    protected $fillable = [
        'user_id',
        'token',
        'device_type',
        'imei',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
