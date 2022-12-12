<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Unidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartamentoController extends Controller
{
    public function index($unidade_id)
    {
        $unidade = Unidade::find($unidade_id);
        $departamentos = Departamento::where('unidade_id', $unidade->id)->get();
        return view('departamento.index', compact('unidade', 'departamentos'));
    }

    public function store(Request $request){
        Validator::make($request->all(), Departamento::$rules, Departamento::$messages)->validate();
        $departamento = Departamento::create($request->all());

        return redirect()->back();
    }

    public function update(Request $request){
        Validator::make($request->all(), Departamento::$rules, Departamento::$messages)->validate();
        $departamento = Departamento::find($request->id);
        $departamento->nome = $request->nome;
        $departamento->update();

        return redirect()->back();
    }

    public function delete($departamento_id)
    {
        $departamento = Departamento::find($departamento_id);
        $departamento->delete();
        return redirect()->back();
    }

    public function consulta(Request $request){
        $unidade = json_decode($request->unidade) ;
        $departamentos = Departamento::where('unidade_id', $unidade)->orderBy('nome')->get();
        return response()->json($departamentos);
    }

}
