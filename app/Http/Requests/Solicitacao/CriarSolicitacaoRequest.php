<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

class CriarSolicitacaoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'titulo_en' => 'nullable|string|min:5',
            'titulo_pt' => 'required|string|min:5',
            'inicio' => 'required|date',
            'fim' => 'required|date',
            'solicitacao_id' => 'required|integer',
            'grandeArea' => 'required|integer',
            'area' => 'required|integer',
            'subArea' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'titulo_pt.required' => 'O titulo em português é um campo obrigatório.',
            'titulo_pt.string' => 'O titulo em português deve ser um texto',
            'titulo_en.string' => 'O titulo em inglês deve ser um texto',
            'titulo_pt.min' => 'O titulo em português deve possuir no minimo 5 caracteres',
            'titulo_en.min' => 'O titulo em inglês deve possuir no minimo 5 caracteres',
            'inicio.required' => 'A data de inicio é obrigatória',
            'fim.required' => 'A data de fim é obrigatória',
        ];
    }
}
