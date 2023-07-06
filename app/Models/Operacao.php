<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalhes_cirurgia',
        'detalhes_observacao_recuperacao',
        'detalhes_outros_cuidados_recuperacao',
        'detalhes_analgesia_recuperacao',
        'observacao_recuperacao',
        'detalhes_nao_uso_analgesia_recuperacao',
        'outros_cuidados_recuperacao',
        'analgesia_recuperacao',
        'flag_cirurgia',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
