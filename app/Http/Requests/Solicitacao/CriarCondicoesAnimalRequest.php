<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;

class CriarCondicoesAnimalRequest extends FormRequest
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
            'condicoes_particulares' => 'required',
            'local' => 'required',
            'ambiente_alojamento' => 'required',
            'tipo_cama' => 'required',
            'num_animais_ambiente' => 'required | numeric | min:0',
            'dimensoes_ambiente' => 'required',
            'periodo' => 'required',
            'profissional_responsavel' => 'required',
            'email_responsavel' => 'required | email',
        ];
    }

    public function messages()
    {
        return [
            'planejamento_id.required'  => 'Necessária a criação de um planejamento',
            '*.required'  => 'O :attribute é obrigatório',
            '*.numeric'  => 'O :attribute deve ser um número',
            'num_animais_ambiente.min' => 'O número deve ser acima ou igual a 0'
        ];
    }
}
