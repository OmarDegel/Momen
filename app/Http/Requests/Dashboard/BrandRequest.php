<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
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
            'name.en' => 'required|string|max:50|unique:brands,name->en,' . $this->route('brand'),
            'name.ar' => 'required|string|max:50|unique:brands,name->ar,' . $this->route('brand'),
            "image" => $this->route('brand') ? "nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048" : "required|image|mimes:jpg,jpeg,png,gif,webp|max:2048",
            'active' => 'required|boolean',
            "order_id" => 'required|integer'
        ];
    }
    public function messages()
    {
        return [
            'name.en.required' => __("validation.required", ["attribute" => __("site.name")]),
            'name.ar.required' => __("validation.required", ["attribute" => __("site.name")]),
            'name.en.string' => __("validation.string", ["attribute" => __("site.name")]),
            'name.ar.string' => __("validation.string", ["attribute" => __("site.name")]),
            'name.en.max' => __("validation.max.string", ["attribute" => __("site.name"), "max" => 255]),
            'name.ar.max' => __("validation.max.string", ["attribute" => __("site.name"), "max" => 255]),
            'name.en.unique' => __("validation.unique", ["attribute" => __("site.name")]),
            'name.ar.unique' => __("validation.unique", ["attribute" => __("site.name")]),
            'active.boolean' => __("validation.boolean", ["attribute" => "active"]),
            'active.required' => __("validation.required", ["attribute" => "active"]),
            'order_id.integer' => __("validation.integer", ["attribute" => "order_id"]),
            'order_id.min' => __("validation.min.numeric", ["attribute" => "order_id", "min" => 0]),
        ];
    }
}
