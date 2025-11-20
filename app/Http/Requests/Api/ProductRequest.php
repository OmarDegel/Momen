<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'search' => 'nullable|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'sort_by' => 'nullable|in:latest,oldest,highest_price,lowest_price',
            'min_price' => 'nullable|numeric|min:0',
            'max_price' => 'nullable|numeric|min:0',
            'is_new'=>'nullable|in:0,1',
            'is_special'=>'nullable|in:0,1',
            'is_filter'=>'nullable|in:0,1',
            'is_free_shipping'=>'nullable|in:0,1',
            'is_returned'=>'nullable|in:0,1',
        ];
    }
    public function messages(): array
    {
        return [
            'search.string' => __('validation.string',['attribute'=> 'search']),
            'category_id.exists' => __('validation.exists',['attribute'=>'category_id']),
            'service_id.exists' => __('validation.exists',['attribute'=>'service_id']),
            'sort_by.in' => __('validation.in',['attribute'=>'sort_by']),
            'min_price.numeric' => __('validation.numeric',['attribute'=>'min_price']),
            'max_price.numeric' => __('validation.numeric',['attribute'=>'max_price']),
            'feature.in' => __('validation.in',['attribute'=>'feature']),
            'new.in' => __('validation.in',['attribute'=>'new']),
            'special.in' => __('validation.in',['attribute'=>'special']),
            'filter.in' => __('validation.in',['attribute'=>'filter']),
            'sale.in' => __('validation.in',['attribute'=>'sale']),
            'late.in' => __('validation.in',['attribute'=>'late']),
            'free_shipping.in' => __('validation.in',['attribute'=>'free_shipping']),
            'returned.in' => __('validation.in',['attribute'=>'returned']),
        ];
    }
}
