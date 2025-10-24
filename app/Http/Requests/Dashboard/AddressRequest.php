<?php

namespace App\Http\Requests\Dashboard;

use Google\Rpc\Context\AttributeContext\Request;
use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
            "user_id" =>  "required|exists:users,id",
            "region_id" => "required|exists:regions,id",
            "city_id" => "required|exists:cities,id",
            "type" => "required",
            'name' => 'nullable|string',
            "phone" => "numeric|digits:11",
            "address" => "required|string",
            "building" => "nullable|string",
            "floor" => "nullable|string",
            "apartment" => "nullable|string",
            "additional_info" => "nullable|string",
            "latitude" => "required|string",
            "longitude" => "required|string",

        ];
    }

    public function messsage():array{
        return [
            "user_id.required" => __("validation.required", ["attribute" => "User ID"]),
            "region_id.required" => __("validation.required", ["attribute" => "Region ID"]),
            "city_id.required" => __("validation.required", ["attribute" => "City ID"]),
            "type.required" => __("validation.required", ["attribute" => "Type"]),
            "phone.numeric" => __("validation.numeric", ["attribute" => "Phone"]),
            "phone.digits" => __("validation.digits", ["attribute" => "Phone"]),
            "address.required" => __("validation.required", ["attribute" => "Address"]),
            "latitude.required" => __("validation.required", ["attribute" => "Latitude"]),
            "longitude.required" => __("validation.required", ["attribute" => "Longitude"]),
            'user_id.exists' => __("validation.exists", ["attribute" => "User ID"]),
            'region_id.exists' => __("validation.exists", ["attribute" => "Region ID"]),
            'city_id.exists' => __("validation.exists", ["attribute" => "City ID"]),
            'name.string' => __("validation.string", ["attribute" => "Name"]),
        ];
    }
}
