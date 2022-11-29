<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DadosComplementares extends Model
{
    use HasFactory;

    protected $fillable = [
        'relevancia',
        'justificativa',
        'objetivos',
        'resumo',
        'solicitacao_id',
    ];

    public function solicitacao()
    {
        return $this->belongsTo('App\Models\Solicitacao');
    }
}
