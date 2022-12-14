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

    public static $rules = [
        'planejamento_id' => 'required',
        'condicoes_particulares' => 'required',
        'local' => 'required',
        'ambiente_alojamento' => 'required',
        'tipo_cama' => 'required',
        'num_animais_ambiente' => 'required | numeric | min:0',
        'dimensoes_ambiente' => 'required',
        'periodo' => 'required',
        'profissional_responsavel' => 'required',
        'email_responsavel' => 'required | email',
    ];

    public static $messages = [
        'planejamento_id.required'  => 'Necessária a criação de um planejamento',
        '*.required'  => 'O :attribute é obrigatório',
        '*.numeric'  => 'O :attribute deve ser um número',
        'num_animais_ambiente.min' => 'O número deve ser acima ou igual a 0'
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
