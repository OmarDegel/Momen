<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends MainModel
{
    protected $fillable = [
        'name',
        'active',
        'order_id',
    ];
    public function scopeActive($query)
    {
        return $query->where('active', 1)
            ->orderBy('order_id', 'asc');
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_color', 'color_id', 'product_id');
    }
}
