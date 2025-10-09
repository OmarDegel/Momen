<?php

namespace App\Scopes;

trait GlobaleScope
{
    public function scopeMainApplyDynamicFilters($query, $filters = [])
    {
        foreach ($filters as $column => $value) {
            if ($value != null && $value != 'all') {
                $query->where($column, $value);
            }
        }
        return $query;
    }
    public function scopeMainSearch($query, $search)
    {
        if (!$search) {
            return $query;
        }
        $searchable = property_exists($this, 'searchable') ? $this->searchable : ['name', 'content'];
        $query->where(function ($q) use ($search, $searchable) {
            foreach ($searchable as $column) {
                if (str_contains($column, '.')) {
                    [$relation, $relColumn] = explode('.', $column, 2);
                    $q->whereHas($relation, function ($q2) use ($search, $relColumn) {
                        $q2->where($relColumn, 'like', "%{$search}%");
                    });
                } else {
                    $q->orWhere($column, 'like', "%{$search}%");
                }
            }
        });
        return $query;
    }
    public function scopeSort($query, $request = null)
    {
        if (!$request) {
            return $query;
        }

        if ($request->filled('sort_by')) {
            if ($request->input('sort_by') == 'latest') {
                $query->latest();
            } else {
                $query->oldest();
            }
        }
    }
    public function scopeTrash($query, $request = null)
    {
        if ($request->filled('trash')) {
            if ($request->input('trash') == 'all') {
                $query->withTrashed();
            } else if ($request->input('trash') == '0') {
                $query->onlyTrashed();
            } else {
                $query->withoutTrashed();
            }
        }
        return $query;
    }


    public function scopeApplyPriceFilters($query, $request)
    {
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }
        return $query;
    }
    public function scopeShipping($query, $request)
    {

        if ($request->filled('shipping_min') && $request->shipping_min) {
            $query->where('shipping', '>=', $request->shipping_min);
        }
        if ($request->filled('shipping_max') && $request->shipping_max) {
            $query->where('shipping', '<=', $request->shipping_max);
        }
        return $query;
    }
}
