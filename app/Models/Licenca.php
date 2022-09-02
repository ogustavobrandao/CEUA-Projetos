<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Licenca extends Model
{
    use HasFactory;

    protected $fillable = [
        'inicio',
        'fim',
        'codigo',
        'avalicao_id',
    ];

    public function avaliacao(){
        return $this->belongsTo('App\Models\Avaliacao');
    }

}
