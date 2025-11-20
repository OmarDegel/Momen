<?php

namespace App\Http\Requests\Dashboard;

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
        $categoryId = $this->route('category');
        return [
            'name.en' => 'required|string|max:50|unique:categories,name->en,' . $categoryId,
            'name.ar' => 'required|string|max:50|unique:categories,name->ar,' . $categoryId,
            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",
            "image" => $categoryId ? "nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048" : "required|image|mimes:jpg,jpeg,png,gif,webp|max:2048",
            "parent_id" => "nullable|exists:categories,id",
            "active" => "boolean",
            "order_id" => "integer|min:0",
        ];
    }
    public function messages(): array
    {
        return [
            "parent_id.exists" => __("validation.exists", ["attribute" => "parent_id"]),
            "service_id.exists" => __("validation.exists", ["attribute" => "service_id"]),
            "active.boolean" => __("validation.boolean", ["attribute" => "active"]),
            "order_id.integer" => __("validation.integer", ["attribute" => "order_id"]),
            "order_id.min" => __("validation.min.numeric", ["attribute" => "order_id", "min" => 0]),
            "image.image" => __("validation.image", ["attribute" => "image"]),
            "name.ar.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.en.required" => __("validation.required", ["attribute" => __("site.name")]),
            "name.ar.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.en.string" => __("validation.string", ["attribute" =>  __("site.name")]),
            "name.ar.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
            "name.en.max" => __("validation.max.string", ["attribute" =>  __("site.name"), "max" => 255]),
            "name.ar.unique" => __("validation.unique", ["attribute" => __("site.name")]),
            "name.en.unique" => __("validation.unique", ["attribute" => __("site.name")]),
            "content.ar.string" => __("validation.string", ["attribute" => __("site.content")]),
            "content.en.string" => __("validation.string", ["attribute" => __("site.content")]),
            "content.ar.max" => __("validation.max.string", ["attribute" => __("site.content"), "max" => 1000]),
            "content.en.max" => __("validation.max.string", ["attribute" => __("site.content"), "max" => 1000]),
            
        ];
    }
    protected function prepareForValidation()
    {
        if ($this->has('parent_id') && $this->parent_id === 'null') {
            $this->merge([
                'parent_id' => null,
            ]);
        }
    }
}
