<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ChangeImageRequest extends FormRequest
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
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => __("validation.image_required"),
            'image.image' => __("validation.image_image"),
            'image.mimes' => __("validation.image_mimes", ["mimes" => "jpeg,png,jpg,gif,svg"]),
            'image.max' => __("validation.image_max", ["max" => 2048]),
        ];
    }
}
