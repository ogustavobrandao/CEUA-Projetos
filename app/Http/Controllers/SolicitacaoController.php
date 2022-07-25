<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Colaborador;
use App\Models\Contato;
use App\Models\Eutanasia;
use App\Models\Instituicao;
use App\Models\Responsavel;
use App\Models\Solicitacao;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SolicitacaoController extends Controller
{
    public function form($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();
        return view('solicitante.formulario', compact('solicitacao', 'instituicaos'));
    }

    public function inicio(Request $request)
    {
        $solicitacao = new Solicitacao();
        $solicitacao->tipo = $request->tipo;
        $solicitacao->user_id = Auth::user()->id;
        $solicitacao->estado_pagina = 0;

        $solicitacao->save();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $solicitacao->id]));
    }

    public function criar(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $solicitacao->titulo_pt = $request->titulo_pt;
        $solicitacao->titulo_en = $request->titulo_en;
        $solicitacao->inicio = $request->inicio;
        $solicitacao->fim = $request->fim;
        $solicitacao->area_conhecimento = $request->area_conhecimento;
        $solicitacao->estado_pagina = 1;

        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_responsavel(Request $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);

        $responsavel = new Responsavel();
        $responsavel->solicitacao_id = $request->solicitacao_id;
        $responsavel->nome = $request->nome;
        $responsavel->departamento_id = $request->departamento_id;
        $responsavel->experiencia_previa = $request->experiencia_previa;
        $responsavel->vinculo_instituicao = $request->vinculo_instituicao;
        $responsavel->treinamento = $request->treinamento;
        $responsavel->save();

        $contato = new Contato();
        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->responsavel_id = $responsavel->id;
        $contato->save();

        $solicitacao->estado_pagina = 1;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));

    }

    public function criar_colaborador(Request $request){
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        for($i = 0; $i < count($request->nome); $i++){
            $colaborador = new Colaborador();
            $colaborador->nome = $request->nome[$i];
            $colaborador->instituicao_id = $request->instituicao_id[$i];
            $colaborador->nivel_academico = $request->nivel_academico[$i];
            $colaborador->experiencia_previa = $request->experiencia_previa[$i];
            $colaborador->treinamento = $request->treinamento[$i];
            $colaborador->responsavel_id = $solicitacao->responsavel->id;
            $colaborador->save();

            $contato = new Contato();
            $contato->email = $request->email[$i];
            $contato->telefone = $request->telefone[$i];
            $contato->colaborador_id = $colaborador->id;
            $contato->save();
        }

        $solicitacao->estado_pagina = 2;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_eutanasia(Request $request){
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        $eutanasia = new Eutanasia();
        $eutanasia->descricao = $request->descricao;
        $eutanasia->metodo = $request->metodo;
        $eutanasia->justificativa_metodo = $request->justificativa_metodo;
        $eutanasia->destino = $request->destino;
        $eutanasia->descarte = $request->descarte;
        $eutanasia->procedimento_id = $solicitacao->procedimento->id;
        $eutanasia->save();

        $solicitacao->estado_pagina = 5;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

}
