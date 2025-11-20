<?php

namespace App\Models;

use App\Enums\StatusOrderEnum;
use Illuminate\Database\Eloquent\Model;

class Order extends MainModel
{
    protected $fillable = [
        'user_id',
        'delivery_id',
        'cancel_by',
        'cancel_date',
        'address_id',
        'payment_id',
        'region_id',
        'city_id',

        'coupon_id',
        'coupon_type',
        'coupon_discount',

        'tax',
        'fees',
        'price',
        'shipping',
        'discount',
        'price_returned',
        'total',

        'paid',
        'wallet',
        'total_paid',
        'remaining',
        'is_paid',


        'status',

        'delivery_time_id',
        'order_reject_id',


        'note',
        'delivery_note',
        'admin_note',
        'reject_note',

        'is_read',
    ];
    protected $casts = [
        'status' => StatusOrderEnum::class
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function delivery()
    {
        return $this->belongsTo(User::class);
    }
    public function deliveryTime()
    {
        return $this->belongsTo(DeliveryTime::class);
    }

    public function cancelBy()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
    public function orderStatuses()
    {
        return $this->hasMany(OrderStatus::class);
    }
    public function orderItemReturns()
    {
        return $this->hasMany(OrderItemReturn::class);
    }
    public function orderReject()
    {
        return $this->belongsTo(OrderReject::class);
    }
    public function orderMeta()
    {
        return $this->hasOne(OrderMeta::class);
    }
    public function scopeApplySorting($query, $request)
    {
        $query->orderBy('id', 'desc');
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'latest':
                    $query->orderByDesc('id');
                    break;
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
            }
        }
        return $query;
    }

    public function scopeApplyDateFilters($query, $request = null)
    {
        if ($request->filled('date_start')) {
            $query->where('created_at', '>=', $request->date_start);
        }

        if ($request->filled('date_expire')) {
            $query->where('created_at', '<=', $request->date_expire);
        }

        return $query;
    }

    public function scopeApplyPriceFilters($query, $request = null)
    {
        if (!$request) {
            return $query;
        }
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        return $query;
    }

    public function scopeApplyAddressFilters($query, $request)
    {
        $query->whereHas('address', function ($q) use ($request) {
            if ($request->filled('city_id')) {
                $q->where('city_id', $request->city_id);
            }
            if ($request->filled('region_id')) {
                $q->where('region_id', $request->region_id);
            }
        });
    }
    public function scopeFilter($query, $request = null)
    {

        $request = $request ?? request();
        $filters = $request->only(['user_id', 'status', 'delivery_time_id', 'payment_id', 'delivery_id']);
        return $query
            ->applySorting($request)
            ->mainApplyDynamicFilters($filters)
            // ->appllyPriceFilters($request)
            ->applyDateFilters($request)
            ->applyAddressFilters($request)
        ;
    }
}
