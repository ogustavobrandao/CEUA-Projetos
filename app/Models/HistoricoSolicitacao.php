<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoSolicitacao extends Model
{
    use HasFactory;

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

}
