<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

class CriarEutanasiaRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'planejamento_id' => 'required',
            'destino' => 'required',
            'descarte' => 'required',
            'metodo' => 'required_if:eutanasia,==,true',
            'descricao' => 'required_if:eutanasia,==,true',
            'justificativa_metodo' => 'required_if:eutanasia,==,true',
        ];
    }

    public function messages()
    {
        return [
            'planejamento_id.required' => 'Necessária a criação de um planejamento',
            '*.required' => 'O :attribute é obrigatório',
            '*.required_if' => 'O :attribute é obrigatório',
        ];
    }
}
