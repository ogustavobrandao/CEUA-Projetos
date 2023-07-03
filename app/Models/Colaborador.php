<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colaborador extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';

    protected $fillable = [
        'nome',
        'cpf',
        'treinamento',
        'grau_escolaridade',
        'experiencia_previa',
        'termo_responsabilidade',
        'instituicao_id',
        'responsavel_id',
    ];

    public function contato(){
        return $this->hasOne('App\Models\Contato');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel');
    }

    public function instituicao(){
        return $this->belongsTo('App\Models\Instituicao');
    }

}
