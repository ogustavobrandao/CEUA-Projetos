<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Unidade;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    public function index($unidade_id)
    {
        $unidade = Unidade::find($unidade_id);
        $departamentos = Departamento::where('unidade_id', $unidade->id)->get();
        return view('departamento.index', compact('unidade', 'departamentos'));
    }

    public function create(){
        return view('departamento.create');
    }

    public function store(Request $request){
        $departamento = Departamento::create($request->all());

        return redirect()->route('departamento.index');
    }

    public function edit($id){
        $departamento = Departamento::find($id);

        return view('departamento.edit', compact('departamento'));
    }

    public function update(Request $request){
        $departamento = Departamento::find($request->id);
        $departamento->nome = $request->nome;
        $departamento->update();

        return redirect()->route('departamento.index');
    }
}
