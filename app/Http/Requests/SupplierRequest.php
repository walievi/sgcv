<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'    => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'email'   => 'required|string|email|max:255|unique:suppliers,email,' . $this->route('supplier'),
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'    => 'O nome do fornecedor é obrigatório.',
            'name.string'      => 'O nome do fornecedor deve ser um texto.',
            'name.max'         => 'O nome do fornecedor não pode ter mais que 255 caracteres.',
            'contact.required' => 'O contato do fornecedor é obrigatório.',
            'contact.string'   => 'O contato do fornecedor deve ser um texto.',
            'contact.max'      => 'O contato do fornecedor não pode ter mais que 255 caracteres.',
            'email.required'   => 'O email do fornecedor é obrigatório.',
            'email.string'     => 'O email do fornecedor deve ser um texto.',
            'email.email'      => 'O email do fornecedor deve ser um endereço de email válido.',
            'email.max'        => 'O email do fornecedor não pode ter mais que 255 caracteres.',
            'email.unique'     => 'O email do fornecedor já está em uso.',
        ];
    }
}