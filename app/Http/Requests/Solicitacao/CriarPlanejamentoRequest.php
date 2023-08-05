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
            'especificar_grupo' => 'required|min:4|max:1000',
            'criterios' => 'required|min:4|max:1000',
            'desc_materiais_metodos' => 'required|min:4|max:1000',
            'analise_estatistica' => 'required|min:4|max:1000',
            'outras_infos' => 'required|min:4|max:1000',
            'grau_invasividade' => 'required',

        ];
    }

    public function messages()
    {

        return [
            '*.required'  => 'O :attribute é obrigatório',
            '*.numeric'  => 'O :attribute deve ser um número',
            'num_animais_grupo.min' => 'O número deve ser acima ou igual a 0'
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

