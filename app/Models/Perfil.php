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

    public function modelo_animal(){
        return $this->belongsTo('App\Models\Modelo_animal');
    }

}
