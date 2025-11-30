<?php

namespace App\Http\Resources;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'delivery_id' => $this->delivery_id,
            'cancel_by' => $this->cancel_by,
            'cancel_date' => $this->cancel_date,
            'address_id' => $this->address_id,
            'payment_id' => $this->payment_id,
            'delivery_time_id' => $this->delivery_time_id,
            'region_id' => $this->region_id,
            'city_id' => $this->city_id,
            'coupon_id' => $this->coupon_id,
            'coupon_type' => $this->coupon_type,
            'coupon_discount' => $this->coupon_discount,
            'tax' => $this->tax,
            'fees' => $this->fees,
            'price' => $this->price,
            'shipping' => $this->shipping,
            'discount' => $this->discount,
            'total' => $this->total,
            'paid' => $this->paid,
            'wallet' => $this->wallet,
            'total_paid' => $this->total_paid,
            'remaining' => $this->remaining,
            'is_paid' => $this->is_paid,
            'note' => $this->note,
            'delivery_note' => $this->delivery_note,
            'admin_note' => $this->admin_note,
            'reject_note' => $this->reject_note,
            'is_read' => $this->is_read,
            'status' => $this->status,
            'delivery_cost' => Setting::where('key', 'delivery_cost')->value('value'),
            'created_at' => formatDate($this->created_at),
            'updated_at' => formatDate($this->updated_at),
            'user' => new UserResource($this->whenLoaded('user')),
            'address' => new AddressResource($this->whenLoaded('address')),
            'payment' => new PaymentResource($this->whenLoaded('payment')),
            'delivery_time' => new DeliveryTimeResource($this->whenLoaded('deliveryTime')),
            'delivery' => new UserResource($this->whenLoaded('delivery')),
            'coupon' => new CouponResource($this->whenLoaded('coupon')),
            'region' => new RegionResource($this->whenLoaded('region')),
            'city' => new CityResource($this->whenLoaded('city')),
            'order_items' => OrderItemResource::collection($this->whenLoaded('orderItems')),
            'order_item_returns' => OrderItemReturnResource::collection($this->whenLoaded('orderItemReturns')),
            'order_reject' => new OrderRejectResource($this->whenLoaded('orderReject')),
        ];
    }
}
