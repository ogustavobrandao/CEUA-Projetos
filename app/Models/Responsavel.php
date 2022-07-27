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
}
