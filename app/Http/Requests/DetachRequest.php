<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class DetachRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "role_id" => ["required", "integer", "exists:roles,id"],
            "users" => ["required", "array"],
            'users.*' => ['required', 'numeric', 'exists:users,id'],
        ];
    }
}
