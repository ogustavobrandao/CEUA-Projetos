<?php

namespace App\Http\Requests;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUsuarioRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'              => ['required', 'string', 'min:10', 'max:255', 'regex:/^[A-Za-záâãéêíóôõúçÁÂÃÉÊÍÓÔÕÚÇ\s]+$/'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf'               => [
                'required',
                'cpf',
                'min:11',
                'max:11',
                function ($attribute, $value, $fail) {
                    $user_by_cpf = User::where('cpf', $value)->first();

                    if($user_by_cpf == null)
                        return true;
                    else{
                        //verifica se o usuário que está sendo cadastrado é um avaliador e se existe outro usuário com o mesmo cpf
                        $avaliador_by_cpf = User::where('cpf', $value)
                            ->where('tipo_usuario_id', 2)->first();
                        if($user_by_cpf->tipo_usuario_id != 2 && $this->request->get('tipo_usuario_id') == 2 && $avaliador_by_cpf == null)
                            return true;
                        else
                            return $fail('Já existe um usuário que utiliza esse cpf no sistema.');
                    }
                }
            ],
            'celular'           => ['required', 'min:11', 'max:11'],
            'rg'                => ['required', 'string', 'min:7', 'max:14', 'regex:/^[0-9]+$/'],
            'instituicao_id'    => ['required', 'numeric'],
            'unidade_id'        => ['required', 'numeric'],
            'tipo_usuario_id'   => ['required', 'numeric']
        ];
    }

    public function messages()
    {
        return [
            'name.regex'                    => "O nome informado é inválido",
            'cpf.required'                  => 'O CPF é obrigatório',
            'cpf.min'                       => 'Tamanho do CPF não é válido',
            'cpf.max'                       => 'Tamanho do CPF não é válido',
            'cpf.unique'                    => 'O CPF informado já está cadastrado',
            'cpf.cpf'                       => 'O CPF informado não é válido',
            'rg.required'                   => 'O campo RG é obrigatório',
            'rg.min'                        => 'Tamanho do RG não é válido',
            'rg.max'                        => 'Tamanho do RG não é válido',
            'rg.regex'                      => "O RG informado é inválido",
            'instituicao_id.required'       => 'O campo Instituição é obrigatório',
            'instituicao_id.numeric'        => 'Instituição inválida',
            'unidade_id.required'           => 'O campo Unidade é obrigatório',
            'unidade_id.numeric'            => 'Unidade inválida',
            'tipo_usuario_id.required'      => 'O campo tipo usuário é obrigatório',
            'tipo_usuario_id.numeric'       => 'Tipo de usuário inválido'
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'cpf'               => preg_replace('/[^0-9]/', '', $this->cpf),
            'celular'           => preg_replace('/[^0-9]/', '', $this->celular),
            'tipo_usuario_id'   => $this->tipo_usuario,
            'instituicao_id'    => $this->instituicao,
            'unidade_id'        => $this->unidade
        ]);
    }
}
