<?php

namespace App\Http\Resources;

use App\Models\Page;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class HomeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        //header
        $auth = auth()->guard('api')->user();
        $user = $auth ? User::with('cart')->find($auth->id) : null;
        $settings = Setting::pluck('value', 'key')->toArray();
        //head
        $sliders = Page::where('type', 'slider')->active()->limit(5)->get();
        $categories = Category::filter()->paginate(10);
        //body
        $data = ['categories:id,name', 'unit:id,name', 'size:id,name', 'brand:id,name'];
        $flags = [
            'new' => 'is_new',
            'special' => 'is_special',
            'filter' => 'is_filter',
            'offer' => 'is_offer',
            'feature' => 'feature',
        ];
        $products = [];
        foreach ($flags as $key => $column) {
            $products[$key] = Product::with($data)
                ->where($column, 1)
                ->filter()
                ->paginate(10, ['*'], $key . '_page');
        }
        return [
            //header
            'min_order'                    => $settings['min_order'] ?? null,
            'max_order'                    => $settings['max_order'] ?? null,
            'delivery_cost'                => $settings['delivery_cost'] ?? null,
            'min_order_for_shipping_free'  => $settings['min_order_for_shipping_free'] ?? null,
            'site_title'  => $settings['site_title'] ?? null,
            'logo'        => $settings['logo_image'] ? url($settings['logo_image']) : null,
            // 'user' => $user ? new UserResource($user) : null,
            'cart_count' => $user ? $user->cartItems()->count() : 0,
            //head
            'sliders' => SliderResource::collection($sliders),
            'categories' => CategoryResource::collection($categories),
            //body
            'new_products' => ProductResource::collection($products['new']),
            'special_products' => ProductResource::collection($products['special']),
            'filter_products' => ProductResource::collection($products['filter']),
            'offer_products' => ProductResource::collection($products['offer']),
            'feature_products' => ProductResource::collection($products['feature']),
        ];
    }
}
