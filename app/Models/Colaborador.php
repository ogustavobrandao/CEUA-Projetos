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

    public function contato(){
        return $this->hasOne('App\Models\Contato');
    }

    public function responsavel(){
        return $this->belongsToMany('App\Models\Responsavel');
    }

    public function instituicao(){
        return $this->belongsToMany('App\Models\Instituicao');
    }

}
