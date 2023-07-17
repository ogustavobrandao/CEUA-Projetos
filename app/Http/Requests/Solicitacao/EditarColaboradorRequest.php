<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

class EditarColaboradorRequest extends FormRequest
{
    public function rules()
    {

        return [
            'solicitacao_id' => 'required|integer',
            'nome' => 'required|string',
            'cpf' => 'required|string',
            'grau_escolaridade' => 'required|string',
            'experiencia_previa' => 'file',
            'termo_responsabilidade' => 'file',
            'treinamento' => 'required|string',
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
            'termo_responsabilidade.required' => 'O termo de responsabilidade é obrigatório.',
            'treinamento.required' => 'O treinamento é obrigatório.',
            'email.required' => 'O email é obrigatório.',
            'email.email' => 'O email deve ser um endereço de email válido.',
            'telefone.required' => 'O telefone é obrigatório.',

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
