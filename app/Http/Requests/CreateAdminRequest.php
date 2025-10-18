<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'     => ['required', 'string', 'min:3', 'max:30'],
            'email'    => ['required', 'email', 'max:15', 'unique:users,email'],
            'password' => ['required', 'string', 'min:5'],
        ];
    }
}
