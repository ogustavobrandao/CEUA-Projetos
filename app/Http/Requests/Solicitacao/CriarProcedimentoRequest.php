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
            'planejamento_id' => 'required',
            'estresse' => 'required_if:estresse_radio,on|min:4|max:255',
            'anestesico' => 'required_if:anestesico_radio,on|min:4|max:255',
            'relaxante' => 'required_if:relaxante_radio,on|min:4|max:255',
            'analgesico' => 'required_if:analgesico_radio,on|min:4|max:255',
            'imobilizacao' => 'required_if:imobilizacao_radio,on|min:4|max:255',
            'inoculacao_substancia' => 'required_if:inoculacao_substancia_radio,on|min:4|max:255',
            'extracao' => 'required_if:extracao_radio,on|min:4|max:255',
            'jejum' => 'required_if:jejum_radio,on|min:4|max:255',
            'restricao_hidrica' => 'required_if:restricao_hidrica_radio,on|min:4|max:255',
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
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $modelo_animal = ModeloAnimal::find($this->input('modelo_animal_id'));

            if (!$modelo_animal->planejamento) {
                $validator->errors()->add('planejamentoFail', 'Falha no planejamento');
            }
        });
    }
}

