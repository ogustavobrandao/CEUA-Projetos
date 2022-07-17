<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cpf',
        'unidade_id',
        'tipo_usuario_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tipo_usuario(){
        return $this->belongsToMany('App\Models\Tipo_usuario');
    }

    public function unidade(){
        return $this->belongsToMany('App\Models\Unidade');
    }

    public function avaliacoes(){
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function solicitacoes(){
        return $this->hasMany('App\Models\Solicitacao');
    }

}
