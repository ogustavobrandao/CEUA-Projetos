<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosComplementares extends Model
{
    use HasFactory;

    protected $fillable = [
        'relevancia',
        'justificativa',
        'objetivos',
        'resumo',
        'solicitacao_id',
    ];

    public static $rules = [
        'relevancia' => 'required|string|min:5',
        'justificativa' => 'required|string|min:5',
        'objetivos' => 'required|string|min:5',
        'resumo' => 'required|string|min:5',
    ];

    public static $messages = [
        'required' =>  'O campo :attribute é obrigatório.',
        'string' => 'O campo :attribute deve ser um texto',
        'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
    ];

    public function solicitacao()
    {
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function avaliacao_individual()
    {
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
