<?php

namespace App\Http\Requests\Solicitacao;

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
            'planejamento_id' => 'required',
            'estresse' => 'required_if:estresse_radio,==,on',
            'anestesico' => 'required_if:anestesico_radio,==,on',
            'relaxante' => 'required_if:relaxante_radio,==,on',
            'analgesico' => 'required_if:analgesico_radio,==,on',
            'imobilizacao' => 'required_if:imobilizacao_radio,==,on',
            'inoculacao_substancia' => 'required_if:inoculacao_substancia_radio,==,on',
            'extracao' => 'required_if:extracao_radio,==,on',
            'jejum' => 'required_if:jejum_radio,==,on',
            'restricao_hidrica' => 'required_if:restricao_hidrica_radio,==,on',
        ];

    }

    public function messages()
    {

        return [
            'planejamento_id.required' => 'Necessária a criação de um planejamento',
            '*.required_if' => 'O de texto :attribute é obrigatório',
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

