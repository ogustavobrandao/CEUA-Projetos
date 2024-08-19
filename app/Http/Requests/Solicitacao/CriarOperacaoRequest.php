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
                'detalhes_cirurgia' => 'required_if:flag_cirurgia,true_unica,true_multipla|min:4',
                'observacao_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla|min:4',
                'detalhes_observacao_recuperacao' => 'required_if:observacao_recuperacao,true|nullable|min:4',
                'analgesia_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla|min:4',
                'detalhes_analgesia_recuperacao' => 'required_if:analgesia_recuperacao,true|nullable|min:4',
                'detalhes_nao_uso_analgesia_recuperacao' => 'required_if:analgesia_recuperacao,false|nullable|min:4',
                'outros_cuidados_recuperacao' => 'required_if:flag_cirurgia,true_unica,true_multipla|min:4',
                'detalhes_outros_cuidados_recuperacao' => 'required_if:outros_cuidados_recuperacao,true|nullable|min:4',
            ];
        }
    }

    public function messages()
    {
        return [
            'detalhes_cirurgia.required_if' => 'O campo descrição da cirurgia é obrigatório.',
            'observacao_recuperacao.required_if' => 'O campo  é obrigatório',
            'detalhes_observacao_recuperacao.required_if' => 'O campo período de observação é obrigatório.',
            'analgesia_recuperacao.required_if' => 'O campo  é obrigatório',
            'detalhes_analgesia_recuperacao.required_if' => 'O campo de descrição do uso de analgesia é obrigatório.',
            'detalhes_nao_uso_analgesia_recuperacao.required_if' => 'O campo de descrição do não uso de analgesia é obrigatório.',
            'outros_cuidados_recuperacao.required_if' => 'O campo  é obrigatório',
            'detalhes_outros_cuidados_recuperacao.required_if' => 'O campo descrição de outros cuidados é obrigatório.',

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
