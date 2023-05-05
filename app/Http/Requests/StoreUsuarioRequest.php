<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
            'name'              => ['required', 'string', 'min:10', 'max:255'],
            'email'             => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'cpf'               => ['required', 'cpf', 'min:11', 'max:11', 'unique:users'],
            'celular'           => ['required', 'min:11', 'max:11'],
            'rg'                => ['required', 'string', 'min:7', 'max:14'],
            'instituicao_id'    => ['required', 'numeric'],
            'unidade_id'        => ['required', 'numeric'],
            'tipo_usuario_id'   => ['required', 'numeric']
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
