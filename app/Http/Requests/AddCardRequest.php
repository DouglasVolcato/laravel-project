<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddCardRequest extends FormRequest
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
            'utilities' => 'array',
            'cmc' => 'numeric',
            'colors' => 'array',
            'type' => 'string',
            'rarity' => 'string',
            'power' => 'numeric',
            'toughness' => 'numeric',
            'imageUrl' => 'string',
            'quantity' => 'numeric',
        ];
    }
}
