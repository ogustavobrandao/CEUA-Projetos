<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class SolicitacaoController extends Controller
{
    public function form()
    {
        $instituicaos = Instituicao::all();
        return view('solicitante.formulario', compact('instituicaos'));
    }
}
