<?php

namespace App\Http\Controllers;

use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{
    public function create(){
        return view('unidade.create');
    }

    public function store(Request $request){
        $unidade = Unidade::create($request->all());

        return redirect()->route('unidade.index');
    }

    public function edit($id){
        $unidade = Unidade::find($id);

        return view('unidade.edit', compact('unidade'));
    }

    public function update(Request $request){
        $unidade = Unidade::find($request->id);
        $unidade->nome = $request->nome;
        $unidade->update();

        return redirect()->route('unidade.index');
    }
}
