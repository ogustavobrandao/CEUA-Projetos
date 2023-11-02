<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function home()
    {
        if(count(DB::table('role_user')->where('user_id', Auth::user()->id)->get()) > 1){
            return view('home');

        }else{
            if(Auth::user()->hasRole('Administrador')){
                return redirect()->route('solicitacao.admin.index');
            }
            if(Auth::user()->hasRole('Avaliador')){
                return view('avaliador.home');
            }
            if(Auth::user()->hasRole('Solicitante')){
                return view('solicitante.home');
            }
        }
    }  
    public function perfilAdmin(){
        return redirect()->route('solicitacao.admin.index');
    }  
    public function perfilAvaliador(){
        return view('avaliador.home');
    }
    public function perfilSolicitante(){
        return view('solicitante.home');
    }
}
