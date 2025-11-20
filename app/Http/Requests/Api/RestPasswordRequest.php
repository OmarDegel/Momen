<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class RestPasswordRequest extends FormRequest
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
            'email'=>'required|email|exists:users,email',
            'password'=>'required|string|min:6|confirmed',
            'code'=>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => __('validation.required',['attribute'=>__('auth.email')]),
            'email.exists' => __('validation.exists',['attribute'=>__('auth.email')]),
            'email.email' => __('validation.email',['attribute'=>__('auth.email')]),
            'password.required' => __('validation.required',['attribute'=>__('auth.password')]),
            'password.string' => __('validation.string',['attribute'=>__('auth.password')]),
            'password.min' => __('validation.min.string',['attribute'=>__('auth.password'),'min'=>6]),    
            'password.confirmed' => __('validation.confirmed',['attribute'=>__('auth.password')]),
            'code.required' => __('validation.required',['attribute'=>__('auth.code')]),
        ];
    }
}