<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solicitacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo_en',
        'titulo_pt',
        'inicio',
        'fim',
        'tipo',
        'grandeArea',
        'area',
        'subArea',
        'usuario_id',
    ];

    public function avaliacao()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function responsavel()
    {
        return $this->hasOne('App\Models\Responsavel');
    }

    public function modelosAnimais()
    {
        return $this->hasMany('App\Models\ModeloAnimal');
    }

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }
    public function dadosComplementares()
    {
        return $this->hasOne('App\Models\DadosComplementares');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

    public function historico_solicitacao(){
        return $this->hasMany(HistoricoSolicitacao::class);
    }

}
