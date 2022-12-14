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
        'titulo_en' => 'string|min:5',
        'titulo_pt' => 'required|string|min:5',
        'inicio' => 'required|date',
        'fim' => 'required|date',
        'area_conhecimento' => 'required',
    ];

    public static $messages = [
        'titulo_pt.required' => 'O titulo em português é um campo obrigatório.',
        'titulo_pt.string' => 'O titulo em português deve ser um texto',
        'titulo_en.string' => 'O titulo em inglês deve ser um texto',
        'titulo_pt.min' => 'O titulo em português deve possuir no minimo 5 caracteres',
        'titulo_en.min' => 'O titulo em inglês deve possuir no minimo 5 caracteres',
        'inicio.required' => 'A data de inicio é obrigatória',
        'fim.required' => 'A data de fim é obrigatória',
        'area_conhecimento.required' => 'A área de conhecimento é obrigatória',
    ];

    public function avaliacao()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function responsavel()
    {
        return $this->hasOne('App\Models\Responsavel');
    }

    public function modelosAnimais()
    {
        return $this->hasMany('App\Models\ModeloAnimal');
    }

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
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
