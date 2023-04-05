<?php namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\GrandeArea;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Solicitacao;
use App\Models\ModeloAnimal;
use App\Models\Planejamento;
use App\Models\CondicoesAnimal;
use App\Models\Procedimento;
use App\Models\Operacao;
use App\Models\Eutanasia;
use App\Models\Resultado;
use App\Models\Licenca;
use App\Models\Avaliacao;
use PDF;

class PDFViewController extends Controller
{

    public function gerarPDFSolicitacao($solicitacao_id)
    {   
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();
        $grandeAreas = GrandeArea::all();
        $areas = Area::all();
        $subAreas = SubArea::all();
        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;
        $modelo_animal = ModeloAnimal::find($solicitacao_id);
        $planejamento = Planejamento::find($modelo_animal->id);
        $condicoes_animal = CondicoesAnimal::where('planejamento_id', $planejamento->id)->first();
        $procedimento = Procedimento::where('planejamento_id', $planejamento->id)->first();
        $operacao = Operacao::where('planejamento_id', $planejamento->id)->first();
        $eutanasia = Eutanasia::where('planejamento_id', $planejamento->id)->first();
        $resultado = Resultado::where('planejamento_id', $planejamento->id)->first();

        $pdf = PDF::loadView('PDF/pdfSolicitacao', compact('procedimento','solicitacao','condicoes_animal','instituicaos', 'grandeAreas', 'areas', 'subAreas', 'responsavel', 'colaboradores', 'modelo_animal', 'planejamento', 'operacao', 'eutanasia', 'resultado'));
        return $pdf->download('pedidoSolicitacao.pdf');
    }

    public function gerarPDFAprovado($solicitacao_id)
    {   
        $solicitacao = Solicitacao::find($solicitacao_id);
        $instituicaos = Instituicao::all();
        $grandeAreas = GrandeArea::all();
        $areas = Area::all();
        $subAreas = SubArea::all();
        $responsavel = $solicitacao->responsavel;
        $colaboradores = $solicitacao->responsavel->colaboradores;
        $modelo_animal = ModeloAnimal::find($solicitacao_id);
        $planejamento = Planejamento::find($modelo_animal->id);
        $condicoes_animal = CondicoesAnimal::where('planejamento_id', $planejamento->id)->first();
        $procedimento = Procedimento::where('planejamento_id', $planejamento->id)->first();
        $operacao = Operacao::where('planejamento_id', $planejamento->id)->first();
        $eutanasia = Eutanasia::where('planejamento_id', $planejamento->id)->first();
        $resultado = Resultado::where('planejamento_id', $planejamento->id)->first();
        $avaliacao = Avaliacao::where('solicitacao_id', $planejamento->id)->first();
        $licenca = Licenca::where('avaliacao_id', $avaliacao->id)->first();

        $pdf = PDF::loadView('PDF/pdfAprovado', compact('procedimento','solicitacao','condicoes_animal','instituicaos', 'grandeAreas', 'areas', 'subAreas', 'responsavel', 'colaboradores', 'modelo_animal', 'planejamento', 'operacao', 'eutanasia', 'resultado', 'licenca'));
        return $pdf->download('pedidoAprovado.pdf');
    }
}