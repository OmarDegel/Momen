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
    public function scopeActiveParents($query)
    {
        return $query->where('active', 1)
            ->whereNull('parent_id')
            ->whereHas('children')
            ->orderBy('order_id', 'asc');
    }


    public function scopeActiveCategories($query)
    {
        return $query->where('active', 1)
            ->whereDoesntHave('children')
            ->orderBy('order_id', 'asc');
    }
    public function activeChildren()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id')->where('active', 1);
    }
    public function scopeFilter($query, $request = null, $type_app = 'app')
    {

        $request = $request ?? request();
        $filters = $request->only(['parent_id']);
        $type_app == 'app' ?  $query->where('active', 1) :  $query->where('active', $request->input('active'));

        $query->mainSearch($request->input('search'));


        $query->mainApplyDynamicFilters($filters);

        if ($request->has('is_parents') == 1) {
            $query->whereNull('parent_id');
        }

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
}
