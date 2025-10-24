<?php

namespace App\Scopes;

trait ProductScope
{
    /**
     * Example scope
     */
    public function scopeActive($query)
    {
        return $query
            ->where('active', true)
            ->where('stock', true)
            ->where(function ($q) {
                $q->whereNull('date_start')
                    ->orWhereDate('date_start', '<=', now());
            })
            ->where(function ($q) {
                $q->whereNull('date_end')
                    ->orWhereDate('date_end', '>=', now());
            })
            ->orderBy('order_id', 'asc');
    }
    public function scopeApplyDateFilters($query, $request)
    {
        if ($request->filled('date_start')) {
            $query->where('date_start', '>=', $request->date_start);
        }

        if ($request->filled('date_end')) {
            $query->where('date_end', '<=', $request->date_end);
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
        if ($request->filled('date_end')) {
            $query->whereDate('date_end', '>=', $request->date_end);
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

    public function scopeFilter($query, $request = null, $type_app = 'app')
    {
        $request = $request ?? request();

        $filters = $request->only(['service_id', 'brand_id', 'unit_id', 'feature', 'is_new', 'is_special', 'is_filter', 'is_sale', 'is_late', 'is_stock', 'is_free_shipping', 'is_returned','is_offer']);


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
