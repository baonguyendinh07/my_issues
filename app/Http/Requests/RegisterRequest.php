<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => "string|min:5|max:50",
            "nick_name" => "required|string|min:3|max:15",
            "email" => "required|email|min:10|max:50|unique:users",
            "password" => "required|string|min:12|max:32",
            "phone_number" => "string|min:8|max:20",
            "language" => "required|string|min:2|max:5",
        ];
    }
}
