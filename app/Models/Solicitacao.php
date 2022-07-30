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
        return $this->hasOne('App\Models\Avaliacao');
    }

    public function responsavel(){
        return $this->hasOne('App\Models\Responsavel');
    }

    public function resultado(){
        return $this->hasOne('App\Models\Resultado');
    }

    public function procedimento(){
        return $this->hasOne('App\Models\Procedimento');
    }

    public function modeloAnimal(){
        return $this->hasOne('App\Models\ModeloAnimal');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
