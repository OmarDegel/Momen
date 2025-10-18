<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class ColorRequest extends FormRequest
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
            'name.en' => 'required|string|max:50',
            'name.ar' => 'required|string|max:50',
            "active" => "boolean",
            "order_id" => "integer|min:0",
        ];
    }
    public function messages(): array
    {
        return [
            "active.boolean" => __("validation.boolean", ["attribute" => "active"]),
            "order_id.integer" => __("validation.integer", ["attribute" => "order_id"]),
            "order_id.min" => __("validation.min.numeric", ["attribute" => "order_id", "min" => 0]),
            "name.ar.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.en.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.ar.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.en.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.ar.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
            "name.en.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
        ];
    }
}
