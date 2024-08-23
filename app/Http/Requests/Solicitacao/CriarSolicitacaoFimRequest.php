<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarSolicitacaoFimRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'solicitacao_id' => 'required|integer',
            'relevancia' => 'required|string|min:5',
            'justificativa' => 'required|string|min:5',
            'objetivos' => 'required|string|min:5',
            'resumo' => 'required|string|min:5',
            'referencias' => 'nullable',
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto',
            'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
            'relevancia.required' => 'O campo relevância é obrigatório.',
            'referencias.max' => 'O campo referências deve possuir no máximo 1000 caracteres.'
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
