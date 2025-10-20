<?php

namespace App\Http\Requests;

use App\Enums\PropertiesTypesEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Enum;

class CreatePropertyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
        // return $this->user() !== null
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:50',
            'description' => 'nullable|string|max:225',
            'for_sale' => 'required|boolean',
            'for_rent' => 'required|boolean',
            'sale_price' => 'nullable|numeric|min:0',
            'rent_price' => 'nullable|numeric|min:0',
            'condominium_price' => 'nullable|numeric|min:0',
            'type' => ['required', new Enum(PropertiesTypesEnum::class)],
            'active' => 'sometimes|boolean',
        ];
    }
}
