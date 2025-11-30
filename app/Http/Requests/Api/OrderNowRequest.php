<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class OrderNowRequest extends FormRequest
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
            'product_id' => 'required|exists:products,id',
            'product_child_id' => 'nullable|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'size_id' => 'required|exists:sizes,id',
        ];
    }
}
