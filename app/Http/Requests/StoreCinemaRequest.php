<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCinemaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "name" => ["required" , "string" , "min:3" , "max:255"],
            "salon" => ["required" , "integer" , "max:255"],
            "phone" => ["string" , "starts_with:+98"],
            "address" => ["required" , "string" , "max:255"],
            "capacity" => ["boolean"],
            "city_id" => ["required" , "integer"]
        ];
    }
}
