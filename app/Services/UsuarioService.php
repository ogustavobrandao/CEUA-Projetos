<?php

namespace App\Services;

use App\Interfaces\IUsuarioService;
use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioService implements IUsuarioService {

    public function index() {
        $usuarios = User::all();
        $instituicaos = Instituicao::all();
        return [$usuarios, $instituicaos];
    }

    public function cadastrarUsuario($dadosUsuario) {
        $dadosUsuario['password'] = Hash::make("password");
        User::create($dadosUsuario);
    }

    public function atualizarUsuario($dadosUsuario) {
        $dadosUsuario['password'] = Hash::make("password");

        $usuario = User::find($dadosUsuario['usuario_id']);
        $usuario->fill($dadosUsuario);
        $usuario->update();
    }
}