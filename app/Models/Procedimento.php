<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Procedimento extends Model
{
    use HasFactory;

    protected $fillable = [
        'extracao',
        'relaxante',
        'estresse',
        'jejum',
        'analgesico',
        'anestesico',
        'imobilizacao',
        'inoculacao_substancia',
        'restricao_hidrica',
        'solicitacao_id'
    ];

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function eutanasia(){
        return $this->hasOne('App\Models\Eutanasia');
    }

    public function operacao(){
        return $this->hasOne('App\Models\Operacao');
    }

}
