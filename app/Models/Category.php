<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends MainModel
{
    protected $fillable = [
        'user_id',
        'name',
        'link',
        'title',
        'content',
        'image',
        'background',
        'color',
        'icon',
        'order_id',
        'service_id',
        'parent_id',
        'type',
        'status',
        'active',
        'feature',
    ];

    // public function service()
    // {
    //     return $this->belongsTo(Service::class);
    // }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
    public function activeChildren()
    {
        return $this->children()->where('active', 1);
    }
    public function scopeActive($query)
    {
        return $query->where('active', 1)
            ->whereDoesntHave('children')
            ->orderBy('order_id', 'asc');
    }
    public function scopeFilter($query, $request = null, $type = null)
    {
        $request = $request ?? request();

        if ($type == 'admin') {
            $filters = $request->only(['active', 'parent_id', 'user_id']);

            return $query->orderBy('order_id', 'asc')
                ->mainSearch($request->input('search'))
                ->mainApplyDynamicFilters($filters)
                ->sort($request)
                ->trash($request);
        }

        $filters = $request->only(['parent_id']);
        return $query->where('active', 1)
            ->orderBy('order_id', 'asc')
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->sort($request);
    }
}
