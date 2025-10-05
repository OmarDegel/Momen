<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends MainModel
{
    protected $fillable = [
        "name",
        "city_id",
        "shipping_cost",
        "latitude",
        "longitude",
        "polygon",
        "order_id",
        "active",
    ];
    public function city()
    {
        return $this->belongsTo(City::class);
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active', 'city_id']);
        $query->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request)
            ->shipping($request);
        return $query;
    }
}
