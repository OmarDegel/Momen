<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
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
            'active' => $this->active,
            'feature' => $this->featured,
            'order_id' => $this->order_id,
            'products_count' => $this->when(isset($this->products_count), $this->products_count),
            'subcategories_count' => $this->when(isset($this->subcategories_count), $this->subcategories_count),
            'image' => url($this->image),
            'parent' => new CategoryResource($this->whenLoaded('parent')),
            'children' => CategoryResource::collection($this->whenLoaded('activeChildren')),
        ];
    }
}
