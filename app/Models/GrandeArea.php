<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GrandeArea extends Model
{
    protected $fillable = [
        'nome',
    ];
    
    public function areas() {
        return $this->hasMany('App\Area');
    }

    public function solicitacaos() {
        return $this->hasMany('App\Solicitacao');
    }
    
}
