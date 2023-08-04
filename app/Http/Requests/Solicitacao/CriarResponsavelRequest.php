<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rule;

class CriarResponsavelRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'solicitacao_id' => 'required|integer',
            'nome' => 'required|string',
            'email' => 'required|email',
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{5}\-\d{4}$/',
            ],
            'cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            ],
            'instituicao_id' => 'required|integer',
            'unidade_id' => 'required|integer',
            'departamento_id' => 'required|integer',
            'vinculo_instituicao' => 'required',
            'grau_escolaridade' => 'required',
            'experiencia_previa' => 'mimes:pdf',
            'termo_responsabilidade' => 'mimes:pdf',
        ];
    }

    public function messages()
    {

        return [
            'nome.required' => 'O nome é obrigatório.',
            'nome.string' => 'O nome deve ser uma string.',
            'email.required' => 'O e-mail é obrigatório.',
            'email.email' => 'O e-mail deve ser um endereço de e-mail válido.',
            'telefone.required' => 'O telefone é obrigatório.',
            'telefone.regex' => 'O telefone teve ter o formato válido.',
            'cpf.required' => 'O CPF é obrigatório.',
            'cpf.regex' => 'O CPF deve ter o formato válido.',
            'vinculo_instituicao.required' => 'O vínculo com a instituição é obrigatório.',
            'grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'mimes:pdf' => 'O :attribute deve ser um PDF',
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
