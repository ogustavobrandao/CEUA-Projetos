<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoSolicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'solicitacao_id',
        'status_solicitacao',
        'nome_usuario_modificador',
    ];

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
