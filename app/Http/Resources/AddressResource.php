<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'type' => $this->type,
            'is_main' => $this->is_main,
            'phone' => $this->phone,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
            'address' => $this->address,
            'geo_address' => $this->geo_address,
            'geo_state' => $this->geo_state,
            'geo_city' => $this->geo_city,
            'place_id' => $this->place_id,
            'postal_code' => $this->postal_code,
            'building' => $this->building,
            'floor' => $this->floor,
            'apartment' => $this->apartment,
            'additional_info' => $this->additional_info,
            'city_id' => $this->city_id,
            'region_id' => $this->region_id,
            'city' => new CityResource($this->whenLoaded('city')),
            'region' => new RegionResource($this->whenLoaded("region")),

        ];
    }
}
