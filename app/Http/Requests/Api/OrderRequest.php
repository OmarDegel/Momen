<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
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
            'payment_id' => 'required|exists:payments,id',
            'delivery_time_id' => 'nullable|exists:delivery_times,id',
            'notes' => 'nullable|string|max:255',
            'address_id' => 'nullable|exists:addresses,id',
            'coupon_code' => 'nullable|string|exists:coupons,code',
        ];
    }

    public function messages(): array
    {
        return [
            'payment_id.required' => __('validation.required', ['attribute' => __('api.payment')]),
            'payment_id.exists' => __('validation.exists', ['attribute' => __('api.payment')]),
            'delivery_time_id.exists' => __('validation.exists', ['attribute' => __('api.delivery_time')]),
            'notes.string' => __('validation.string', ['attribute' => __('api.notes')]),
            'address_id.exists' => __('validation.exists', ['attribute' => __('api.address')]),
            'coupon_code.exists' => __('validation.exists', ['attribute' => __('api.coupon')]),
            'coupon_code.string' => __('validation.string', ['attribute' => __('api.coupon')]),
        ];
    }
}
