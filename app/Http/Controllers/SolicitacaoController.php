<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Mail\SendNotificacaoSolicitacao;
use App\Mail\SendSolicitacaoStatus;
use App\Mail\SendSolicitacaoReprovada;
use App\Models\Avaliacao;
use App\Models\Colaborador;
use App\Models\CondicoesAnimal;
use App\Models\Contato;
use App\Models\Eutanasia;
use App\Models\Instituicao;
use App\Models\Licenca;
use App\Models\ModeloAnimal;
use App\Models\Operacao;
use App\Models\Perfil;
use App\Models\Planejamento;
use App\Models\Procedimento;
use App\Models\Responsavel;
use App\Models\Resultado;
use App\Models\Solicitacao;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Phalcon\Forms\Element\Date;
use PhpParser\Node\Expr\AssignOp\Mod;

class SolicitacaoController extends Controller
{

    public function index_solicitacao($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();

        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;

        $disabled = true;

        return view('solicitacao.index', compact('solicitacao', 'instituicaos', 'responsavel', 'colaboradores', 'disabled'));
    }

    public function form($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();

        //Alterando o estado máximo da pagina para a navegação no formulário
        if ($solicitacao->estado_pagina > $solicitacao->estado_pagina_maximo) {
            $solicitacao->estado_pagina_maximo = $solicitacao->estado_pagina;
            $solicitacao->update();
        }

        if ($solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status != 'aprovadaPendencia') {
            if (($solicitacao->status != null && ($solicitacao->status != 'nao_avaliado' || in_array(Auth::user()->tipo_usuario_id, [1, 2])))
            ) {
                $disabled = true;
                $responsavel = $solicitacao->responsavel;
                $colaboradores = $solicitacao->responsavel->colaboradores;
                $modelo_animal = $solicitacao->modeloAnimal;
                $perfil = $solicitacao->modeloAnimal->perfil;
                $planejamento = $solicitacao->modeloAnimal->planejamento;
                $condicoes_animal = $solicitacao->modeloAnimal->condicoesAnimal;
                $procedimento = $solicitacao->procedimento;
                $operacao = $solicitacao->procedimento->operacao;
                $eutanasia = $solicitacao->procedimento->eutanasia;
                $resultado = $solicitacao->resultado;
                return view('solicitacao.formulario', compact('disabled', 'solicitacao',
                    'instituicaos', 'responsavel', 'colaboradores', 'modelo_animal', 'perfil', 'planejamento',
                    'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado'));
            }
        }

        if ($solicitacao->estado_pagina == 1) {
            $responsavel = $solicitacao->responsavel;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'responsavel'));
        } elseif ($solicitacao->estado_pagina == 2) {
            $colaboradores = $solicitacao->responsavel->colaboradores;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'colaboradores'));
        } elseif ($solicitacao->estado_pagina == 3) {
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos'));
        } else
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos'));
    }

    public function editForm($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);

        $solicitacao->estado_pagina = 0;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $solicitacao_id]));
    }

    public function alterarPagina($solicitacao_id, $num_pagina)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $solicitacao->estado_pagina = $num_pagina;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $solicitacao_id]));
    }

    public function voltarPagina($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        if ($solicitacao->estado_pagina > 0) {
            $solicitacao->estado_pagina = ($solicitacao->estado_pagina - 1);
            $solicitacao->update();
        } else {
            return redirect(route('home'));
        }

        return redirect(route('solicitacao.form', ['solicitacao_id' => $solicitacao_id]));
    }

    public function avaliarSolicitacao($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();

        $disabled = true;
        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;
        $modelo_animal = $solicitacao->modeloAnimal;
        $perfil = $solicitacao->modeloAnimal->perfil;
        $planejamento = $solicitacao->modeloAnimal->planejamento;
        $condicoes_animal = $solicitacao->modeloAnimal->condicoesAnimal;
        $procedimento = $solicitacao->procedimento;
        $operacao = $solicitacao->procedimento->operacao;
        $eutanasia = $solicitacao->procedimento->eutanasia;
        $resultado = $solicitacao->resultado;
        $solicitacao->avaliador_atual_id = Auth::user()->id;
        $solicitacao->update();
        $avaliacao = Avaliacao::where('solicitacao_id', $solicitacao_id)->where('user_id', Auth::user()->id)->first();
        return view('solicitacao.formulario', compact('disabled', 'solicitacao',
            'instituicaos', 'responsavel', 'colaboradores', 'modelo_animal', 'perfil', 'planejamento',
            'condicoes_animal', 'procedimento', 'operacao', 'eutanasia', 'resultado', 'avaliacao'));
    }

    public function aprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find($request->avaliador_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao = $solicitacao->avaliacao->first();
        $avaliacao->status = 'aprovada';
        $avaliacao->parecer = 'Solicitação Aprovada sem Pendências';
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();
        //Criação da licença
        $licenca = new Licenca();
        $licenca->inicio = $request->inicio;
        $licenca->fim = $request->fim;
        $licenca->codigo = Str::random(10);
        $licenca->avaliacao_id = $avaliacao->id;
        $licenca->save();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function aprovarPendenciaSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find($request->avaliador_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao = $solicitacao->avaliacao->first();
        $avaliacao->status = 'aprovadaPendencia';
        $avaliacao->parecer = $request->parecer;
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function reprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliador = User::find($request->avaliador_id);
        Avaliacao::where('solicitacao_id', $solicitacao->id)->where('user_id', '!=', $avaliador->id)->delete();
        $avaliacao = $solicitacao->avaliacao->first();
        $avaliacao->status = 'reprovada';
        $avaliacao->parecer = $request->parecer;
        $solicitacao->status = 'avaliado';
        $solicitacao->update();
        $avaliacao->update();

        Mail::to($solicitacao->responsavel->contato->email)->send(new SendSolicitacaoStatus($solicitacao->responsavel, $avaliacao));

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function index_solicitante()
    {
        $solicitante = Auth::user();
        $solicitacoes = Solicitacao::where('user_id', $solicitante->id)->orderByDesc("created_at")->get();
        return view('solicitante.minhas_solicitacoes', compact('solicitacoes'));
    }

    public function index_avaliador()
    {
        $avaliacoes = Avaliacao::where('user_id', Auth::user()->id)->get();
        $horario = Carbon::now('UTC')->toDateTime();
        return view('avaliador.minhas_avaliacoes', compact('avaliacoes', 'horario'));
    }

    public function inicio(Request $request)
    {
        $solicitacao = new Solicitacao();
        $solicitacao->tipo = $request->tipo;
        $solicitacao->user_id = Auth::user()->id;
        $solicitacao->estado_pagina = 0;
        $solicitacao->estado_pagina_maximo = 0;

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

        if (isset($solicitacao->responsavel)) {
            $responsavel = $solicitacao->responsavel;
        } else {
            $responsavel = new Responsavel();
        }

        $responsavel->solicitacao_id = $request->solicitacao_id;
        $responsavel->nome = $request->nome;
        $responsavel->departamento_id = $request->departamento_id;
        $responsavel->experiencia_previa = $request->experiencia_previa;
        $responsavel->vinculo_instituicao = $request->vinculo_instituicao;
        $responsavel->treinamento = $request->treinamento;

        if (isset($solicitacao->responsavel)) {
            $responsavel->update();
        } else {
            $responsavel->save();
        }

        if (isset($responsavel->contato)) {
            $contato = $responsavel->contato;
        } else {
            $contato = new Contato();
        }

        $contato->email = $request->email;
        $contato->telefone = $request->telefone;
        $contato->responsavel_id = $responsavel->id;

        if (isset($responsavel->contato)) {
            $contato->update();
        } else {
            $contato->save();
        }

        $solicitacao->estado_pagina = 2;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));

    }

    public function criar_colaborador(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $listaColab = [];

        if (isset($request->colaborador)) {
            foreach ($request->colaborador as $colab) {
                if ($colab['colab_id'] != null) {
                    $colaborador = Colaborador::find($colab['colab_id']);
                } else {
                    $colaborador = new Colaborador();
                }
                $colaborador->nome = $colab['nome'];
                $colaborador->instituicao_id = $colab['instituicao_id'];
                $colaborador->nivel_academico = $colab['nivel_academico'];
                $colaborador->experiencia_previa = $colab['experiencia_previa'];
                $colaborador->treinamento = $colab['treinamento'];
                $colaborador->responsavel_id = $solicitacao->responsavel->id;

                if ($colab['colab_id'] != null) {
                    $colaborador->update();
                    $contato = $colaborador->contato;
                } else {
                    $colaborador->save();
                    $contato = new Contato();;
                }

                array_push($listaColab, $colaborador->id);
                $contato->email = $colab['email'];
                $contato->telefone = $colab['telefone'];
                $contato->colaborador_id = $colaborador->id;

                if ($colab['colab_id'] != null) {
                    $contato->update();
                } else {
                    $contato->save();
                }
            }
        }
        //Deletar colaboradores não fornecidos no formulário
        Colaborador::where('responsavel_id', $solicitacao->responsavel->id)->whereNotIn('id', $listaColab)->delete();

        $solicitacao->estado_pagina = 3;
        $solicitacao->update();
        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_solicitacao_fim(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        $solicitacao->resumo = $request->resumo;
        $solicitacao->justificativa = $request->justificativa;
        $solicitacao->relevancia = $request->relevancia;
        $solicitacao->objetivos = $request->objetivos;
        $solicitacao->status = 'nao_avaliado';
        $solicitacao->update();

        $solicitacao->estado_pagina = 4;
        $solicitacao->update();
        return redirect(route('home'));
    }

    public function criar_modelo_animal(Request $request)
    {
        ModeloAnimal::create($request->all());
        return redirect(route('solicitacao.index', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_perfil(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        if (isset($modelo_animal->perfil)) {
            $perfil = $modelo_animal->perfil;
        } else {
            $perfil = new Perfil();
        }

        $perfil->grupo_animal = $request->grupo_animal;
        $perfil->linhagem = $request->linhagem;
        $perfil->idade = $request->idade;
        $perfil->peso = $request->peso;
        $perfil->machos = $request->machos;
        $perfil->femeas = $request->femeas;
        $perfil->quantidade = $request->quantidade;
        $perfil->modelo_animal_id = $modelo_animal->id;
        $perfil->total = $request->quantidade; //Verificar depois com o pessoal da CEUA

        if (isset($modelo_animal->perfil)) {
            $perfil->update();
        } else {
            $perfil->save();
        }

        $solicitacao->estado_pagina = 6;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function downloadFormula($planejamento_id)
    {
        $planejamento = Planejamento::find($planejamento_id);
        return Storage::download('formulas/' . $planejamento->anexo_formula);
    }

    public function criar_planejamento(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();
        if (isset($solicitacao->modeloAnimal->planejamento)) {
            $planejamento = $solicitacao->modeloAnimal->planejamento;

            if (($request->hasFile('anexo_formula') && $request->file('anexo_formula')->isValid())) {
                $nomeAnexo = $planejamento->anexo_formula;
                $request->anexo_formula->storeAs('formulas/', $nomeAnexo);
            }

        } else {
            $planejamento = new Planejamento();

            if (($request->hasFile('anexo_formula') && $request->file('anexo_formula')->isValid())) {

                $anexo = $request->anexo_formula->extension();
                $nomeAnexo = "formula_" . date('Ymd') . date('His') . '.' . $anexo;
                $planejamento->anexo_formula = $nomeAnexo;
                $request->anexo_formula->storeAs('formulas/', $nomeAnexo);
                $request->anexo_formula = $nomeAnexo;
            }
        }


        if (isset($modelo_animal->planejamento)) {
            $planejamento = $modelo_animal->planejamento;
        } else {
            $planejamento = new Planejamento();
        }
        $planejamento->modelo_animal_id = $modelo_animal->id;
        $planejamento->num_animais_grupo = $request->num_animais_grupo;
        $planejamento->especificar_grupo = $request->especificar_grupo;
        $planejamento->criterios = $request->criterios;
        $planejamento->desc_materiais_metodos = $request->desc_materiais_metodos;
        $planejamento->analise_estatistica = $request->analise_estatistica;
        $planejamento->outras_infos = $request->outras_infos;
        $planejamento->grau_invasividade = $request->grau_invasividade;
        $planejamento->grau_select = $request->grau_select;

        if (isset($modelo_animal->planejamento)) {
            $planejamento->update();
        } else {
            $planejamento->save();
        }

        $solicitacao->estado_pagina = 7;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_condicoes_animal(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        if (isset($modelo_animal->condicoesAnimal)) {
            $condicoes_animal = $modelo_animal->condicoesAnimal;
        } else {
            $condicoes_animal = new CondicoesAnimal();
        }

        $condicoes_animal->condicoes_particulares = $request->condicoes_particulares;
        $condicoes_animal->local = $request->local;
        $condicoes_animal->ambiente_alojamento = $request->ambiente_alojamento;
        $condicoes_animal->tipo_cama = $request->tipo_cama;
        $condicoes_animal->num_animais_ambiente = $request->num_animais_ambiente;
        $condicoes_animal->dimensoes_ambiente = $request->dimensoes_ambiente;
        $condicoes_animal->periodo = $request->periodo;
        $condicoes_animal->profissional_responsavel = $request->profissional_responsavel;
        $condicoes_animal->email_responsavel = $request->email_responsavel;
        $condicoes_animal->modelo_animal_id = $modelo_animal->id;

        if (isset($modelo_animal->condicoesAnimal)) {
            $condicoes_animal->update();
        } else {
            $condicoes_animal->save();
        }

        $solicitacao->estado_pagina = 8;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_procedimento(Request $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if (isset($solicitacao->procedimento)) {
            Procedimento::find($solicitacao->procedimento->id)->update($request->all());
        } else {
            Procedimento::create($request->all());
        }

        $solicitacao->estado_pagina = 9;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_operacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        if ($request->cirurgia == "true") {
            $procedimento = Procedimento::where('solicitacao_id', $solicitacao->id)->first();

            if (isset($solicitacao->procedimento->operacao)) {
                $operacao = $solicitacao->procedimento->operacao;
            } else {
                $operacao = new Operacao();
            }

            $operacao->observacao_recuperacao = $request->observacao_recuperacao;
            $operacao->outros_cuidados_recuperacao = $request->outros_cuidados_recuperacao;
            $operacao->analgesia_recuperacao = $request->analgesia_recuperacao;
            $operacao->procedimento_id = $procedimento->id;
            if (isset($solicitacao->procedimento->operacao)) {
                $operacao->update();
            } else {
                $operacao->save();
            }

        } elseif (isset($solicitacao->procedimento->operacao)) {
            $solicitacao->procedimento->operacao->delete();
        }
        $solicitacao->estado_pagina = 10;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_eutanasia(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if (isset($solicitacao->procedimento->eutanasia)) {
            $eutanasia = $solicitacao->procedimento->eutanasia;
        } else {
            $eutanasia = new Eutanasia();
        }

        if ($request->eutanasia == "true") {
            $eutanasia->descricao = $request->descricao;
            $eutanasia->metodo = $request->metodo;
            $eutanasia->justificativa_metodo = $request->justificativa_metodo;
        } else {
            $eutanasia->descricao = null;
            $eutanasia->metodo = null;
            $eutanasia->justificativa_metodo = null;
        }

        $eutanasia->destino = $request->destino;
        $eutanasia->descarte = $request->descarte;
        $eutanasia->procedimento_id = $solicitacao->procedimento->id;
        if (isset($solicitacao->procedimento->eutanasia)) {
            $eutanasia->update();
        } else {
            $eutanasia->save();
        }
        $solicitacao->estado_pagina = 11;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_resultado(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if (isset($solicitacao->resultado)) {
            Resultado::find($solicitacao->resultado->id)->update($request->all());
        } else {
            Resultado::create($request->all());

            $admins = User::where('tipo_usuario_id', 1)->get();
            foreach ($admins as $admin) {
                Mail::to($admin->email)->send(new SendNotificacaoSolicitacao($admin));
            }
        }

        $solicitacao->estado_pagina = 12;
        $solicitacao->status = 'nao_avaliado';
        $solicitacao->update();

        return redirect(route('home'));
    }

    public function index_admin()
    {
        $solicitacoes = Solicitacao::where('status', '!=', 'avaliado')->get();
        $avaliadores = User::where('tipo_usuario_id', '2')->get();
        return view('admin.solicitacoes', compact('solicitacoes', 'avaliadores'));
    }
}
