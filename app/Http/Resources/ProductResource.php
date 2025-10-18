<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [


            'name'          => $this->nameLang(),
            'code'          => $this->code,
            'content'       => $this->contentLang(),

            'offer_type'    => $this->offer_type,
            'offer_price'   => $this->offer_price,
            'price'         => $this->price,
            'order_max'     => $this->order_max,

            'order_id'      => $this->order_id,
            'is_late'       => $this->is_late,

            'is_filter'         => $this->is_filter,
            'is_offer'          => $this->is_offer,
            'is_sale'           => $this->is_sale,
            'is_new'            => $this->is_new,
            'is_special'        => $this->is_special,
            'is_stock'          => $this->is_stock,
            'shipping'          => $this->shipping,
            'is_shipping_free'  => $this->is_shipping_free,
            'is_returned'       => $this->is_returned,
            'feature'           => $this->feature,
            'active'            => $this->active,

            'in_cart' => $this->checkProductInCart(),
            'id_in_cart' => $this->productIdInCart(),
            'count_in_cart' => $this->countInCart(),

            'categories'   => CategoryResource::collection($this->whenLoaded('categories')),
            'brand'      => new BrandResource($this->whenLoaded('brand')),
            'size'       => new SizeResource($this->whenLoaded('size')),
            'parent'     => new ProductResource($this->whenLoaded('parent')),
            'color'      => new ColorResource($this->whenLoaded('color')),

        ];
    }
}
