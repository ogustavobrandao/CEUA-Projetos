<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        if (Auth::user()->roles->count() > 1) {
            return view('home');
        }
        else {
            if (Auth::user()->hasRole('Administrador')){
                return redirect()->route('solicitacao.admin.index');
            }
            elseif (Auth::user()->hasRole('Avaliador')){
                return view('avaliador.home');
            }
            elseif (Auth::user()->hasRole('Solicitante')){
                return view('solicitante.home');
            }
        }
    }

    public function perfilAdmin(){
        return view('admin.home');
    }
    public function perfilAvaliador(){
        return view('avaliador.home');
    }
    public function perfilSolicitante(){
        return view('solicitante.home');
    }
}
