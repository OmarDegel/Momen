<?php

namespace App\Scopes;

trait ProductScope
{
    /**
     * Example scope
     */
    public function scopeActiveProducts($query)
    {
        return $query
            ->where('active', 1)
            ->where('is_stock', 1);
    }
    public function scopeActive($query)
    {
        return $query
            ->where('active', true)
            ->where('is_stock', true)
            ->where(function ($q) {
                $q->whereNull('date_start')
                    ->orWhereDate('date_start', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('date_expire')
                    ->orWhereDate('date_expire', '>=', now());
            })
            ->orderBy('order_id', 'asc');
    }

    public function scopeApplyDateFilters($query, $request)
    {
        if ($request->filled('date_start')) {
            $query->where('date_start', '>=', $request->date_start);
        }

        if ($request->filled('date_expire')) {
            $query->where('date_expire', '<=', $request->date_expire);
        }

        return $query;
    }
    public function scopeApplyCategoryFilter($query, $request)
    {
        if ($request->filled('category_id') && $request->category_id != 'all') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }
        return $query;
    }

    public function scopeApplyBasicFilters($query, $request, $type_app)
    {
        if ($type_app == 'app') {
            $query->active()->orderBy('feature', 'desc');
        }

        $query->orderBy('order_id', 'asc');
        $query->whereNull('parent_id');
        if ($request->filled('active') && $request->active != 'all') {
            $query->where('active', $request->active);
        }
        if ($request->filled('date_start')) {
            $query->whereDate('date_start', '<=', $request->date_start);
        }
        if ($request->filled('date_expire')) {
            $query->whereDate('date_expire', '>=', $request->date_expire);
        }
        return $query;
    }
    public function scopeApplySorting($query, $request)
    {
        if ($request->filled('sort_by')) {
            switch ($request->sort_by) {
                case 'latest':
                    $query->orderByDesc('id');
                    break;
                case 'oldest':
                    $query->orderBy('id', 'asc');
                    break;
                case 'highest_price':
                    $query->orderBy('price', 'desc');
                    break;
                case 'lowest_price':
                    $query->orderBy('price', 'asc');
                    break;
            }
        }
        return $query;
    }
    public function scopeApplyPriceFilters($query, $request = null)
    {
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        return $query;
    }
    public function scopeFilter($query, $request = null, $type_app = 'app')
    {
        $request = $request ?? request();



        $filters = $request->only([
            // relations
            'brand_id',
            'unit_id',
            'size_id',
            'color_id'
            // status flags
            ,
            'active',
            'is_stock',
            'is_filter',
            'is_offer',
            'is_new',
            'is_special',

            'is_size',
            'is_color',
            'is_shipping_free',
            'is_returned'
        ]);


        return $query
            ->applyBasicFilters($request, $type_app)
            ->mainSearch($request->input('search'))
            ->mainApplyDynamicFilters($filters)
            ->applyCategoryFilter($request)
            ->applyPriceFilters($request)
            ->applySorting($request)
            ->applyDateFilters($request)
        ;
    }
}
