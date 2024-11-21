<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'cidade_id' => 'nullable|exists:cidades,_id',
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
            'cidade_id.exists' => 'A cidade informada não existe.',
        ];
    }

    /**
     * Handle a failed validation attempt.
     *
     * @param  \Illuminate\Contracts\Validation\Validator  $validator
     * @return void
     *
     * @throws \Illuminate\Http\Exceptions\HttpResponseException
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'errors' => $validator->errors()
        ], 422));
    }
}
