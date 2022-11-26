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

    public function solicitacao() {
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function operacao(){
        return $this->hasOne('App\Models\Operacao');
    }

    public function eutanasia(){
        return $this->hasOne('App\Models\Eutanasia');
    }

    public function resultado(){
        return $this->hasOne('App\Models\Resultado');
    }

    public function procedimento(){
        return $this->hasOne('App\Models\Procedimento');
    }

    public function condicoesAnimal(){
        return $this->hasOne('App\Models\CondicoesAnimal');
    }

    public function modelo_animal(){
        return $this->belongsTo('App\Models\ModeloAnimal');
    }

}
