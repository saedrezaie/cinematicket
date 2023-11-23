<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTicketRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
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
