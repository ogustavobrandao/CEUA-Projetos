<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_en',
        'titulo_pt',
        'inicio',
        'fim',
        'tipo',
        'area_conhecimento',
        'usuario_id',
    ];

    public static $rules = [
        'titulo_en' => 'required|string|min:5',
        'titulo_pt' => 'required|string|min:5',
        'inicio' => 'required|date',
        'fim' => 'required|date',
        'area_conhecimento' => 'required',
    ];

    public static $messages = [
        'nome.required' => 'O nome é um campo obrigatório.',
        'nome.min' => 'O nome deve ter no mínimo 5 caracteres.',
        'nome.max' => 'O nome deve ter no máximo 100 caracteres.',
        'email.required' => 'O e-mail é um campo obrigatório.',
        'email.min' => 'O e-mail deve ter no mínimo 5 caracteres.',
        'email.max' => 'O e-mail deve ter no máximo 100 caracteres.',
        'email.unique' => 'Este e-mail já está sendo usado.',
        'numTel.required' => 'O número de celular é um campo obrigatório.',
        'numTel.integer' => 'O número de celular deve conter apenas números.',
        'numTel.min' => 'O número de celular não pode ser um número negativo.',
        'numTel.digits' => 'O número de celular deve ter 11 dígitos.',
        'cpf.required' => 'O CPF é um campo obrigatório.',
        'cpf.numeric' => 'O CPF deve conter apenas números.',
        'cpf.min' => 'O CPF não pode ser um número negativo.',
        'cpf.digits_between' => 'O CPF deve ter entre 10 e 11 dígitos.',
        'cpf.unique' => 'O CPF já está cadastrado',
        'rg.required' => 'O RG é um campo obrigatório.',
        'rg.numeric' => 'O RG deve conter apenas números.',
        'rg.min' => 'O RG não pode ser um número negativo.',
        'rg.digits_between' => 'O RG deve ter entre 7 à 11 dígitos.',
        'rg.unique' => 'O RG já está cadastrado',
        'data_nascimento.required' => 'A data de nascimento é um campo obrigatório.',
        'data_nascimento.date' => 'A data de nascimento deve ser no formato de data.',
        'matricula.required' => 'A matricula é um campo obrigatório.',
        'matricula.min' => 'A matricula deve conter pelo menos 1 dígito.',
        'matricula.integer' => 'A matricula deve ser um número.',
        'matricula.unique' => 'A matrícula já está cadastrada',
        'password.required' => 'A senha é um campo obrigatório.',
        'password.min' => 'A senha deve ter no mínimo 8 caracteres.',
        'password.confirmed' => 'As senhas devem ser iguais.',
    ];

    public function avaliacao()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function responsavel()
    {
        return $this->hasOne('App\Models\Responsavel');
    }

    public function modeloAnimal()
    {
        return $this->hasMany('App\Models\ModeloAnimal');
    }

    public function planejamento()
    {
        return $this->hasOne('App\Models\Planejamento');
    }
    public function dadosComplementares()
    {
        return $this->hasOne('App\Models\DadosComplementares');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
