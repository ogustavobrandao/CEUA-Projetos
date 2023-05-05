<?php

namespace App\Interfaces;

interface IUsuarioService {

    public function index();

    public function cadastrarUsuario($dadosUsuario);

    public function atualizarUsuario($dadosUsuario);
}