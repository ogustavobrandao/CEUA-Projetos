<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubArea extends Model
{
    protected $fillable = [
        'nome',
    ];
    
    public function area() {
        return $this->belongsTo('App\Area', 'area_id');
    }

    public function solicitacaos() {
        return $this->hasMany('App\Solicitacao');
    }
}
