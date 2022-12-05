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
        'procedimento_id',
    ];

    public static $rules = [
        'planejamento_id' => 'required',
        'destino' => 'required',
        'descarte' => 'required',
        'estresse' => 'required_if:eutanasia,==,true',
        'anestesico' => 'required_if:eutanasia,==,true',
        'relaxante' => 'required_if:eutanasia,==,true',

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
