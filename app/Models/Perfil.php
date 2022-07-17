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

    public function modeloAnimal(){
        return $this->belongsTo('App\Models\ModeloAnimal');
    }

}
