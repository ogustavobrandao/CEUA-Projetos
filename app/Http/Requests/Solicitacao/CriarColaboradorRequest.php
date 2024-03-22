<?php

namespace App\Http\Requests\Solicitacao;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Redirect;

class CriarColaboradorRequest extends FormRequest
{

    public function authorize()
    {
        return true; 
    }
    public function rules()
    {
        return [
            'solicitacao_id' => 'required|integer',
            'colab_nome' => 'required|string',
            'colab_telefone' => [
                'required',
                'regex:/^\(\d{2}\) \d{4,5}\-\d{4}$/',
            ],
            'colab_cpf' => [
                'required',
                'regex:/^\d{3}\.\d{3}\.\d{3}-\d{2}$/',
            ],
            'colab_instituicao_id' => 'required',
            'colab_grau_escolaridade' => 'required|string',
            'opcao_experiencia_previa' => 'in:on,off',
            'colab_experiencia_previa' => 'required_if:opcao_experiencia_previa,on|mimes:pdf',
            'colab_opcao_termo_responsabilidade' => 'in:on,off',
            'colab_termo_responsabilidade' => 'required_if:opcao_termo_responsabilidade,on|mimes:pdf',
            'colab_treinamento' => 'required_if:colab_treinamento_radio,on',
            'colab_treinamento_file' => 'required_if:colab_treinamento_radio,on|mimes:pdf',
            'colab_email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
            'colab_nome.required' => 'O nome é obrigatório.',
            'colab_cpf.required' => 'O CPF é obrigatório.',
            'colab_instituicao_id' => 'A instituição é obrigatória.',
            'colab_grau_escolaridade.required' => 'O grau de escolaridade é obrigatório.',
            'colab_experiencia_previa.required_if' => 'A experiência prévia é obrigatória caso a opção sim esteja marcada.',
            'colab_termo_responsabilidade.required_if' => 'O termo de responsabilidade é obrigatória caso a opção sim esteja marcada.',
            'mimes:pdf' => 'O :attribute deve ser um PDF',
            'colab_treinamento.required_if' => 'O treinamento é obrigatório caso a opção sim esteja marcada.',
            'colab_email.required' => 'O email é obrigatório.',
            'colab_email.email' => 'O email deve ser um endereço de e-mail válido.',
            'colab_telefone.required' => 'O telefone é obrigatório.',

        ];
    }

    protected function failedValidation(Validator $validator)
    {
        session()->flash('falhaValidacao', true);

        parent::failedValidation($validator);
    }

}
