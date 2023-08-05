<?php

namespace App\Http\Requests\Solicitacao;

use App\Models\ModeloAnimal;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            '*.required' => 'O :attribute é obrigatório',
            '*.required_if' => 'O :attribute é obrigatório',
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
