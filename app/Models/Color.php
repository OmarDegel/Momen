<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends MainModel
{
    protected $searchable = ['name'];
    protected $fillable = [
        'name',
        'active',
        'order_id',
    ];
    public function scopeActive($query)
    {
        return $query->where('active', 1)
            ->orderBy('order_id', 'asc');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_color', 'color_id', 'product_id');
    }
        public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active']);
        $query->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request);
        return $query;
    }
}
