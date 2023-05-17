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
            'page' => 'string',
            'name' => 'string',
            'cmc' => 'number',
            'colors' => 'string',
            'types' => 'string',
            'supertypes' => 'string',
            'rarity' => 'string',
            'text' => 'string',
            'power' => 'number',
            'toughness' => 'number',
        ];
    }
}
