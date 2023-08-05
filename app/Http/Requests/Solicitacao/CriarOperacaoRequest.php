<?php

namespace App\Http\Requests\Solicitacao;

use App\Models\ModeloAnimal;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CriarOperacaoRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {

        if($this->input("flag_cirurgia") === 'false')
        {
            return [
                'flag_cirurgia' => 'required',
            ];
        }
        else {

            return [
                'flag_cirurgia' => 'required',
                'detalhes_cirurgia' => 'required_if:flag_cirurgia,true_unica,true_multipla',
                'observacao_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla',
                'detalhes_observacao_recuperacao' => 'required_if:observacao_recuperacao,true',
                'analgesia_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla',
                'detalhes_analgesia_recuperacao' => 'required_if:analgesia_recuperacao,true',
                'detalhes_nao_uso_analgesia_recuperacao' => 'required_if:analgesia_recuperacao,false',
                'outros_cuidados_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla',
                'detalhes_outros_cuidados_recuperacao' => 'required_if:outros_cuidados_recuperacao,true',
            ];
        }
    }

    public function messages()
    {
        return [
            '*.required_if' => 'O campo :attribute é obrigatório',
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
