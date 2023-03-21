<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsavel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'cpf',
        'treinamento',
        'vinculo_instituicao',
        'experiencia_previa',
        'termo_responsabilidade',
        'solicitacao_id',
        'departamento_id',
    ];

    public static $rules = [
        'nome' => 'required|string',
        'departamento_id' => 'required',
        'cpf' => 'required',
    ];

    public static $messages = [
        '*.required' => 'O :attribute é um campo obrigatório.',
        'nome.required' => 'O nome é um campo obrigatório.',
        'departamento_id.required' => 'O departamento é um campo obrigatório.',
        'cpf.required' => 'O CPF é um campo obrigatório.',
        'nome.string' => 'O nome deve ser um texto',
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
