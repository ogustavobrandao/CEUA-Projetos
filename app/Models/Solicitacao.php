<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'relevancia',
        'titulo_en',
        'titulo_pt',
        'inicio',
        'fim',
        'tipo',
        'justificativa',
        'objetivos',
        'resumo',
        'area_conhecimento',
        'usuario_id',
    ];

    public function avaliacao(){
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function responsavel(){
        return $this->hasOne('App\Models\Responsavel');
    }

    public function modeloAnimal(){
        return $this->hasMany('App\Models\ModeloAnimal');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamento');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
