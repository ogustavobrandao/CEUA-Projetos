<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        return view('admin.usuarios_index', compact('usuarios'));
    }

    public function store(Request $request){
        $usuario = new User();
        $usuario->name = $request->nome;
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->password = Hash::make($request->senha);
        $usuario->unidade_id = $request->unidade;
        $usuario->tipo_usuario_id = $request->tipo;

        return redirect(route('usuarios.index'));
    }

}
