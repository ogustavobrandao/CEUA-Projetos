<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'treinamento',
        'vinculo_instituicao',
        'experiencia_previa',
        'solicitacao_id',
        'departamento_id',
    ];

    public static $rules = [
        'nome' => 'required|string|min:5',
        'departamento_id' => 'required',
        'experiencia_previa' => 'mimes:pdf',
        'treinamento' => 'mimes:pdf'
    ];

    public static $messages = [
        '*.required' => 'O :attribute é um campo obrigatório.',
        '*.mimes' => 'O anexo do campo :attribute só pode ser do tipo PDF',
        'nome.required' => 'O nome é um campo obrigatório.',
        'nome.string' => 'O nome deve ser um texto',
        'nome.min' => 'O nome deve possuir no minimo 5 caracteres',
    ];

    public function colaboradores(){
        return $this->hasMany('App\Models\Colaborador');
    }

    public function contato(){
        return $this->hasOne('App\Models\Contato');
    }

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
