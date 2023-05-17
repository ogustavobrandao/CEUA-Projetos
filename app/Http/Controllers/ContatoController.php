<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ContatoController extends Controller{

    public function calendarioReunioes(){
        return view('contato.calendario_reunioes');
    }

    public function ceua(){
        return view('contato.ceua');
    }

    public function membros(){
        return view('contato.membros');
    }
    
    public function leis_decretos(){
        return view('contato.leis_decretos');
    }
    
    public function fluxograma(){
        return view('contato.fluxograma_documentos');
    }
    
    public function contato(){
        return view('contato.contato');
    }

    public function sobre(){
        return view('contato.sobre');
    }








}