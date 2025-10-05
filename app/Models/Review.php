<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class review extends MainModel
{
    protected $fillable = [
        'user_id',
        'rate',
        'comment',
        'active',
        'reviewable_type',
        'reviewable_id',
    ];
    protected $searchable = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function reviewable()
    {
        return $this->morphTo();
    }
    public function scopeType($query, $request)
    {
        if ($request->filled('type' && $request->input('type') != 'all')) {
            if ($request->input('type') == 'product') {
                $query->where('reviewable_type', 'App\Models\Product');
                if ($request->filled('product_id' && $request->input('product_id') != 'all')) {
                    $query->where('reviewable_id', $request->input('product_id'));
                }
            } else {
                $query->where('reviewable_type', 'App\Models\Order');
            }
        }
        return $query;
    }
    public function scopeRating($query, $request){
        if($request->filled('max_rate')){
            $query->where('rating', '<=', $request->input('max_rate'));
        }
        if($request->filled('min_rate')){
            $query->where('rating', '>=', $request->input('min_rate'));
        }
        return $query;
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active', 'user_id']);
        $query
            ->mainSearch($request->input('search'))
            ->type($request)
            ->rating($request)
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request);
        return $query;
    }
}
