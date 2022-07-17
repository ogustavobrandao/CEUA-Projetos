<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Planejamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'grau_invasividade',
        'anexo_formula',
        'outras_infos',
        'analise_estatistica',
        'especificar_grupo',
        'justificativa',
        'criterios',
        'desc_materiais_metodos',
        'num_animais_grupo',
        'modelo_animal_id',
    ];

    public function modelo_animal(){
        return $this->belongsTo('App\Models\Modelo_animal');
    }

}
