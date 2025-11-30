<?php

namespace App\Http\Requests\Api;

use App\Enums\TypeAddressEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class AddressRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'type'    => ['required', new Enum(TypeAddressEnum::class)],
            'name'=>'nullable|string',
            'is_main'=>'nullable|in:0,1',
            'city_id'=>'required|exists:cities,id',
            'region_id'=>'nullable|exists:regions,id',
            'address'=>'required|string',
            'latitude'=>'required|string',
            'longitude'=>'required|string',
            'building'=>'nullable|string',
            'floor'=>'nullable|string',
            'apartment'=>'nullable|string',
            'phone'=>'nullable|string',
            'additional_info'=>'nullable|string'
        ];
    }

    public function messages(): array
    {
        return [
            'type.required' => __('validation.required',['attribute'=>__('api.type')]),
            'type.enum' => __('validation.enum',['attribute'=>__('api.type')]),
            'name.string' => __('validation.string',['attribute'=>__('api.name')]),
            'is_main.in' => __('validation.in',['attribute'=>__('api.is_main')]),
            'city_id.required' => __('validation.required',['attribute'=>__('api.city_id')]),
            'city_id.exists' => __('validation.exists',['attribute'=>__('api.city_id')]),
            'region_id.exists' => __('validation.exists',['attribute'=>__('api.region_id')]),
            'address.required' => __('validation.required',['attribute'=>__('api.address')]),
            'address.string' => __('validation.string',['attribute'=>__('api.address')]),
            'latitude.required' => __('validation.required',['attribute'=>__('api.latitude')]),
            'latitude.string' => __('validation.string',['attribute'=>__('api.latitude')]),
            'longitude.required' => __('validation.required',['attribute'=>__('api.longitude')]),
            'longitude.string' => __('validation.string',['attribute'=>__('api.longitude')]),
            'building.string' => __('validation.string',['attribute'=>__('api.building')]),
            'floor.string' => __('validation.string',['attribute'=>__('api.floor')]),
            'apartment.string' => __('validation.string',['attribute'=>__('api.apartment')]),
            'phone.string' => __('validation.string',['attribute'=>__('api.phone')]),
            'additional_info.string' => __('validation.string',['attribute'=>__('api.additional_info')]),
        ];
    }


}
