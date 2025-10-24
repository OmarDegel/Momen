<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CouponRequest extends FormRequest
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
            'name' => 'required|string|max:255',
            'content' => 'nullable|string',

            'code' => 'required|string|max:100|unique:coupons,code',

            'type' => 'required|in:percentage,fixed',
            'discount' => 'required|integer|min:0',
            'max_discount' => 'nullable|integer|min:0',

            'finish' => 'required|boolean',

            'user_limit' => 'nullable|integer|min:0',
            'use_count' => 'nullable|integer|min:0',

            'min_order' => 'nullable|integer|min:0',

            'active' => 'required|boolean',

            'order_id' => 'nullable|exists:orders,id',

            'date_start' => 'nullable|date',
            'date_expire' => 'nullable|date|after_or_equal:date_start',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => 'Name']),
            'name.string' => __('validation.string', ['attribute' => 'Name']),
            'name.max' => __('validation.max.string', ['attribute' => 'Name', 'max' => 255]),

            'content.string' => __('validation.string', ['attribute' => 'content']),

            'code.required' => __('validation.required', ['attribute' => 'Code']),
            'code.string' => __('validation.string', ['attribute' => 'Code']),
            'code.max' => __('validation.max.string', ['attribute' => 'Code', 'max' => 100]),
            'code.unique' => __('validation.unique', ['attribute' => 'Code']),

            'type.required' => __('validation.required', ['attribute' => 'Type']),
            'type.in' => __('validation.in', ['attribute' => 'Type']),

            'discount.required' => __('validation.required', ['attribute' => 'Discount']),
            'discount.integer' => __('validation.integer', ['attribute' => 'Discount']),
            'discount.min' => __('validation.min.numeric', ['attribute' => 'Discount', 'min' => 0]),

            'max_discount.integer' => __('validation.integer', ['attribute' => 'Max Discount']),
            'max_discount.min' => __('validation.min.numeric', ['attribute' => 'Max Discount', 'min' => 0]),

            'finish.required' => __('validation.required', ['attribute' => 'Finish']),
            'finish.boolean' => __('validation.boolean', ['attribute' => 'Finish']),

            'use_limit.integer' => __('validation.integer', ['attribute' => 'Use Limit']),
            'use_limit.min' => __('validation.min.numeric', ['attribute' => 'Use Limit', 'min' => 0]),

            'use_count.integer' => __('validation.integer', ['attribute' => 'Use Count']),
            'use_count.min' => __('validation.min.numeric', ['attribute' => 'Use Count', 'min' => 0]),

            'min_order.integer' => __('validation.integer', ['attribute' => 'Minimum Order']),
            'min_order.min' => __('validation.min.numeric', ['attribute' => 'Minimum Order', 'min' => 0]),

            'active.required' => __('validation.required', ['attribute' => 'Active']),
            'active.boolean' => __('validation.boolean', ['attribute' => 'Active']),

            'order_id.integer' => __('validation.integer', ['attribute' => 'Order']),
            'order_id.exists' => __('validation.exists', ['attribute' => 'Order']),
            'order_id.required' => __('validation.required', ['attribute' => 'Order']),

            'date_start.date' => __('validation.date', ['attribute' => 'Start Date']),
            'date_end.date' => __('validation.date', ['attribute' => 'End Date']),
            'date_end.after_or_equal' => __('validation.after_or_equal', ['attribute' => 'End Date', 'date' => 'Start Date']),
        ];
    }
}
