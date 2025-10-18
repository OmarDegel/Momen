<?php

namespace App\Models;

use App\Scopes\ProductScope;


class Product extends MainModel
{
    use ProductScope;
    protected $searchable = [
        'name',
        'content',
        'code',
    ];
    protected $fillable = [
        'user_id', // no
        'unit_id', // no
        'brand_id', //yes
        'size_id',  //yes
        'parent_id',    //yes
        'color_id', // yes
        'name', //yes
        'link', //no =>for website
        'code', //yes
        'type', // no idk
        'status', // no
        'image', //no => main
        'background', //no
        'video', //no
        'content', //yes
        'max_amount', //no
        'max_addition', //no
        'max_addition_free', //no
        'offer_type', //no
        'offer_price', //yes
        'offer_amount', //no
        'offer_amount_add', //no
        'offer_percent', //no
        'price', //yes
        'price_start', //no observer
        'price_end', //no observer
        'start', //yes =>no
        'skip', //yes =>no
        'rate_count', //no
        'rate_all', //no
        'rate', //no
        'order_limit', //no =>use
        'order_max', //yes
        'date_start', //yes =>no
        'date_expire', //yes =>no
        'day_start', //no
        'day_expire', //no
        'prepare_time', //no
        'order_id', //yes
        'is_late', //yes =>dis
        'is_size', //no
        'is_color', //no
        'is_max', //no
        'is_filter', //yes
        'is_offer', //yes
        'is_sale', //yes
        'is_new', //yes
        'is_special', //yes
        'is_stock', //yes
        'shipping', //yes
        'is_shipping_free', //yes
        'is_returned', //yes
        'feature', //yes
        'active', //yes
    ];
    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
    public function size()
    {
        return $this->belongsTo(Size::class);
    }
    public function colors()
    {
        return $this->belongsToMany(Color::class, 'color_product', 'product_id', 'color_id');
    }
    public function parent()
    {
        return $this->belongsTo(Product::class, 'parent_id');
    }
    public function images()
    {
        return $this->hasMany(ProductGallery::class);
    }
    public function reviews()
    {
        return $this->morphMany(Review::class, 'reviewable');
    }
    public function children()
    {
        return $this->hasMany(Product::class, 'parent_id');
    }
    public function setDateStartAttribute($value)
    {
        $this->attributes['date_start'] = date('Y-m-d H:i:00', strtotime($value));
    }

    public function setDateEndAttribute($value)
    {
        $this->attributes['date_end'] = date('Y-m-d H:i:00', strtotime($value));
    }
    public function favorites(){
        return $this->hasMany(Favorite::class);
    }

    public function deleteChildrenOldWhenNotSendInUpdate()
    {
        if ($this->children()->count() > 0 && !request()->has('children')) {

            $this->children()->delete();
        }
    }
}
