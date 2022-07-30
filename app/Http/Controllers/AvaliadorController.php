<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
{

    public function atribuir(Request $request){
        $avalicao = new Avaliacao();
        $avalicao->user_id = $request->avaliador;
        $avalicao->solicitacao_id = $request->solicitacao_id;
        $avalicao->status = "nao_realizado";
        $avalicao->save();
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $solicitacao->estado_pagina = "avaliando";
        $solicitacao->update();
        return redirect()->back();
    }

    public function remover($solicitacao_id){
        $solicitacao = Solicitacao::find($solicitacao_id);
        $solicitacao->estado_pagina = "nao_avaliado";
        $avaliacao = $solicitacao->avaliacoes()->first();

        $avaliacao->delete();
        $solicitacao->update();
        return redirect()->back();
    }

}
