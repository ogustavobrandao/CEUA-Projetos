<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use Illuminate\Http\Request;

class InstituicaoController extends Controller
{

    public function index()
    {
        $instituicaos = Instituicao::all();
        return view('instituicao.index',  compact('instituicaos'));
    }

    public function create(){
        return view('instituicao.create');
    }

    public function store(Request $request){
        $instituicao = Instituicao::create($request->all());

        return redirect()->route('instituicao.index')->with('success', 'Instituição Cadastrada com Sucesso!');
    }

    public function edit($id){
        $instituicao = Instituicao::find($id);

        return view('instituicao.edit', compact('instituicao'));
    }

    public function update(Request $request){
        $instituicao = Instituicao::find($request->id);
        $instituicao->nome = $request->nome;
        $instituicao->update();

        return redirect()->route('instituicao.index');
    }

}
