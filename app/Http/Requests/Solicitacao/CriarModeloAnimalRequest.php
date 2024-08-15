<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\MessageBag;

class CriarModeloAnimalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'justificativa' => 'required|string|min:5|max:1000',
            'nome_cientifico' => 'required|string|min:4|max:255',
            'nome_vulgar' => 'required|string|min:4|max:255',
            'procedencia' => 'required',
            'termo_consentimento' => 'required|file',
            'quantidade' => [
                'required',
                'integer',
                function ($attribute, $value, $fail) {
                    $machos = $this->input('machos');
                    $femeas = $this->input('femeas');
                    $soma = $machos + $femeas;

                    if ($value != $soma) {
                        $fail("A quantidade deve ser igual à soma dos machos e fêmeas.");
                    }
                }
            ],
            'peso' => 'required|string|min:1',
            'idade' => 'required|numeric|min:1',
            'periodo' => 'required',
            'grupo_animal' => 'required',
            'linhagem' => 'required',
            'machos' => 'required',
            'femeas' => 'required',
            'observacao' => 'nullable'
        ];
    }
    public function messages()
    {
        return [
            'required' =>  'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto',
            'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
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
