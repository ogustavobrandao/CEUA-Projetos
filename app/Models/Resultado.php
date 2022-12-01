<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;

    protected $fillable = [
        'abate',
        'destino_animais',
        'justificativa_metodos',
        'resumo_procedimento',
        'outras_infos',
        'planejamento_id',
    ];

    public static $rules = [
        'planejamento_id' => 'required',
        'abate' => 'required_if:abate_radio,==,true',
        'destino_animais' => 'required',
        'justificativa_metodos' => 'required',
        'resumo_procedimento' => 'required',
        'outras_infos' => 'required',

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

}
