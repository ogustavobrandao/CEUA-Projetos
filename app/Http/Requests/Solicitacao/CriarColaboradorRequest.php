<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class CriarColaboradorRequest extends FormRequest
{
    public function rules()
    {
        return [
            'solicitacao_id' => 'required|integer',
            'colaborador.*.nome' => 'required|string',
            'colaborador.*.cpf' => 'required|string',
            'colaborador.*.instituicao_id' => 'required|integer',
            'colaborador.*.grau_escolaridade' => 'required|string',
            'colaborador.*.experiencia_previa' => 'required|string',
            'colaborador.*.termo_responsabilidade' => 'required|string',
            'colaborador.*.treinamento' => 'required|string',
            'colaborador.*.email' => 'required|email',
            'colaborador.*.telefone' => 'required|string',

        ];
    }

    public function messages()
    {
        return [
            'colaborador.*.nome.required' => 'O nome é obrigatório.',
            'colaborador.*.cpf.required' => 'O CPF é obrigatório.',
            'colaborador.*.grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'colaborador.*.experiencia_previa.required' => 'A experiência prévia é obrigatória.',
            'colaborador.*.termo_responsabilidade.required' => 'O termo de responsabilidade é obrigatório.',
            'colaborador.*.treinamento.required' => 'O treinamento é obrigatório.',
            'colaborador.*.email.required' => 'O email é obrigatório.',
            'colaborador.*.email.email' => 'O email deve ser um endereço de email válido.',
            'colaborador.*.telefone.required' => 'O telefone é obrigatório.',

        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        if ($this->expectsJson()) {
            throw new \Illuminate\Http\Exceptions\HttpResponseException(
                response()->json(['errors' => $validator->errors()], \Illuminate\Http\JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
            );
        }

        $errors = $validator->errors();
        $this->session()->flash('errors', $errors);
        $this->session()->flash('old', $this->all());
        $this->session()->flash('status', 'danger');
        $this->throwResponse();
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('colaborador');
    }
}
