<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends MainModel
{
    
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
}
