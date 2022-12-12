<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

    public function index()
    {
        if(Auth::user()->tipo_usuario_id == 1){
            return redirect()->route('solicitacao.admin.index');
        }
        return view('welcome');
    }

    public function home()
    {
        if (Auth::check()) {
            if(Auth::user()->tipo_usuario_id == 1){
                return redirect()->route('solicitacao.admin.index');
            }
            return view('home');
        } else {
            return view('welcome');
        }
    }

}
