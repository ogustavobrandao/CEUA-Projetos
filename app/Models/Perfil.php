<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'peso',
        'quantidade',
        'linhagem',
        'machos',
        'femeas',
        'total',
        'idade',
        'grupo_animal',
        'flag_grupo_animal',
        'modelo_animal_id',
        'periodo'
    ];

    public static $rules = [
        'peso' => 'required|string|min:1',
        'idade' => 'required|numeric|min:1',
        'periodo' => 'required',
    ];

    public static $messages = [
        'required' =>  'O campo :attribute é obrigatório.',
        'string' => 'O campo :attribute deve ser um texto',
        'numeric' => 'O campo :attribute deve ser um número',
        'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
    ];

    public function modeloAnimal(){
        return $this->belongsTo('App\Models\ModeloAnimal');
    }

}
