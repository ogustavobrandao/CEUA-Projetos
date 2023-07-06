<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

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
        ];
    }

    public function messages()
    {
        return [
            'required' =>  'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto',
            'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
        ];
    }
}
