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

    public function editar_senha()
    {
        $user = Auth::user();
        return view('user.editar_senha', compact('user'));
    }

    public function alterar_perfil(Request $request)
    {
        Validator::make($request->all(), User::$rules, user::$messages)->validate();

        $usuario = Auth::user();
        $usuario->cpf = $request->cpf;
        $usuario->email = $request->email;
        $usuario->name = $request->name;

        $usuario->update();

        return redirect()->back()->with('success', 'Perfil alterado com sucesso!');
    }

    public function alterar_senha(Request $request)
    {
        Validator::make($request->all(), ['password' => 'required|confirmed|min:8'],
            ['*.required' => 'O campo de senha é obrigatório',
            '*.confirmed' => 'É necessário confirmar a senha',
                '*.min' => 'A senha deve ter no minimo 8 caracteres'])->validate();

        $usuario = Auth::user();
        $usuario->password = Hash::make($request->password);
        $usuario->update();

        return redirect()->back()->with('success', 'Senha alterada com sucesso!');
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
