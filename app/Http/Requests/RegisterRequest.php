<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{

    /**
     * Determine if the user is auth
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required", "string", "min:3", "max:255"],
            "family" => ["required" , "string", "min:4", "max:255"],
            "number" => ["required", "integer", "starts_with:+98"],
            "email" => ["required", "email"],
            "password" => ["required", "string", "min:8", "confirmed"],
            "password_confirmation" => ["required", "string", "min:8"]
        ];
    }
}
