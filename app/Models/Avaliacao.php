<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Avaliacao extends Model
{
    use HasFactory;

    protected $fillable = [
        'parecer',
        'status',
        'user_id',
        'solicitacao_id',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function solicitacao(){
        return $this->belongsTo('App\Models\Solicitacao');
    }

    public function licenca(){
        return $this->hasOne('App\Models\Licenca');
    }

}
