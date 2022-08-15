<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\Solicitacao;
use Illuminate\Http\Request;

class AvaliadorController extends Controller
{

    public function atribuir(Request $request){
        if(isset($request->avaliadores_id)){
            foreach($request->avaliadores_id as $avaliador){
                $avalicao = new Avaliacao();
                $avalicao->user_id = $avaliador;
                $avalicao->solicitacao_id = $request->solicitacao_id;
                $avalicao->status = "nao_realizado";
                $avalicao->save();
            }
        }else{
            return redirect()->back()->withErrors('Nenhum avaliador foi selecionado.');
        }

        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $solicitacao->status = "avaliando";
        $solicitacao->update();
        return redirect()->back();
    }

    public function remover(Request $request){
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        if(isset($request->avaliadores_id)){
            foreach($request->avaliadores_id as $avaliador){
                $avalicao = Avaliacao::where('solicitacao_id',$request->solicitacao_id)->where('user_id',$avaliador)->first();
                $avalicao->delete();
            }

            if(empty($solicitacao->avaliacao->all())){
                $solicitacao->status = "nao_avaliado";
                $solicitacao->update();
            }
        }else{
            return redirect()->back()->withErrors('Nenhum avaliador foi selecionado.');
        }

        return redirect()->back();
    }

    public function avaliar(Request $request){
        $avaliacao = Avaliacao::find($request->id);
        $avaliacao->parecer = $request->parecer;
        $avaliacao->status = $request->status;
        $avaliacao->update();

        return redirect(route('solicitacao.avaliador.index'));
    }

}
