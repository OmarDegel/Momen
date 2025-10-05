<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Size extends MainModel
{
    protected $searchable = [
        'name',
    ];
    protected $fillable = [
        'name',
        'order_id',
        'active',
    ];
    public function scopeActive($query){
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
