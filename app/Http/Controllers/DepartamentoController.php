<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
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
