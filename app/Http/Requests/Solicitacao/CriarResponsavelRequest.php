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
            'nome' => 'required|string|min:4|max:255',
            'email' => 'required|email|max:255',
            'telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{4,5}\-\d{4}$/',
            ],
            'cpf' => [
                'required',
                'cpf',
            ],
            'instituicao_id' => 'required|integer',
            'unidade_id' => 'required|integer',
            'departamento_id' => 'required|integer',
            'vinculo_instituicao' => 'required',
            'grau_escolaridade' => 'required',
            'experiencia_previa' => 'required_if:experiencia_previa_radio,on','mimes:pdf',
            'termo_responsabilidade' => 'required','mimes:pdf',
            'treinamento_file' => 'required_if:treinamento_radio,on','mimes:pdf',
            'treinamento' => 'required_if:treinamento_radio,on|min:4|max:1000',
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
            'cpf.cpf' => 'O CPF deve ter o formato válido.',
            'instituicao_id.required' => 'O campo instituição é obrigatório.',
            'instituicao_id.integer' => 'O campo instituição deve ser um número inteiro.',
            'vinculo_instituicao.required' => 'O vínculo com a instituição é obrigatório.',
            'grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'mimes:pdf' => 'O :attribute deve ser um PDF',
            'treinamento.required_if' => 'O  campo de treinamento é obrigatório.',
            'treinamento_file.required_if' => 'O campo de PDF do treinamento é obrigatório.',
            'termo_responsabilidade.required' => 'O campo termo de responsabilidade é obrigatório.',
            'unidade_id.required' => 'O campo unidade é obrigatório.',
            'departamento_id.required' => 'O campo departamento é obrigatório.',
            'experiencia_previa.required_if' => 'O campo de PDF da experiência prévia é obrigatóio'

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
