<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AvaliacaoIndividual extends Model
{
    use HasFactory;

    public function eutanasia(){
        return $this->hasOne('App\Models\Eutanasia');
    }

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel');
    }

    public function resultado(){
        return $this->belongsTo('App\Models\Resultado');
    }

    public function planejamento(){
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function condicoes_animal(){
        return $this->belongsTo('App\Models\CondicoesAnimal');
    }

    public function dados_complementares(){
        return $this->belongsTo('App\Models\DadosComplementares');
    }

    public function operacao(){
        return $this->belongsTo('App\Models\Operacao');
    }

    public function procedimento(){
        return $this->belongsTo('App\Models\Procedimento');
    }

    public function modelo_animal(){
        return $this->belongsTo('App\Models\ModeloAnimal');
    }

    public function avaliacao(){
        return $this->belongsTo('App\Models\Avaliacao');
    }
}
