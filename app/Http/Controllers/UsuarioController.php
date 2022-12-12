<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all();
        $instituicaos = Instituicao::all();
        return view('admin.usuarios_index', compact('usuarios', 'instituicaos'));
    }

    public function store(Request $request){
        Validator::make($request->all(), User::$rules, user::$messages)->validate();

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

    public function editar_perfil()
    {
        $instituicaos = Instituicao::all();
        $user = Auth::user();
        return view('user.editar_perfil', compact('instituicaos', 'user'));
    }

    public function alterar_perfil(Request $request)
    {
        Validator::make($request->all(), User::$rules, user::$messages)->validate();

        $usuario = Auth::user();
        $usuario->cpf = $request->cpf;
        $usuario->email = $request->email;
        $usuario->name = $request->name;

        $usuario->update();

        return redirect()->back()->with(['success', 'Perfil alterado com sucesso!']);
    }

    public function update(Request $request){
        Validator::make($request->all(), User::$rules, user::$messages)->validate();

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
