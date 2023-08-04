<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarColaboradorRequest extends FormRequest
{
    public function rules()
    {

        return [
            'solicitacao_id' => 'required|integer',
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'grau_escolaridade' => 'required|string',
            'opcao_experiencia_previa' => 'in:on,off',
            'experiencia_previa' => 'required_if:opcao_experiencia_previa,on|mimes:pdf',
            'termo_responsabilidade' => 'mimes:pdf',
            'treinamento' =>'required',
            'email' => 'required|email',
            'telefone' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'experiencia_previa.required' => 'A experiência prévia é obrigatória.',
            'mimes:pdf' => 'O :attribute deve ser um PDF',
            'treinamento.required' => 'O treinamento é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'telefone.required' => 'O telefone é obrigatório.',

        ];
    }
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(
            response()->json([
                'message' => 'Falha na validação',
                'errors' => $validator->errors(),
            ], 422)
        );
    }
}
