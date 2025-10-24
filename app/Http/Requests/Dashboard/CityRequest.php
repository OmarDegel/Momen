<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'name.en' => 'required|string|max:50|unique:cities,name->en,' . $this->route('city'),
            'name.ar' => 'required|string|max:50|unique:cities,name->ar,' . $this->route('city'),
            "oreder" => "integer|min:0",
            'active' => 'required|boolean',
            'shipping' => 'required|numeric|min:0',
        ];
    }
    public function messages(){
            return [
            "active.boolean" => __("validation.boolean", ["attribute" => "active"]),
            "active.required" => __("validation.required", ["attribute" => "active"]),
            "order_id.integer" => __("validation.integer", ["attribute" => "order_id"]),
            "order_id.min" => __("validation.min.numeric", ["attribute" => "order_id", "min" => 0]),
            "name.ar.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.en.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.ar.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.en.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.ar.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
            "name.en.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
            "name.ar.unique" => __("validation.unique", ["attribute" => __("site.name")]),
            "name.en.unique" => __("validation.unique", ["attribute" => __("site.name")]),
            "shipping.required" => __("validation.required", ["attribute" => "shipping"]),
            "shipping.numeric" => __("validation.numeric", ["attribute" => "shipping"]),
            "shipping.min" => __("validation.min.numeric", ["attribute" => "shipping", "min" => 0]),
        ];
    }
}
