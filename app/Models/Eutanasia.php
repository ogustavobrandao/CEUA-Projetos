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
        'procedimento_id',
    ];

    public function procedimento(){
        return $this->belongsTo('App\Models\Procedimento');
    }

}
