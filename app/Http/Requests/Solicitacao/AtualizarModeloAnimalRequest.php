<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\MessageBag;

class AtualizarModeloAnimalRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'justificativa' => 'required|string',
            'nome_cientifico' => 'required|string',
            'nome_vulgar' => 'required|string',
            'procedencia' => 'required',
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

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $errors = (new MessageBag)->withErrors($validator)->toArray();
        $this->session()->flash('errors', $errors);
        $this->session()->flash('old', $this->all());
        $this->session()->flash('status', 'danger');
        $this->throwResponse();
    }

    public function withValidator($validator)
    {
        $validator->validateWithBag('modelo');
    }
}
