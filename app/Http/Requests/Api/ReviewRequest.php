<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'reviewable_type' => 'required|in:product,order',
            'reviewable_id' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $type = $this->input('reviewable_type');
                    if ($type === 'product' && !\App\Models\Product::where('id', $value)->exists()) {
                        $fail(__('validation.product_not_found'));
                    }
                    if ($type === 'order' && !\App\Models\Order::where('id', $value)->exists()) {
                        $fail(__('validation.order_not_found'));
                    }
                },
            ],
            'rating' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable|string|min:3',
        ];
    }
}
