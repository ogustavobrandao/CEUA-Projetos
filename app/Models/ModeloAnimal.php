<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloAnimal extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificativa',
        'geneticamente_modificado',
        'nome_cientifico',
        'nome_vulgar',
        'procedencia',
        'termo_consentimento',
        'licencas_previas',
        'solicitacao_id',
        'numero_cqb',
    ];

    public static $rules = [
        'justificativa' => 'required|string|min:5',
        'geneticamente_modificado' => 'required',
        'nome_cientifico' => 'required|string|min:5',
        'nome_vulgar' => 'required|string|min:5',
        'procedencia' => 'required',
        'numero_cqb' => 'required',
    ];

    public static $messages = [
        'required' =>  'O campo :attribute é obrigatório.',
        'string' => 'O campo :attribute deve ser um texto',
        'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
    ];

    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamento');
    }

    public function avaliacaoIndividual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

}
