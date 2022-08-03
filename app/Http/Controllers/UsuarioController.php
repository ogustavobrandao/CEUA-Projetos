<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $instituicaos = Instituicao::all();
        return view('admin.usuarios_index', compact('usuarios', 'instituicaos'));
    }

    public function store(Request $request){
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->password = Hash::make($request->password);
        $usuario->unidade_id = $request->unidade;
        $usuario->tipo_usuario_id = $request->tipo;
        $usuario->save();

        return redirect(route('usuarios.index'));
    }

    public function update(Request $request){
        $usuario = User::find($request->usuario_id);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->cpf = $request->cpf;
        $usuario->password = Hash::make($request->password);
        $usuario->unidade_id = $request->unidade;
        $usuario->tipo_usuario_id = $request->tipo;
        $usuario->update();

        return redirect(route('usuarios.index'));
    }

}
