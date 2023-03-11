<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'detalhes_cirurgia',
        'observacao_recuperacao',
        'outros_cuidados_recuperacao',
        'analgesia_recuperacao',
    ];

    public static $rules = [
        'planejamento_id' => 'required',

    ];

    public static $messages = [
        'planejamento_id.required'  => 'Necessária a criação de um planejamento',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
