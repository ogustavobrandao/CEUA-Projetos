<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_usuario extends Model
{
    use HasFactory;

    protected $fillable = [
        'nome',
    ];

    public function users(){
        return $this->hasMany('App\Models\User');
    }

}
