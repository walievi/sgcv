<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'customer_name'       => 'required|string|max:255',
            'products.*.id'       => 'required|exists:products,id',
            'products.*.quantity' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'customer_name.required'       => 'O nome do cliente é obrigatório.',
            'customer_name.string'         => 'O nome do cliente deve ser um texto.',
            'customer_name.max'            => 'O nome do cliente não pode ter mais que 255 caracteres.',
            'products.*.id.required'       => 'O ID do produto é obrigatório.',
            'products.*.id.exists'         => 'O produto selecionado não existe.',
            'products.*.quantity.required' => 'A quantidade do produto é obrigatória.',
            'products.*.quantity.integer'  => 'A quantidade do produto deve ser um número inteiro.',
            'products.*.quantity.min'      => 'A quantidade do produto deve ser no mínimo 1.',
        ];
    }
}