<?php

namespace App\Http\Controllers;

use App\Mail\SendNotificacaoColegiado;
use App\Mail\SendSolicitacaoStatus;
use App\Models\AvaliacaoIndividual;
use App\Models\Avaliacao;
use App\Models\HistoricoSolicitacao;
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
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        if ($request->user()->hasRole('Avaliador')) {
            $avaliador = User::find(Auth::user()->id);

            if (!$solicitacao->avaliacao_individual || !$solicitacao->avaliacao_individual->status) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            if (!$solicitacao->responsavel->avaliacao_individual || !$solicitacao->responsavel->avaliacao_individual->status) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }


            $colaboradorAvaliacao = $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo', 2)->first();
            if (!$colaboradorAvaliacao || !$colaboradorAvaliacao->status) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }


            if ($solicitacao->dadosComplementares) {
                $avaliacaoDadosComplementares = $solicitacao->dadosComplementares->avaliacao_individual;
                if (!$avaliacaoDadosComplementares || !$avaliacaoDadosComplementares->status) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }
            }

            foreach ($solicitacao->modelosAnimais as $modeloAnimal) {

                $avaliacaoModelo = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('modelo_animal_id', $modeloAnimal->id)
                    ->first();

                if (!$avaliacaoModelo || $avaliacaoModelo->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('planejamento_id', $modeloAnimal->planejamento->id)
                    ->first();

                if (!$avaliacaoPlanejamento || $avaliacaoPlanejamento->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('condicoes_animal_id', $modeloAnimal->planejamento->condicoesAnimal->id)
                    ->first();

                if (!$avaliacaoCondicoesAnimal || $avaliacaoCondicoesAnimal->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('procedimento_id', $modeloAnimal->planejamento->procedimento->id)
                    ->first();

                if (!$avaliacaoProcedimento || $avaliacaoProcedimento->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('operacao_id', $modeloAnimal->planejamento->operacao->id)
                    ->first();

                if (!$avaliacaoOperacao || $avaliacaoOperacao->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('eutanasia_id', $modeloAnimal->planejamento->eutanasia->id)
                    ->first();

                if (!$avaliacaoEutanasia || $avaliacaoEutanasia->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }

                $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                    ->where('resultado_id', $modeloAnimal->planejamento->resultado->id)
                    ->first();

                if (!$avaliacaoResultado || $avaliacaoResultado->status === null) {
                    return redirect()->back()->with('fail', 'Avaliação Pendente');
                }
            }

            Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
            $avaliacao->status = 'aprovado_avaliador';
            $solicitacao->status = 'avaliado';
            $solicitacao->update();
            $avaliacao->update();
        }



        $historico = new HistoricoSolicitacao();
        $historico->solicitacao_id = $request->solicitacao_id;
        $historico->status_solicitacao = $avaliacao->status;
        $historico->nome_usuario_modificador = Auth::user()->name;

        $historico->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));


        $admin = User::find(1);
        Mail::to($admin->email)->send(new SendNotificacaoColegiado($avaliacao->status, $admin));
        return redirect(route('solicitacao.avaliador.index'));
    }
    public function aprovarSolicitacaoAdm(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);
        $avaliador = User::find(Auth::user()->id);

        if (!$solicitacao->avaliacao_individual || !$solicitacao->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }

        if (!$solicitacao->responsavel->avaliacao_individual || !$solicitacao->responsavel->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }


        $colaboradorAvaliacao = $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo', 2)->first();
        if (!$colaboradorAvaliacao || !$colaboradorAvaliacao->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }


        if ($solicitacao->dadosComplementares) {
            $avaliacaoDadosComplementares = $solicitacao->dadosComplementares->avaliacao_individual;
            if (!$avaliacaoDadosComplementares || !$avaliacaoDadosComplementares->status) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }
        }

        foreach ($solicitacao->modelosAnimais as $modeloAnimal) {

            $avaliacaoModelo = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('modelo_animal_id', $modeloAnimal->id)
                ->first();

            if (!$avaliacaoModelo || $avaliacaoModelo->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('planejamento_id', $modeloAnimal->planejamento->id)
                ->first();

            if (!$avaliacaoPlanejamento || $avaliacaoPlanejamento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('condicoes_animal_id', $modeloAnimal->planejamento->condicoesAnimal->id)
                ->first();

            if (!$avaliacaoCondicoesAnimal || $avaliacaoCondicoesAnimal->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('procedimento_id', $modeloAnimal->planejamento->procedimento->id)
                ->first();

            if (!$avaliacaoProcedimento || $avaliacaoProcedimento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('operacao_id', $modeloAnimal->planejamento->operacao->id)
                ->first();

            if (!$avaliacaoOperacao || $avaliacaoOperacao->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('eutanasia_id', $modeloAnimal->planejamento->eutanasia->id)
                ->first();

            if (!$avaliacaoEutanasia || $avaliacaoEutanasia->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('resultado_id', $modeloAnimal->planejamento->resultado->id)
                ->first();

            if (!$avaliacaoResultado || $avaliacaoResultado->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }
        }

        if (Auth::user()->hasRole('Administrador')) {
            $avaliacao->status = 'aprovado_colegiado';
            $avaliacao->update();
            //Criação da licença
            $licenca = new Licenca();
            $licenca->inicio = $request->inicio;
            $licenca->fim = $request->fim;
            $licenca->codigo = "CEUAUFAPE" . date('Y', strtotime($solicitacao->updated_at)) . date('m', strtotime($solicitacao->updated_at)) . date('d', strtotime($solicitacao->updated_at)) . $solicitacao->id;
            // $licenca->codigo = strtoupper(hash('ripemd160', $solicitacao->id.$request->inicio.$request->fim));
            $licenca->avaliacao_id = $avaliacao->id;
            $licenca->save();
        }

        $historico = new HistoricoSolicitacao();
        $historico->solicitacao_id = $request->solicitacao_id;
        $historico->status_solicitacao = $avaliacao->status;
        $historico->nome_usuario_modificador = Auth::user()->name;

        $historico->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        if (Auth::user()->hasRole('Administrador')) {
            return redirect(route('solicitacao.admin.index'));
        }
        $admin = User::find(1);
        Mail::to($admin->email)->send(new SendNotificacaoColegiado($avaliacao->status, $admin));
        return redirect(route('solicitacao.avaliador.index'));
    }

    public function aprovarPendenciaSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find(Auth::user()->id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);

        if (!$solicitacao->avaliacao_individual || !$solicitacao->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação Individual Pendente');
        }

        if (!$solicitacao->responsavel->avaliacao_individual || !$solicitacao->responsavel->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação de Responsável Pendente');
        }


        $colaboradorAvaliacao = $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo', 2)->first();
        if (!$colaboradorAvaliacao || !$colaboradorAvaliacao->status) {
            return redirect()->back()->with('fail', 'Avaliação do Colaborador Pendente');
        }


        if ($solicitacao->dadosComplementares) {
            $avaliacaoDadosComplementares = $solicitacao->dadosComplementares->avaliacao_individual;
            if (!$avaliacaoDadosComplementares || !$avaliacaoDadosComplementares->status) {
                return redirect()->back()->with('fail', 'Avaliação dos Dados Complementares Pendente');
            }
        }


        foreach ($solicitacao->modelosAnimais as $modeloAnimal) {

            $avaliacaoModelo = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('modelo_animal_id', $modeloAnimal->id)
                ->first();

            if (!$avaliacaoModelo || $avaliacaoModelo->status === null) {
                return redirect()->back()->with('fail', 'Avaliação do Modelo Animal Pendente');
            }

            $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('planejamento_id', $modeloAnimal->planejamento->id)
                ->first();

            if (!$avaliacaoPlanejamento || $avaliacaoPlanejamento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação do Planejamento Pendente');
            }

            $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('condicoes_animal_id', $modeloAnimal->planejamento->condicoesAnimal->id)
                ->first();

            if (!$avaliacaoCondicoesAnimal || $avaliacaoCondicoesAnimal->status === null) {
                return redirect()->back()->with('fail', 'Avaliação das Condições Animais Pendente');
            }

            $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('procedimento_id', $modeloAnimal->planejamento->procedimento->id)
                ->first();

            if (!$avaliacaoProcedimento || $avaliacaoProcedimento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação de Procedimento Pendente');
            }

            $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('operacao_id', $modeloAnimal->planejamento->operacao->id)
                ->first();

            if (!$avaliacaoOperacao || $avaliacaoOperacao->status === null) {
                return redirect()->back()->with('fail', 'Avaliação da Operação Pendente');
            }

            $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('eutanasia_id', $modeloAnimal->planejamento->eutanasia->id)
                ->first();

            if (!$avaliacaoEutanasia || $avaliacaoEutanasia->status === null) {
                return redirect()->back()->with('fail', 'Avaliação da Eutanásia Pendente');
            }

            $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('resultado_id', $modeloAnimal->planejamento->resultado->id)
                ->first();

            if (!$avaliacaoResultado || $avaliacaoResultado->status === null) {
                return redirect()->back()->with('fail', 'Avaliação do Resultado Pendente');
            }
        }

        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao->status = 'aprovadaPendencia';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        $historico = new HistoricoSolicitacao();
        $historico->solicitacao_id = $request->solicitacao_id;
        $historico->status_solicitacao = $avaliacao->status;
        $historico->nome_usuario_modificador = Auth::user()->name;

        $historico->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function reprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find(Auth::user()->id);
        $avaliacao = Avaliacao::find($request->avaliacao_id);

        if (!$solicitacao->avaliacao_individual || !$solicitacao->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }

        if (!$solicitacao->responsavel->avaliacao_individual || !$solicitacao->responsavel->avaliacao_individual->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }


        $colaboradorAvaliacao = $solicitacao->avaliacao->first()->avaliacao_individual->where('tipo', 2)->first();
        if (!$colaboradorAvaliacao || !$colaboradorAvaliacao->status) {
            return redirect()->back()->with('fail', 'Avaliação Pendente');
        }


        if ($solicitacao->dadosComplementares) {
            $avaliacaoDadosComplementares = $solicitacao->dadosComplementares->avaliacao_individual;
            if (!$avaliacaoDadosComplementares || !$avaliacaoDadosComplementares->status) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }
        }


        foreach ($solicitacao->modelosAnimais as $modeloAnimal) {

            $avaliacaoModelo = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('modelo_animal_id', $modeloAnimal->id)
                ->first();

            if (!$avaliacaoModelo || $avaliacaoModelo->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('planejamento_id', $modeloAnimal->planejamento->id)
                ->first();

            if (!$avaliacaoPlanejamento || $avaliacaoPlanejamento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('condicoes_animal_id', $modeloAnimal->planejamento->condicoesAnimal->id)
                ->first();

            if (!$avaliacaoCondicoesAnimal || $avaliacaoCondicoesAnimal->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('procedimento_id', $modeloAnimal->planejamento->procedimento->id)
                ->first();

            if (!$avaliacaoProcedimento || $avaliacaoProcedimento->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('operacao_id', $modeloAnimal->planejamento->operacao->id)
                ->first();

            if (!$avaliacaoOperacao || $avaliacaoOperacao->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('eutanasia_id', $modeloAnimal->planejamento->eutanasia->id)
                ->first();

            if (!$avaliacaoEutanasia || $avaliacaoEutanasia->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }

            $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)
                ->where('resultado_id', $modeloAnimal->planejamento->resultado->id)
                ->first();

            if (!$avaliacaoResultado || $avaliacaoResultado->status === null) {
                return redirect()->back()->with('fail', 'Avaliação Pendente');
            }
        }

        if (Auth::user()->id == 2) {
            Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        }
        $avaliacao->status = 'reprovado';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        $historico = new HistoricoSolicitacao();
        $historico->solicitacao_id = $request->solicitacao_id;
        $historico->status_solicitacao = $avaliacao->status;
        $historico->nome_usuario_modificador = Auth::user()->name;

        $historico->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        if (Auth::user()->id == 1) {
            return redirect(route('solicitacao.admin.index'));
        }
        return redirect(route('solicitacao.avaliador.index'));
    }
}
