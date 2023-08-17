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
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{4,5}\-\d{4}$/',
            ],
            'cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            ],
            'grau_escolaridade' => 'required|string',
            'opcao_experiencia_previa' => 'in:on,off',
            'experiencia_previa' => 'required_if:opcao_experiencia_previa,on|mimes:pdf',
            'opcao_termo_responsabilidade' => 'in:on,off',
            'termo_responsabilidade' => 'required_if:opcao_termo_responsabilidade,on|mimes:pdf',
            'treinamento' => 'required_if:opcao_treinamento,on|min:3|max:1000',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório.',
            'cpf.required' => 'O CPF é obrigatório.',
            'grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'experiencia_previa.required_if' => 'A experiência prévia é obrigatória caso a opção sim esteja marcada.',
            'termo_responsabilidade.required_if' => 'O termo responsabilidade é obrigatória caso a opção sim esteja marcada.',
            'mimes:pdf' => 'O :attribute deve ser um PDF',
            'treinamento.required_if' => 'O treinamento é obrigatório caso a opção sim esteja marcada.',
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
