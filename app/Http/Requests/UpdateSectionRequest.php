<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSectionRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "to" => ["required" , "min:1" , "max:24"],
            "from" => ["required", "min:1" , "max:24"],
            "cinema_id" => ["required" , "numeric" , "exists:cinemas,id"],
            "movie_id" => ["required" , "numeric" , "exists:movies,id"]
        ];
    }
}
