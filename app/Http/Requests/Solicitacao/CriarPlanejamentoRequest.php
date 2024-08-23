<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarPlanejamentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'num_animais_grupo' => 'required|numeric|min:1',
            'especificar_grupo' => 'required|min:4',
            'criterios' => 'required|min:4',
            'desc_materiais_metodos' => 'required|min:4',
            'analise_estatistica' => 'required|min:4',
            'outras_infos' => 'required|min:4',
            'grau_invasividade' => 'required',

        ];
    }

    public function messages()
    {

        return [
            'num_animais_grupo.required'  => 'O campo número dos grupos de animais é obrigatório.',
            'especificar_grupo.required'  => 'O campo :attribute é obrigatório.',
            'criterios.required'  => 'O campo :attribute é obrigatório.',
            'desc_materiais_metodos.required'  => 'O campo descrição de materias e métodos é obrigatório.',
            'analise_estatistica.required'  => 'O campo análise estatística é obrigatório.',
            'outras_infos.required'  => 'O campo outras informações é obrigatório.',
            '*.required'  => 'O :attribute é obrigatório.',
            '*.numeric'  => 'O valor deve ser um número.',
            'num_animais_grupo.min' => 'O número deve ser acima ou igual a 0.'
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

