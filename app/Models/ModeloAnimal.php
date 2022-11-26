<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModeloAnimal extends Model
{
    use HasFactory;

    protected $fillable = [
        'justificativa',
        'geneticamente_modificado',
        'nome_cientifico',
        'nome_vulgar',
        'procedencia',
        'termo_consentimento',
        'solicitacao_id',
    ];

    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamento');
    }

}
