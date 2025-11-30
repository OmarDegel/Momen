<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemReturnResource extends JsonResource
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
            'user_id' => $this->user_id,
            'order_id' => $this->order_id,
            'order_item_id' => $this->order_item_id,
            'reason_id' => $this->reason_id,
            'coupon_id' => $this->coupon_id,
            'amount' => $this->amount,
            'free_amount' => $this->free_amount,
            'offer_amount' => $this->offer_amount,
            'offer_amount_add' => $this->offer_amount_add,
            'actual_amount' => $this->actual_amount,
            'price' => $this->price,
            'offer_price' => $this->offer_price,
            'price_return' => $this->price_return,
            'total_price_return' => $this->total_price_return,
            'coupon_type' => $this->coupon_type,
            'coupon_discount' => $this->coupon_discount,
            'coupon_discount_return' => $this->coupon_discount_return,
            'note' => $this->note,
            'image' => asset($this->image),
            'status' => $this->status,
            'is_returned' => $this->is_returned,
            'created_at' => formatDate($this->created_at),
            'updated_at' => formatDate($this->updated_at),
            'order_item' => new OrderItemResource($this->whenLoaded('orderItem')),
            'reason' => new ReasonResource($this->whenLoaded('reason')),
        ];
    }
}
