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
        'licencas_previas',
        'flag_captura',
        'captura',
        'flag_coleta_especimes',
        'tipo_outra_procedencia',
        'coleta_especimes',
        'flag_marcacao',
        'marcacao',
        'flag_outras_info',
        'outras_info',
        'solicitacao_id',
        'numero_cqb',
    ];


    public function solicitacao(){
        return $this->belongsTo(Solicitacao::class);
    }
    
    public function perfil(){
        return $this->hasOne('App\Models\Perfil');
    }

    public function planejamento(){
        return $this->hasOne('App\Models\Planejamento');
    }

    public function avaliacaoIndividual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

}
