<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CardListSearchParametersRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'string',
            'utility' => 'array',
            'cmc' => 'number',
            'colors' => 'array',
            'type' => 'string',
            'rarity' => 'string',
            'power' => 'number',
            'toughness' => 'number',
            'imageUrl' => 'string',
            'quantity' => 'number',
        ];
    }
}
