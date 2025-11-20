<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'name_first' => $this->name_first,
            'name_last' => $this->name_last,
            'active' => $this->active,
            'email' => $this->email,
            'phone' => $this->phone,
            'image' => $this->image ? asset($this->image) : null,
            'vip' => $this->vip,
            'locale' => $this->locale,
            'theme' => $this->theme,
            'date_of_birth' => $this->date_of_birth,
            'type' => $this->type,
            'gender' => $this->gender,
            'is_notify' => $this->is_notify,

        ];
    }
}
