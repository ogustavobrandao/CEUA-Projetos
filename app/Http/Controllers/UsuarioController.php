<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Interfaces\IUsuarioService;
use App\Models\Instituicao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{

    public function index() {

        $usuarios = User::all();
        $instituicaos = Instituicao::all();
        
        return view('admin.usuarios_index', compact('usuarios', 'instituicaos'));
    }

    public function store(Request $request) {
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make('password'),
            'cpf' => preg_replace('/[^0-9]/', '', $request->cpf),
            'rg' => preg_replace('/[^0-9]/', '', $request->rg),
            'celular' => preg_replace('/[^0-9]/', '', $request->celular),
            'unidade_id' => $request->unidade,
            'tipo_usuario_id'=> 2,
        ])->roles()->attach($request->role);
       
        
        return redirect(route('usuarios.index'))->with('sucesso', 'Usuário cadastrado com sucesso com senha padrão password!');
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

    public function update(UpdateUsuarioRequest $request) {
        $dadosUsuario['password'] = Hash::make("password");

        $usuario = User::find($dadosUsuario['usuario_id']);
        $usuario->fill($dadosUsuario);
        $usuario->update();
        $this->usuarioService->atualizarUsuario($request->validated());
        return redirect(route('usuarios.index'))->with('sucesso', 'Usuário editado com sucesso!');
    }
}
