<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SliderResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->nameLang(),
            'description' => $this->descriptionLang(),
            'active' => $this->active,
            'feature' => $this->feature,
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'image' => url($this->image),
            'product' => new ProductResource($this->whenLoaded('product')), // i can replace it wiht product_id
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
