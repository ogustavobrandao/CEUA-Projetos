<?php

namespace App\Http\Requests\Solicitacao;

use App\Models\ModeloAnimal;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'condicoes_particulares' => 'required|min:4|max:1000',
            'local' => 'required|min:4|max:1000',
            'ambiente_alojamento' => 'required',
            'tipo_cama' => 'required',
            'num_animais_ambiente' => 'required|numeric|min:0',
            'dimensoes_ambiente' => 'required',
            'periodo' => 'required',
            'profissional_responsavel' => 'required|min:4|max:255',
            'email_responsavel' => 'required|email|max:255',
        ];
    }

    public function messages()
    {
        return [
            'condicoes_particulares.required'  => 'O campo condições particulares é obrigatório.',
            'local.required'  => 'O campo local é obrigatório.',
            'ambiente_alojamento.required'  => 'O campo ambiente de alojamento é obrigatório.',
            'tipo_cama.required'  => 'O campo tipo de cama é obrigatório.',
            'num_animais_ambiente.required'  => 'O campo número de animais por ambiente é obrigatório.',
            'dimensoes_ambiente.required'  => 'O campo dimensões do ambiente é obrigatório.',
            'periodo.required'  => 'O campo período é obrigatório.',
            'profissional_responsavel.required'  => 'O profissional responsável é obrigatório.',
            'email_responsavel.required'  => 'O campo e-mail do responsável é obrigatório.',
            '*.numeric'  => 'O campo deve ser um número',
            'num_animais_ambiente.min' => 'O número deve ser acima ou igual a 0'
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
