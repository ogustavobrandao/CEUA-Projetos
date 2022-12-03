<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'treinamento',
        'nivel_academico',
        'experiencia_previa',
        'instituicao_id',
        'responsavel_id',
    ];

    public static $rules = [
        'nome' => 'required|string|min:5',
        'treinamento' => 'required',
        'experiencia_previa' => 'required',
        'nivel_academico' => 'required',
    ];

    public static $messages = [
        'nome.required' => 'O nome é um campo obrigatório.',
        'nome.string' => 'O nome deve ser um texto',
        'nome.min' => 'O nome deve possuir no minimo 5 caracteres',
        'treinamento.required' => 'O envio do treinamento é obrigatório',
        'experiencia_previa.required' => 'O envio da experiência previa é obrigatório',
        'nivel_academico.required' => 'O nivel acadêmico é um campo obrigatório',
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
