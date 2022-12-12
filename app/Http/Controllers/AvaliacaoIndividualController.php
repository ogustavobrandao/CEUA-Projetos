<?php

namespace App\Http\Controllers;

use App\Models\Avaliacao;
use App\Models\AvaliacaoIndividual;
use App\Models\ModeloAnimal;
use App\Models\Planejamento;
use Illuminate\Http\Request;

class AvaliacaoIndividualController extends Controller
{

    public function exibir($tipo,$avaliacao_id,$id){

        $avaliacaoIndividual = null;
        $titulo = "";
        switch ($tipo) {
            // Solicitação - Dados iniciais
            case 0:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('solicitacao_id',$id)->first();
                $titulo = "Dados Iniciais";
                break;
            // Responsavel
            case 1:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('responsavel_id',$id)->first();
                $titulo = "Responsável";
                break;
            // Colaborador
            case 2:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('colaborador_id',$id)->first();
                $titulo = "Colaborador";
                break;
            // Dados Complementares
            case 3:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('dados_complementares_id',$id)->first();
                $titulo = "Dados Complementares";
                break;
            // Modelo Animal
            case 4:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('modelo_animal_id',$id)->first();
                $titulo = "Modelo Animal";
                break;
            // Planejamento
            case 5:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('planejamento_id',$id)->first();
                $titulo = "Planejamento";
                break;
            // Condição Animal
            case 6:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('condicoes_animal_id',$id)->first();
                $titulo = "Condição Animal";
                break;
            // Procedimento
            case 7:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('procedimento_id',$id)->first();
                $titulo = "Procedimento";
                break;
            // Operacao
            case 8:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('operacao_id',$id)->first();
                $titulo = "Operação";
                break;
            // Eutanasia
            case 9:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('eutanasia_id',$id)->first();
                $titulo = "Eutanásia";
                break;
            // Resultado
            case 10:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('resultado_id',$id)->first();
                $titulo = "Resultado";
                break;
        }

        return json_encode([$avaliacaoIndividual,$titulo]);
    }


    public function realizarAvaliacao(Request $request){

        $avaliacaoIndividual = null;
        switch ($request->tipo) {
            // Solicitação - Dados iniciais
            case 0:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('solicitacao_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->solicitacao_id = $request->id;
                }
                break;
            // Responsavel
            case 1:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('responsavel_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->responsavel_id = $request->id;
                }
                break;
            // Colaborador
            case 2:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('colaborador_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->colaborador_id = $request->id;
                }
                break;
            // Dados Complementares
            case 3:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('dados_complementares_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->dados_complementares_id = $request->id;
                }
                break;
            // Modelo Animal
            case 4:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('modelo_animal_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->modelo_animal_id = $request->id;
                }
                break;
            // Planejamento
            case 5:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('planejamento_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->planejamento_id = $request->id;
                }
                break;
            // Condição Animal
            case 6:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('condicoes_animal_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->condicoes_animal_id = $request->id;
                }
                break;
            // Procedimento
            case 7:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('procedimento_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->procedimento_id = $request->id;
                }
                break;
            // Operacao
            case 8:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('operacao_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->operacao_id = $request->id;
                }
                break;
            // Eutanasia
            case 9:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('eutanasia_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->eutanasia_id = $request->id;
                }
                break;
            // Resultado
            case 10:
                $avaliacaoIndividual = AvaliacaoIndividual::where('avaliacao_id',$request->avaliacao_id)->where('resultado_id',$request->id)->first();
                if($avaliacaoIndividual == null){
                    $avaliacaoIndividual = new AvaliacaoIndividual();
                    $avaliacaoIndividual->resultado_id = $request->id;
                }
                break;
        }

        if($request->status == "aprovado"){
            $avaliacaoIndividual->parecer = "Cumpriu todos requisitos";
        }else{
            $avaliacaoIndividual->parecer = $request->parecer;
        }

        $avaliacaoIndividual->status = $request->status;

        if($avaliacaoIndividual->avaliacao_id == null){
            $avaliacaoIndividual->avaliacao_id = $request->avaliacao_id;
            $avaliacaoIndividual->save();
        }else{
            $avaliacaoIndividual->update();
        }


        return json_encode("Aprovado");
    }

    public function verificarAvalModelo($modelo_animal_id,$avaliacao_id){
        $planejamento = Planejamento::where('modelo_animal_id',$modelo_animal_id)->first();

        // Modelo Animal
        $avaliacaoModelo = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('modelo_animal_id',$modelo_animal_id)->first();
        $avaliacaoPlanejamento = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('planejamento_id',$planejamento->id)->first();
        $avaliacaoCondicoesAnimal = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('condicoes_animal_id',$planejamento->condicoesAnimal->id)->first();
        $avaliacaoProcedimento = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('procedimento_id',$planejamento->procedimento->id)->first();
        $avaliacaoOperacao = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('operacao_id',$planejamento->operacao->id)->first();
        $avaliacaoEutanasia = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('eutanasia_id',$planejamento->eutanasia->id)->first();
        $avaliacaoResultado = AvaliacaoIndividual::where('avaliacao_id',$avaliacao_id)->where('resultado_id',$planejamento->resultado->id)->first();

        if($avaliacaoModelo == null || $avaliacaoPlanejamento == null || $avaliacaoCondicoesAnimal == null || $avaliacaoProcedimento == null ||
           $avaliacaoOperacao == null || $avaliacaoEutanasia == null || $avaliacaoResultado == null){
            return json_encode("nao_finalizadas");
        }

        if($avaliacaoModelo->status == "reprovado" || $avaliacaoPlanejamento->status == "reprovado" || $avaliacaoCondicoesAnimal->status == "reprovado" || $avaliacaoProcedimento->status == "reprovado" ||
           $avaliacaoOperacao->status == "reprovado" || $avaliacaoEutanasia->status == "reprovado" || $avaliacaoResultado->status == "reprovado"){
            return json_encode("reprovado");
        }

        return json_encode("aprovado");
    }

}
