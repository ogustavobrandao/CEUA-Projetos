<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CondicoesAnimal extends Model
{
    use HasFactory;

    protected $fillable = [
        'condicoes_paticulares',
        'num_animais_ambiente',
        'email_responsavel',
        'profissional_responsavel',
        'local',
        'periodo',
        'ambiente_alojamento',
        'dimensoes_ambiente',
        'tipo_cama',
        'modelo_animal_id',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

}
