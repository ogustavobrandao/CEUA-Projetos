<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\ResetPasswordController;
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

        $solicitacao->estado_pagina = 2;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));

    }

    public function criar_colaborador(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        for ($i = 0; $i < count($request->nome); $i++) {
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

        $solicitacao->estado_pagina = 3;
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

        Procedimento::create($request->all());

        $solicitacao->estado_pagina = 9;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_operacao(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);
        if ($request->cirurgia == 'on') {
            $procedimento = Procedimento::where('solicitacao_id', $solicitacao->id)->first();

            $operacao = new Operacao();
            $operacao->observacao_recuperacao = $request->observacao_recuperacao;
            $operacao->outros_cuidados_recuperacao = $request->outros_cuidados_recuperacao;
            $operacao->analgesia_recuperacao = $request->analgesia_recuperacao;
            $operacao->procedimento_id = $procedimento->id;
            $operacao->save();
        }

        $solicitacao->estado_pagina = 10;
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

    public function criar_eutanasia(Request $request)
    {
        $solicitacao = Solicitacao::find($request->solicitacao_id);

        $eutanasia = new Eutanasia();
        $eutanasia->descricao = $request->descricao;
        $eutanasia->metodo = $request->metodo;
        $eutanasia->justificativa_metodo = $request->justificativa_metodo;
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

        $solicitacao->estado_pagina = 'nao_avaliado';
        $solicitacao->update();

        return redirect(route('solicitacao.form', ['solicitacao_id' => $request->solicitacao_id]));
    }

}
