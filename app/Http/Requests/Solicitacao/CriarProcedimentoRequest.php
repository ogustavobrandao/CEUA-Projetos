<?php

namespace App\Http\Requests\Solicitacao;

use App\Models\ModeloAnimal;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarProcedimentoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'estresse' => 'required_if:estresse_radio,on|min:4',
            'anestesico' => 'required_if:anestesico_radio,on|min:4',
            'relaxante' => 'required_if:relaxante_radio,on|min:4',
            'analgesico' => 'required_if:analgesico_radio,on|min:4',
            'imobilizacao' => 'required_if:imobilizacao_radio,on|min:4',
            'inoculacao_substancia' => 'required_if:inoculacao_substancia_radio,on|min:4',
            'extracao' => 'required_if:extracao_radio,on|min:4',
            'jejum' => 'required_if:jejum_radio,on|min:4|max:255',
            'restricao_hidrica' => 'required_if:restricao_hidrica_radio,on|min:4|max:255',
        ];

    }

    public function messages()
    {

        return [
            'estresse.required_if' => 'O campo estresse / dor intencional é obrigatório.',
            'anestesico.required_if' => 'O campo uso de anestésicos é obrigatório.',
            'relaxante.required_if' => 'O campo uso de relaxante muscular é obrigatório.',
            'analgesico.required_if' => 'O campo uso de analgésicos é obrigatório.',
            'imobilizacao.required_if' => 'O campo imobilização / contenção é obrigatório.',
            'inoculacao_substancia.required_if' => 'O campo inoculação de substância é obrigatório.',
            'extracao.required_if' => 'O campo extração de materiais é obrigatório.',
            'jejum.required_if' => 'O campo jejum é obrigatório',
            'restricao_hidrica.required_if' => 'O campo restrição hídrica é obrigatório.',
            
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

