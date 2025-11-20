<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends MainModel
{
    protected $searchable = [
        'name',
        'link',
        'title',
        'content',
    ];
    protected $fillable = [
        'user_id',
        'product_id',
        'name',
        'link',
        'title',
        'content',
        'image',
        'video',
        'icon',
        'type',
        'page_type',
        'order_id',
        'parent_id',
        'active',
        'feature',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // public function product()
    // {
    //     return $this->belongsTo(Product::class);
    // }

    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Page::class, 'parent_id');
    }
    public function scopeActive($query){
        return $query->where('active', 1);
    }
    public function scopeFilter($query, $request = null)
    {
        $request = $request ?? request();
        $filters = $request->only(['active', 'feature', 'type', 'page_type']);
        $query->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request)
            ->trash($request)
            ->shipping($request);
        return $query;
    }
}
