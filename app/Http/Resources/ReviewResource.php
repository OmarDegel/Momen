<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
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
            'rating' => $this->rating,
            'comment' => $this->comment,
            'active' => $this->active,
            'created_at' => formatDate($this->created_at),
            'updated_at' => formatDate($this->updated_at),
            'reviewable_type' => class_basename($this->reviewable_type),
            'reviewable' => $this->whenLoaded('reviewable', function () {
                if ($this->reviewable instanceof \App\Models\Product) {
                    return new ProductResource($this->reviewable);
                } elseif ($this->reviewable instanceof \App\Models\Order) {
                    // return new OrderResource($this->reviewable);
                }
                return null;
            }),
        ];
    }
}
