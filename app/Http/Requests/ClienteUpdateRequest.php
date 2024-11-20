<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'nome' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255|unique:clientes,email',
            'telefone' => 'nullable|string|max:20',
        ];
    }

    public function messages()
    {
        return [
            'nome.string' => 'O nome deve ser uma string.',
            'nome.max' => 'O nome não pode ter mais que 255 caracteres.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'email.max' => 'O email não pode ter mais que 255 caracteres.',
            'email.unique' => 'Este email já está em uso.',
            'telefone.string' => 'O telefone deve ser uma string.',
            'telefone.max' => 'O telefone não pode ter mais que 20 caracteres.',
        ];
    }
}
