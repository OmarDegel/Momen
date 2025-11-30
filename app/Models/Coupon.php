<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Coupon extends MainModel
{
    use HasFactory;

    protected $fillable = [
        'name',
        'content',
        'code',
        'type',
        'discount',
        'min_order',
        'max_discount',
        'user_limit',
        'use_limit',
        'use_count',
        'count_used',
        'date_start',
        'date_expire',
        'day_start',
        'day_expire',
        'order_id',
        'finish',
        'active',
    ];
    public function getDateStartAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
    public function getDateExpireAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
    public function scopeValidCoupons($query)
    {
        return $query->where('active', 1)->where('finish', 0)
            ->where('date_expire', '>=', Carbon::now())
            ->where('date_start', '<=', Carbon::now())
            ->where('day_expire', '>=', Carbon::now())
            ->where('day_start', '<=', Carbon::now())
            ->where(fn($q) => $q->whereColumn('use_limit', '>', 'use_count'));
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
