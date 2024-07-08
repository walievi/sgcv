<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => 'required|string|max:255',
            'description' => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'      => 'O nome do produto é obrigatório.',
            'name.string'        => 'O nome do produto deve ser um texto.',
            'name.max'           => 'O nome do produto não pode ter mais que 255 caracteres.',
            'description.string' => 'A descrição do produto deve ser um texto.',
        ];
    }
}