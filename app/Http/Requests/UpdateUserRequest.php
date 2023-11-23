<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["string" , "min:3" , "max:255"],
            "family"=> ["string" , "min:4" , "max:255"],
            "phone"=> ["integer" , "starts_with:+98"],
            "email"=> ["email"],
            "password"=> ["min:8" , "max:255"]
        ];
    }
}
