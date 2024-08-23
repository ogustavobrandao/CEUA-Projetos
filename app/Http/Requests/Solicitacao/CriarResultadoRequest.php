<?php

namespace App\Http\Requests\Solicitacao;

use App\Models\ModeloAnimal;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
class CriarResultadoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        return [
            'abate' => 'required_if:abate_radio,==,true|min:4',
            'destino_animais' => 'required|min:4',
            'justificativa_metodos' => 'required|min:4',
            'resumo_procedimento' => 'required|min:4',
            'outras_informacoes' => 'required|min:4',
        ];
    }

    public function messages()
    {
        return [
            'abate.required'  => 'O campo abate é obrigatório',
            'destino_animais.required'  => 'O campo destino dos animais é obrigatório.',
            'justificativa_metodos.required'  => 'O campo justificativa dos métodos é obrigatório.',
            'resumo_procedimento.required'  => 'O campo resumo do procedimento é obrigatório.',
            'outras_informacoes.required'  => 'O campo outras informações é obrigatório.',
            '*.required_if'  => 'O campo :attribute é obrigatório.',
            'outras_informacoes.min' => 'Outras informações tem uma quantidade mínima.',
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
