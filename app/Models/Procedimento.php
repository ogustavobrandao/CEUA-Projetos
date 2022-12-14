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
        'planejamento_id'
    ];

    public static $rules = [
        'planejamento_id' => 'required',
        'estresse' => 'required_if:estresse_radio,==,on',
        'anestesico' => 'required_if:anestesico_radio,==,on',
        'relaxante' => 'required_if:relaxante_radio,==,on',
        'analgesico' => 'required_if:analgesico_radio,==,on',
        'imobilizacao' => 'required_if:imobilizacao_radio,==,on',
        'inoculacao_substancia' => 'required_if:inoculacao_substancia_radio,==,on',
        'extracao' => 'required_if:extracao_radio,==,on',
        'jejum' => 'required_if:jejum_radio,==,on',
        'restricao_hidrica' => 'required_if:restricao_hidrica_radio,==,on',

    ];

    public static $messages = [
        'planejamento_id.required'  => 'Necessária a criação de um planejamento',
        '*.required_if'  => 'O de texto :attribute é obrigatório',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual(){
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }

}
