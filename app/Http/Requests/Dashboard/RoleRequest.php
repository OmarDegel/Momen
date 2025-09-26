<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required|string|max:255|unique:roles,name,' . $this->route('role'),
            'display_name' => 'required|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => __('validation.required', ['attribute' => __('site.name')]),
            'name.string' => __('validation.string', ['attribute' => __('site.name')]),
            'name.max' => __('validation.max.string', ['attribute' => __('site.name'), 'max' => 255]),
            'name.unique' => __('validation.unique', ['attribute' => __('site.name')]),
            'display_name.string' => __('validation.string', ['attribute' => __('site.display_name')]),
            'display_name.max' => __('validation.max.string', ['attribute' => __('site.display_name'), 'max' => 255]),
            'display_name.required' => __('validation.required', ['attribute' => __('site.display_name')]),
            'permissions.array' => __('validation.array', ['attribute' => __('site.permissions')]),
            'permissions.*.exists' => __('validation.exists', ['attribute' => __('site.permissions')]),
        ];
    }
}
