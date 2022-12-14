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
    ];

    public static $rules = [
        'planejamento_id' => 'required',
        'destino' => 'required',
        'descarte' => 'required',
        'metodo' => 'required_if:eutanasia,==,true',
        'descricao' => 'required_if:eutanasia,==,true',
        'justificativa_metodo' => 'required_if:eutanasia,==,true',

    ];

    public static $messages = [
        'planejamento_id.required'  => 'Necessária a criação de um planejamento',
        '*.required'  => 'O :attribute é obrigatório',
        '*.required_if'  => 'O :attribute é obrigatório',
    ];

    public function planejamento()
    {
        return $this->belongsTo('App\Models\Planejamento');
    }

    public function avaliacao_individual()
    {
        return $this->hasOne('App\Models\AvaliacaoIndividual');
    }
}
