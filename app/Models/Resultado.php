<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'abate',
        'destino_animais',
        'justificativa_metodos',
        'resumo_procedimento',
        'outras_infos',
        'planejamento_id',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
