<?php

namespace App\Models;

use App\Casts\Json;
use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainModel extends Model
{
    use LogsActivity, SoftDeletes;

    protected static $logAttributes = ['*'];

    protected function casts(): array
    {
        return [
            'name' => Json::class,
            'content' => Json::class,
            'title' => Json::class,
        ];
    }
    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logAll()
            ->logOnlyDirty()
            ->dontLogIfAttributesChangedOnly(['updated_at'])
            ->useLogName('system');
    }



    public function nameLang($locale = null)
    {
        $data = $this->name;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang];
        }
        return $data[$locale] ?? null;
    }

    public function contentLang($locale = null)
    {
        $data = $this->content;
        if ($locale == null) {
            $user = auth()->guard("api")->user();
            $userLang = $user ? $user->locale : app()->getLocale();
            return $data[$userLang];
        }
        return $data[$locale] ?? null;
    }

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
    public function scopeShipping($query, $request = null)
    {
        if ($request->filled('shipping_min')) {
            $query->where('shipping', '>=', $request->input('shipping_min'));
        }
        if ($request->filled('shipping_max')) {
            $query->where('shipping', '<=', $request->input('shipping_max'));
        }
        return $query;
    }
    public function scopePrice($query, $request = null)
    {
        if ($request->filled('price_min')) {
            $query->where('price', '>=', $request->input('price_min'));
        }
        if ($request->filled('price_max')) {
            $query->where('price', '<=', $request->input('price_max'));
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


}
