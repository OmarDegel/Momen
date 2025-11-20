<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CouponResource extends JsonResource
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
            'code' => $this->code,
            'type' => $this->type,
            'discount' => $this->discount,
            'max_discount' => $this->max_discount,
            'min_order' => $this->min_order,
            'user_limit' => $this->user_limit,
            'use_limit' => $this->use_limit,
            'use_count' => $this->use_count,
            'date_start' => $this->date_start,
            'date_expire' => $this->date_expire,
            'day_start' => $this->day_start,
            'day_expire' => $this->day_expire,
            'order_id' => $this->order_id,
            'finish' => $this->finish,
            'active' => $this->active,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),];
    }
}
