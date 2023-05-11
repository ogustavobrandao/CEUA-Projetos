<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
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
        'rg',
        'celular',
        'unidade_id',
        'tipo_usuario_id',
    ];

    public static $rules = [
        'name' => 'required|min:5',
        'email' => 'required|email|min:5',
        'cpf' => 'required',
    ];

    public static $messages = [
        '*.required'  => 'O :attribute é obrigatório',
        '*.email'  => 'O :attribute deve estar no formato correto',
        '*.min'  => 'O :attribute deve ter no minimo 5 caracteres',
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

    public function tipoUsuario()
    {
        return $this->belongsTo('App\Models\TipoUsuario');
    }

    public function unidade()
    {
        return $this->belongsTo('App\Models\Unidade');
    }

    public function avaliacoes()
    {
        return $this->hasMany('App\Models\Avaliacao');
    }

    public function solicitacoes()
    {
        return $this->hasMany('App\Models\Solicitacao');
    }

}
