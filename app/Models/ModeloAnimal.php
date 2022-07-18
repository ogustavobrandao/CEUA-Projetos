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
        'solicitacao_id',
    ];

    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    public function condicoesAnimal(){
        return $this->hasOne('App\Models\CondicoesAnimal');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamneto');
    }

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
