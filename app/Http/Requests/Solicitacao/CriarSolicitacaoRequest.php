<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'titulo_en' => 'nullable|string|min:5|max:1000',
            'titulo_pt' => 'required|string|min:5|max:1000',
            'inicio' => 'required|date',
            'fim' => 'required|date|after:inicio',
            'solicitacao_id' => 'required|integer',
            'grandeArea' => 'required|integer',
            'area' => 'required|integer',
            'subArea' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'titulo_pt.required' => 'O título em português é um campo obrigatório.',
            'titulo_pt.string' => 'O título em português deve ser um texto.',
            'titulo_en.string' => 'O título em inglês deve ser um texto.',
            'titulo_pt.min' => 'O título em português deve possuir no minimo 5 caracteres.',
            'titulo_en.min' => 'O título em inglês deve possuir no minimo 5 caracteres.',
            'inicio.required' => 'A data de início é obrigatória.',
            'fim.required' => 'A data de fim é obrigatória.',
            'grandeArea.required' => 'A grande área é obrigatória.',
            'area.required' => 'A área é obrigatória.',
            'subArea.required' => 'A subárea é obrigatória.',
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
