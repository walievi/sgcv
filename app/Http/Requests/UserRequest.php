<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Altere isso conforme necessário para autorizar a request
    }

    public function rules()
    {
        $userId = $this->route('user') ? $this->route('user')->id : null;

        return [
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,' . $userId,
            'password' => 'required|string|min:8|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'name.required'      => 'O nome é obrigatório.',
            'name.string'        => 'O nome deve ser um texto.',
            'name.max'           => 'O nome não pode ter mais que 255 caracteres.',
            'email.required'     => 'O email é obrigatório.',
            'email.string'       => 'O email deve ser um texto.',
            'email.email'        => 'O email deve ser um endereço de email válido.',
            'email.max'          => 'O email não pode ter mais que 255 caracteres.',
            'email.unique'       => 'O email já está em uso.',
            'password.required'  => 'A senha é obrigatória.',
            'password.string'    => 'A senha deve ser um texto.',
            'password.min'       => 'A senha deve ter no mínimo 8 caracteres.',
            'password.confirmed' => 'A confirmação da senha não corresponde.',
        ];
    }
}