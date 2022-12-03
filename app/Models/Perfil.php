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
        'modelo_animal_id',
    ];

    public static $rules = [
        'peso' => 'required|number|min:1',
        'quantidade' => 'required|number|min:1',
        'linhagem' => 'required|string|min:5',
        'machos' => 'required|number|min:1',
        'femeas' => 'required|number|min:1',
        'total' => 'required|number|min:1',
        'idade' => 'required|number|min:1',
        'grupo_animal' => 'required',
    ];

    public static $messages = [
        'required' =>  'O campo :attribute é obrigatório.',
        'string' => 'O campo :attribute deve ser um texto',
        'number' => 'O campo :attribute deve ser um número',
        'min' => 'O campo :attribute deve possuir no minimo 5 caracteres',
    ];

    public function modeloAnimal(){
        return $this->belongsTo('App\Models\ModeloAnimal');
    }

}
