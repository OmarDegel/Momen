<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PageResource extends JsonResource
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
            'content' => $this->contentLang(),
            'image' => $this->image,
            'active' => $this->active,
            'type' => $this->type,
            'page_type' => $this->page_type,
            'product_id' => $this->product_id,
            'product' => $this->whenLoaded('product', new ProductResource($this->product)),
            'order_id' => $this->order_id,
        ];
    }
}
