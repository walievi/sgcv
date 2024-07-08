<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplyRequest extends FormRequest
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
            'name.required'      => 'O nome do insumo é obrigatório.',
            'name.string'        => 'O nome do insumo deve ser um texto.',
            'name.max'           => 'O nome do insumo não pode ter mais que 255 caracteres.',
            'description.string' => 'A descrição do insumo deve ser um texto.',
        ];
    }
}