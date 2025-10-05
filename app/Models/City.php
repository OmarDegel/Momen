<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class City extends MainModel
{
    protected $fillable = [
        'name',
        'country_id',
        'shipping',
        'latitude',
        'longitude',
        'polygon',
        'order_id',
        'active',
    ];
    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function regions()
    {
        return $this->hasMany(Region::class);
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active']);
        $query->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request)
            ->shipping($request);
        return $query;
    }
}
