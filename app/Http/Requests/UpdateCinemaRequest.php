<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCinemaRequest extends FormRequest
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
            "salon" => ["integer" , "max:255"],
            "phone" => ["string" , "starts_with:+98"],
            "address" => ["string" , "max:255"],
            "capacity" => ["boolean"],
            "city_id" => ["integer"]
        ];
    }
}
