<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unidade extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'instituicao_id',
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

    public function departamentos(){
        return $this->hasMany('App\Models\Departamento');
    }

    public function instituicao(){
        return $this->belongsTo('App\Models\Instituicao');
    }

    public static $rules = [
        'nome' => 'required',
    ];

    public static $messages = [
        '*.required'  => 'O :attribute é obrigatório',
    ];

}
