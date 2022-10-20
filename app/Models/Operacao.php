<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'observacao_recuperacao',
        'outros_cuidados_recuperacao',
        'analgesia_recuperacao',
        'procedimento_id',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

}
