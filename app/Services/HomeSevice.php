<?php

namespace App\Services;

use App\Models\Page;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;

class HomeSevice
{
    public function getHomeData()
    {
        $settings = Setting::all();
        $auth = auth()->guard('api')->user();
        $user = $auth ? User::find($auth->id) : null;

        // Sliders
        $sliders = Page::where('type', 'slider')->active()->paginate(10);
        $sliderFeature = Page::where('type', 'slider')
            ->where('feature', 1)
            ->active()
            ->paginate(10);

        // Categories
        $categories = Category::filter()->paginate(10);

        // Products
        $productRelations = ['categories', 'unit', 'brand', 'favorites', 'images'];
        $newProducts = Product::with($productRelations)->where('is_new', 1)
            ->filter()->paginate(10);
        $specialProducts = Product::with($productRelations)->where('is_special', 1)
            ->filter()->paginate(10);
        $filterProducts = Product::with($productRelations)->where('is_filter', 1)
            ->filter()->paginate(10);
        $offerProducts = Product::with($productRelations)->where('is_offer', 1)
            ->filter()->paginate(10);

        return [
            'user' => $user,
            'settings' => $settings,
            'sliders' => $sliders,
            'sliderFeature' => $sliderFeature,
            'categories' => $categories,
            'newProducts' => $newProducts,
            'specialProducts' => $specialProducts,
            'filterProducts' => $filterProducts,
            'offerProducts' => $offerProducts,
        ];
    }
}
