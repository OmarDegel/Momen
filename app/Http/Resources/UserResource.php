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
            'email' => $this->email,
            'phone' => $this->phone,
            'lang' => $this->lang,
            'theme' => $this->theme,
            'active' => $this->active,
            'gender' => $this->gender,
            'image' => url($this->image),
            'birth_date' => $this->birth_date,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
