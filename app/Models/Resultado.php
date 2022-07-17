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
        'solicitacao_id',
    ];

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
