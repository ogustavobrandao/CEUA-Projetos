<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
use App\Models\Avaliacao;
use App\Models\Colaborador;
use App\Models\CondicoesAnimal;
use App\Models\Contato;
use App\Models\Eutanasia;
use App\Models\Instituicao;
use App\Models\ModeloAnimal;
use App\Models\Operacao;
use App\Models\Perfil;
use App\Models\Planejamento;
use App\Models\Procedimento;
use App\Models\Responsavel;
use App\Models\Resultado;
use App\Models\Solicitacao;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\AssignOp\Mod;

class SolicitacaoController extends Controller
{
    public function form($solicitacao_id)
    {
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();

        if ($solicitacao->status != null && ($solicitacao->status != 'nao_avaliado' || in_array(Auth::user()->tipo_usuario_id, [1, 2]))) {
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

        if ($solicitacao->estado_pagina == 1) {
            $responsavel = $solicitacao->responsavel;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'responsavel'));
        } elseif ($solicitacao->estado_pagina == 2) {
            $colaboradores = $solicitacao->responsavel->colaboradores;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'colaboradores'));
        } elseif ($solicitacao->estado_pagina == 3) {
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos'));
        } elseif ($solicitacao->estado_pagina == 4) {
            $modelo_animal = $solicitacao->modeloAnimal;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'modelo_animal'));
        } elseif ($solicitacao->estado_pagina == 5) {
            $perfil = $solicitacao->modeloAnimal->perfil;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'perfil'));
        } elseif ($solicitacao->estado_pagina == 6) {
            $planejamento = $solicitacao->modeloAnimal->planejamento;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'planejamento'));
        } elseif ($solicitacao->estado_pagina == 7) {
            $condicoes_animal = $solicitacao->modeloAnimal->condicoesAnimal;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'condicoes_animal'));
        } elseif ($solicitacao->estado_pagina == 8) {
            $procedimento = $solicitacao->procedimento;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'procedimento'));
        } elseif ($solicitacao->estado_pagina == 9) {
            $operacao = $solicitacao->procedimento->operacao;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'operacao'));
        } elseif ($solicitacao->estado_pagina == 10) {
            $eutanasia = $solicitacao->procedimento->eutanasia;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'eutanasia'));
        } elseif ($solicitacao->estado_pagina == 11) {
            $resultado = $solicitacao->resultado;
            return view('solicitacao.formulario', compact('solicitacao', 'instituicaos', 'resultado'));
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

    public function aprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliacao = $solicitacao->avaliacao;
        $avaliacao->status = 'Aprovada';
        $avaliacao->parecer = 'Solicitação Aprovada sem Pendências';
        $avaliacao->update();

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function reprovarSolicitacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $avaliacao = $solicitacao->avaliacao;
        $avaliacao->status = 'Reprovada';
        $avaliacao->parecer = $request->parecer;
        $avaliacao->update();

        return redirect(route('solicitacao.avaliador.index'));
    }

    public function index_solicitante()
    {
        $solicitante = Auth::user();
        $solicitacoes = Solicitacao::where('user_id', $solicitante->id)->get();
        return view('solicitante.minhas_solicitacoes', compact('solicitacoes'));
    }

    public function index_avaliador()
    {
        $avaliacoes = Avaliacao::where('user_id', Auth::user()->id)->get();
        return view('avaliador.minhas_avaliacoes', compact('avaliacoes'));
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

        $solicitacao->estado_pagina = 2;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));

    }

    public function criar_colaborador(Request $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);
        if (isset($request->colaborador)) {
            foreach ($request->colaborador as $colab) {
                $colaborador = new Colaborador();
                $colaborador->nome = $colab['nome'];
                $colaborador->instituicao_id = $colab['instituicao_id'];
                $colaborador->nivel_academico = $colab['nivel_academico'];
                $colaborador->experiencia_previa = $colab['experiencia_previa'];
                $colaborador->treinamento = $colab['treinamento'];
                $colaborador->responsavel_id = $solicitacao->responsavel->id;
                $colaborador->save();

                $contato = new Contato();
                $contato->email = $colab['email'];
                $contato->telefone = $colab['telefone'];
                $contato->colaborador_id = $colaborador->id;
                $contato->save();
            }
        }

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
        $solicitacao->update();

        $solicitacao->estado_pagina = 4;
        $solicitacao->update();
        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_modelo_animal(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        $modelo_animal = ModeloAnimal::create($request->all());

        $solicitacao->estado_pagina = 5;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_perfil(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        $perfil = new Perfil();
        $perfil->grupo_animal = $request->grupo_animal;
        $perfil->linhagem = $request->linhagem;
        $perfil->idade = $request->idade;
        $perfil->peso = $request->peso;
        $perfil->machos = $request->machos;
        $perfil->femeas = $request->femeas;
        $perfil->quantidade = $request->quantidade;
        $perfil->modelo_animal_id = $modelo_animal->id;
        $perfil->total = $request->quantidade; //Verificar depois com o pessoal da CEUA
        $perfil->save();

        $solicitacao->estado_pagina = 6;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_planejamento(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        $planejamento = new Planejamento();
        $planejamento->modelo_animal_id = $modelo_animal->id;
        $planejamento->num_animais_grupo = $request->num_animais_grupo;
        $planejamento->especificar_grupo = $request->especificar_grupo;
        $planejamento->criterios = $request->criterios;
        $planejamento->anexo_formula = $request->anexo_formula;
        $planejamento->desc_materiais_metodos = $request->desc_materiais_metodos;
        $planejamento->analise_estatistica = $request->analise_estatistica;
        $planejamento->outras_infos = $request->outras_infos;
        $planejamento->grau_invasividade = $request->grau_invasividade;
        $planejamento->save();

        $solicitacao->estado_pagina = 7;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_condicoes_animal(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        $modelo_animal = ModeloAnimal::where('solicitacao_id', $solicitacao->id)->first();

        $condicoes_animal = new CondicoesAnimal();
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
        $condicoes_animal->save();

        $solicitacao->estado_pagina = 8;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_procedimento(Request $request)
    {

        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if(isset($solicitacao->procedimento)){
            Procedimento::find($solicitacao->procedimento->id)->update($request->all());
        }else{
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

            if(isset($solicitacao->procedimento->operacao)){
                $operacao = $solicitacao->procedimento->operacao;
            }else{
                $operacao = new Operacao();
            }

            $operacao->observacao_recuperacao = $request->observacao_recuperacao;
            $operacao->outros_cuidados_recuperacao = $request->outros_cuidados_recuperacao;
            $operacao->analgesia_recuperacao = $request->analgesia_recuperacao;
            $operacao->procedimento_id = $procedimento->id;
            $operacao->save();
        }elseif(isset($solicitacao->procedimento->operacao)){
            $solicitacao->procedimento->operacao->delete();
        }
        $solicitacao->estado_pagina = 10;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_eutanasia(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        if(isset($solicitacao->procedimento->eutanasia)){
            $eutanasia = $solicitacao->procedimento->eutanasia;
        }else{
            $eutanasia = new Eutanasia();
        }

        if($request->eutanasia == "true"){
            $eutanasia->descricao = $request->descricao;
            $eutanasia->metodo = $request->metodo;
            $eutanasia->justificativa_metodo = $request->justificativa_metodo;
        }else{
            $eutanasia->descricao = null;
            $eutanasia->metodo = null;
            $eutanasia->justificativa_metodo = null;
        }

        $eutanasia->destino = $request->destino;
        $eutanasia->descarte = $request->descarte;
        $eutanasia->procedimento_id = $solicitacao->procedimento->id;
        $eutanasia->save();
        $solicitacao->estado_pagina = 11;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_resultado(Request $request)
    {



        $solicitacao = Solicitacao::find($request->solicitacao_id);

        Resultado::create($request->all());

        $solicitacao->estado_pagina = 12;
        $solicitacao->status = 'nao_avaliado';
        $solicitacao->update();

        return redirect(route('home'));
    }

    public function index_admin()
    {
        $solicitacoes = Solicitacao::where('status', 'nao_avaliado')->get();
        $avaliadores = User::where('tipo_usuario_id', '2')->get();
        return view('admin.solicitacoes', compact('solicitacoes', 'avaliadores'));
    }
}
