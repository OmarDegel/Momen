<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
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
            "name.ar" => "required|string|max:255",
            "name.en" => "required|string|max:255",
            "type" => "required|string|max:255",
            "active" => "nullable|boolean",
            "order_id" => "nullable|integer",
            "image" => "nullable|image|mimes:jpg,jpeg,png,gif,webp|max:2048",
            "content.ar" => "nullable|string|max:1000",
            "content.en" => "nullable|string|max:1000",
        ];
    }
    public function messages(): array
    {
        return [
            "name.ar.required" => __("site.name_ar_required"),
            "name.en.required" => __("site.name_en_required"),
            "type.required" => __("site.type_required"),
            "active.boolean" => __("site.active_boolean"),
        ];
    }
}
