<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name_first' => 'required|string|max:255',
            "name_last" => 'required|string|max:255',
            "email" => 'required|email|unique:users,email',
            'phone' => 'required|string|unique:users,phone',
            'password' => 'required|string|confirmed|min:8|max:32',
            'token' => 'required|string',
            'code' => 'required|string',
            'device_type' => 'required|string|in:android,ios,huawei',
            'imei' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'name_first.required' => __('validation.required', ['attribute' => __('auth.first_name')]),
            'name_first.max' => __('validation.max.string', ['attribute' => __('auth.first_name'), 'max' => 255]),
            'name_last.required' => __('validation.required', ['attribute' => __('auth.last_name')]),
            'name_last.max' => __('validation.max.string', ['attribute' => __('auth.last_name'), 'max' => 255]),
            'email.required' => __('validation.required', ['attribute' => __('auth.email')]),
            'email.unique' => __('validation.unique', ['attribute' => __('auth.email')]),
            'phone.required' => __('validation.required', ['attribute' => __('auth.phone')]),
            'phone.unique' => __('validation.unique', ['attribute' => __('auth.phone')]),
            'password.required' => __('validation.required', ['attribute' => __('auth.password')]),
            'password.confirmed' => __('validation.confirmed', ['attribute' => __('auth.password')]),
            'code.required' => __('validation.required', ['attribute' => __('auth.code')]),
            'device_type.required' => __('validation.required', ['attribute' => __('auth.device_type')]),
            'device_type.in' => __('validation.in', ['attribute' => __('auth.device_type')]),
            'imei.required' => __('validation.required', ['attribute' => __('auth.imei')]),
            'token.required' => __('validation.required', ['attribute' => __('auth.token')]),
        ];
    }
}
