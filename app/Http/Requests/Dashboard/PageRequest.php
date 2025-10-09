<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PageRequest extends FormRequest
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
            "name.en" => "required|string|max:50",
            "name.ar" => "required|string|max:50",
            "link" => "nullable|string|max:50",
            "active" => "required|boolean",
            "feature" => "required|boolean",
            "page_type" => "required|string|max:50",
            "type" => "required|string|max:50",
            "image" => "required|image|mimes:jpg,jpeg,png,gif,webp",
            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",
            "title.ar" => "required|string|max:100",
            "title.en" => "required|string|max:100",
            "video" => "nullable|string|max:100",
            "order_id" => "required|integer|min:0",
            "parent_id" => "nullable|exists:pages,id",
            "product_id" => "nullable|integer|min:0,exists:products",
        ];
    }
    public function messages(): array
    {
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
            "link.required" => __("validation.required", ["attribute" => "link"]),
            "link.string" => __("validation.string", ["attribute" => "link"]),
            "link.max" => __("validation.max.string", ["attribute" => "link", "max" => 50]),
            "link.unique" => __("validation.unique", ["attribute" => "link"]),
            "image.image" => __("validation.image", ["attribute" => "image"]),
            "image.mimes" => __("validation.mimes", ["attribute" => "image", "values" => "jpg,jpeg,png,gif,webp"]),
            "image.max" => __("validation.max.file", ["attribute" => "image", "max" => 2048]),
            "content.ar.string" => __("validation.string", ["attribute" => __("site.content")]),
            "content.en.string" => __("validation.string", ["attribute" => __("site.content")]),
            "content.ar.max" => __("validation.max.string", ["attribute" => __("site.content"), "max" => 1000]),
            "content.en.max" => __("validation.max.string", ["attribute" => __("site.content"), "max" => 1000]),
            "title.ar.string" => __("validation.string", ["attribute" => __("site.title")]),
            "title.en.string" => __("validation.string", ["attribute" => __("site.title")]),
            "title.ar.max" => __("validation.max.string", ["attribute" => __("site.title"), "max" => 100]),
            "title.en.max" => __("validation.max.string", ["attribute" => __("site.title"), "max" => 100]),
            "video.string" => __("validation.string", ["attribute" => "video"]),
            "video.max" => __("validation.max.string", ["attribute" => "video", "max" => 100]),
            "parent_id.exists" => __("validation.exists", ["attribute" => "parent_id"]),
            "product_id.exists" => __("validation.exists", ["attribute" => "product_id"]),
            'page_type.required' => __("validation.required", ["attribute" => __("site.page_type")]),
            'page_type.string' => __("validation.string", ["attribute" => __("site.page_type")]),
            'page_type.max' => __("validation.max.string", ["attribute" => __("site.page_type"), "max" => 50]),
            'type.required' => __("validation.required", ["attribute" => __("site.type")]),
            'type.string' => __("validation.string", ["attribute" => __("site.type")]),
            'type.max' => __("validation.max.string", ["attribute" => __("site.type"), "max" => 50]),
        ];
    }
    protected function prepareForValidation()
    {
        if ($this->product_id === 'null') {
            $this->merge([
                'product_id' => null,
            ]);
        }
    }
}
