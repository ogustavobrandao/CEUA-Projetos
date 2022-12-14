<?php

namespace App\Http\Controllers;

use App\Mail\SendSolicitacaoStatus;
use App\Models\Avaliacao;
use App\Models\Solicitacao;
use App\Models\User;
use App\Models\Licenca;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class AvaliacaoController extends Controller
{
    public function aprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find(Auth::user()->id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao->status = 'aprovado';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();
        //Criação da licença
        $licenca = new Licenca();
        $licenca->inicio = $request->inicio;
        $licenca->fim = $request->fim;
        $licenca->codigo = strtoupper(hash('ripemd160', $solicitacao->id.$request->inicio.$request->fim));
        $licenca->avaliacao_id = $avaliacao->id;
        $licenca->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function aprovarPendenciaSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find(Auth::user()->id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao->status = 'aprovadaPendencia';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function reprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find(Auth::user()->id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao->status = 'reprovado';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }
}
