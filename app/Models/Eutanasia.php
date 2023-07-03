<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eutanasia extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificativa_metodo',
        'descarte',
        'metodo',
        'destino',
        'descricao',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual()
    {
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
