<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
        'unidade_id',
    ];

    public function responsaveis(){
        return $this->hasMany('App\Models\Responsavel');
    }

    public function unidade(){
        return $this->belongsTo('App\Models\Unidade');
    }

}
