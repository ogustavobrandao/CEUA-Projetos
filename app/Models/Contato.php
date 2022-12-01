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

    public static $rules = [
        'email' => 'required|email',
        'telefone' => 'required',
    ];

    public static $messages = [
        'email.required' => 'O email é um campo obrigatório',
        'email.email' => 'O email deve estar no formato correto',
        'telefone.required' => 'O telefone é um campo obrigatório',
    ];

    public function colaborador(){
        return $this->belongsTo('App\Models\Colaborador');
    }

    public function responsavel(){
        return $this->belongsTo('App\Models\Responsavel');
    }

}
