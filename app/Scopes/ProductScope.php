<?php

namespace App\Scopes;

trait ProductScope
{
    /**
     * Example scope
     */
    protected $searchFilters = [
        'brand_id',
        'unit_id',
        'color_id',
        'active',
        'feature',
        'is_new',
        'is_offer',
        'is_special',
        'is_filter',
        'is_sale',
        'is_late',
        'is_stock',
        'is_shipping_free',
        'is_returned',
    ];
    public function scopeActive($query)
    {
        return $query
            ->where('active', true)
            ->where('is_stock', true);
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
        $query->whereNull('parent_id');
        if ($type_app == 'app') {
            $query->active()->orderBy('feature', 'desc');
        } else {

            if ($request->filled('active') && $request->active != 'all') {
                $query->where('active', $request->active);
            }
            if ($request->filled('is_stock') && $request->is_stock != 'all') {
                $query->where('is_stock', $request->is_stock);
            }
            if ($request->filled('date_start')) {
                $query->whereDate('date_start', '<=', $request->date_start);
            }
            if ($request->filled('date_end')) {
                $query->whereDate('date_end', '>=', $request->date_end);
            }
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
                case 'order':
                    $query->orderBy('order_id', 'asc');
                    break;
                default:
                    $query->orderBy('order_id', 'asc');
            }
        }
        return $query;
    }

    public function scopeFilter($query, $request = null, $type_app = 'app')
    {
        $request = $request ?? request();

        $filters = $request->only($this->searchFilters);


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


    // Add more scopes here...
}
