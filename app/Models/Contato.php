<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'telefone',
        'colaborador_id',
        'responsavel_id',
    ];

    public function colaborador(){
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel');
    }

}
