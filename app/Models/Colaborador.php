<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $fillable = [
        'nome',
        'cpf',
        'treinamento',
        'grau_escolaridade',
        'experiencia_previa',
        'termo_responsabilidade',
        'instituicao_id',
        'responsavel_id',
    ];

    public static $rules = [
        'nome' => 'required|string|min:5',
        'treinamento' => 'required',
        'cpf' => 'required',
        'instituicao_id' => 'required',
        'experiencia_previa' => 'required',
        'treinamento' => 'required',
        'termo_responsabilidade' => 'required',
        'grau_escolaridade' => 'required',
    ];

    public static $messages = [
        'nome.required' => 'O nome é um campo obrigatório.',
        'nome.string' => 'O nome deve ser um texto',
        'nome.min' => 'O nome deve possuir no minimo 5 caracteres',
        'instituicao_id.required' => 'A instituição é um campo obrigatório',
        'cpf.required' => 'O CPF é um campo obrigatório',
        'treinamento.required' => 'O preenchimento do treinamento é obrigatório',
        'experiencia_previa.required' => 'O envio da experiência previa é obrigatório',
        'termo_responsabilidade.required' => 'O envio do termo de responsabilidade é obrigatório',
        'grau_escolaridade.required' => 'O grau de escolaridade é um campo obrigatório',
    ];

    public function contato(){
        return $this->hasOne('App\Models\Contato');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel');
    }

    public function instituicao(){
        return $this->belongsTo('App\Models\Instituicao');
    }

}
