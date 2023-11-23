<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreTicketRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "price" => ["required" , "integer"],
            "time" => ["required" , "integer" , "max:24"],
            "salon" => ["required" , "integer"],
            "section_id" => ["required" , "integer"],
            "user_id" => ["required" , "integer"]
        ];
    }
}
