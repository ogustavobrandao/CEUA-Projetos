<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

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
            'num_animais_grupo' => 'required | numeric | min:0',
            'especificar_grupo' => 'required',
            'criterios' => 'required',
            'desc_materiais_metodos' => 'required',
            'analise_estatistica' => 'required',
            'outras_infos' => 'required',
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
}
