<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends MainModel
{
    protected $fillable = [
        'name',
        'image',
        'active',
        'order_id',
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1)
            ->orderBy('order_id', 'asc');
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active']);
        $query->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request);
        return $query;
    }
}
