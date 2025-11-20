<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'sort_by' => 'nullable|in:latest,oldest',
            'is_parents' => 'nullable|in:0,1',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
    public function messages(): array
    {
        return [
            'search.string' => __('validation.string', ['attribute' => 'search']),
            'sort_by.in' => __('validation.in', ['attribute' => 'sort_by']),
            'is_parents.in' => __('validation.in', ['attribute' => 'is_parents']),
            'parent_id.in' => __('validation.in', ['attribute' => 'parent_id']),
        ];
    }
}
