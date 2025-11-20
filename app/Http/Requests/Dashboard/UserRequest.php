<?php

namespace App\Http\Requests\Dashboard;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UserRequest extends FormRequest
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
     public function rules(Request $request): array
    {
        $userId = $request->input("id");
        $route = $request->route();
        $isProfileRoute= $route->getName() == 'dashboard.profile.update';
        $rules = [
            'name_first' => ['required', 'string', 'max:255'],
            'name_last' => ['required', 'string', 'max:255'],
            'phone' => $userId ? 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone,' . $userId : 'required|string|regex:/^01[0125][0-9]{8}$/|unique:users,phone',
            'email' => $userId ? 'required|string|email|unique:users,email,' . $userId : 'required|email|unique:users,email',
            'password' => $userId ? 'nullable|confirmed|min:8|max:32' : 'required|confirmed|min:8|max:32',
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048",
        ];

        if (!$isProfileRoute) {
            $rules = array_merge($rules, [
                "roles.*" => "required|exists:roles,id",
                "vip" => "boolean",
                "is_notify" => "boolean",
                "locale" => "in:ar,en",
                "type" => "required"
            ]);
        }else{
            $rules = array_merge($rules, [
                "locale" => "in:ar,en",
                "theme" => "in:light,dark"
            ]);
        }

        return $rules;
    }
}
