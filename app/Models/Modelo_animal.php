<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelo_animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificativa',
        'geneticamente_modificado',
        'nome_cientifico',
        'nome_vulgar',
        'procedencia',
        'solicitacao_id',
    ];

    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    public function condicoes_animal(){
        return $this->hasOne('App\Models\Condicoes_animal');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamneto');
    }

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
