<?php

namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\Unidade;
use Illuminate\Http\Request;

class UnidadeController extends Controller
{

    public function index($instituicao_id)
    {
        $instituicao = Instituicao::find($instituicao_id);
        $unidades = Unidade::where('instituicao_id', $instituicao_id)->get();
        return view('unidade.index', compact('unidades', 'instituicao'));
    }

    public function create(){
        return view('unidade.create');
    }

    public function store(Request $request){
        $unidade = Unidade::create($request->all());
        return redirect()->back();
    }

    public function edit($id){
        $unidade = Unidade::find($id);

        return view('unidade.edit', compact('unidade'));
    }

    public function update(Request $request){
        $unidade = Unidade::find($request->id);
        $unidade->nome = $request->nome;
        $unidade->update();

        return redirect()->back();
    }

    public function delete($unidade_id)
    {
        $unidade = Unidade::find($unidade_id);
        $unidade->delete();
        return redirect()->back();
    }

    public function consulta(Request $request){
        $instituicao = json_decode($request->instituicao) ;
        $unidades = Unidade::where('instituicao_id', $instituicao)->orderBy('nome')->get();
        return response()->json($unidades);
    }
}
