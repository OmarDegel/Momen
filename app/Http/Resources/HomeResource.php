<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class HomeResource extends JsonResource
{

    public function toArray($request)
    {
        $user = $this->user;
        $settings = $this->settings;
        return [
            'user' => $user ? new UserResource($user) : null,
            'notification_count' => $user ? $user->notificationsUnread()->count() : 0,
            'cart_count' => $user ? $user->cart->cartItems->count() : 0,
            // Settings
            'min_order' => $settings['min_order'] ?? 0,
            'max_order' => $settings['max_order'] ?? 0,
            'delivery_cost' => $settings['delivery_cost'] ?? 0,
            'min_order_for_shipping_free' => $settings['min_order_for_shipping_free'] ?? 0,
            'site_title' => $settings['site_title'] ?? null,
            'site_phone' => $settings['site_phone'] ?? null,
            'site_email' => $settings['site_email'] ?? null,
            'logo' => $settings['logo'] ?? null,
            'facebook' => $settings['facebook'] ?? null,
            'instagram' => $settings['instagram'] ?? null,
            'youtube' => $settings['youtube'] ?? null,
            'whatsapp' => $settings['whatsapp'] ?? null,
            'snapchat' => $settings['snapchat'] ?? null,
            'twitter' => $settings['twitter'] ?? null,
            'tiktok' => $settings['tiktok'] ?? null,
            'telegram' => $settings['telegram'] ?? null,

            // Sliders & Categories
            'sliders' => PageResource::collection($this->sliders),
            'sliderFeature' => PageResource::collection($this->sliderFeature),
            'categories' => CategoryResource::collection($this->categories),

            // Products
            'newProducts' => ProductResource::collection($this->newProducts),
            'specialProducts' => ProductResource::collection($this->specialProducts),
            'filterProducts' => ProductResource::collection($this->filterProducts),
            'offerProducts' => ProductResource::collection($this->offerProducts),
        ];
    }
}
