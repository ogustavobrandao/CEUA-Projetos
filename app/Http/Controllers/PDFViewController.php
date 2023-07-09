<?php namespace App\Http\Controllers;

use App\Models\Instituicao;
use App\Models\GrandeArea;
use App\Models\Area;
use App\Models\SubArea;
use App\Models\Solicitacao;
use App\Models\ModeloAnimal;
use App\Models\Planejamento;
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
        $modelos_animais = ModeloAnimal::where('solicitacao_id', $solicitacao_id)->with("planejamento", "planejamento.operacao", "planejamento.condicoesAnimal", "planejamento.procedimento", "planejamento.eutanasia", "planejamento.resultado")->get();

        $pdf = PDF::loadView('PDF/pdfSolicitacao', compact('solicitacao', 'instituicaos', 'grandeAreas', 'areas', 'subAreas', 'responsavel', 'colaboradores', 'modelos_animais'));
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
        $modelos_animais = ModeloAnimal::where('solicitacao_id', $solicitacao_id)->with("planejamento", "planejamento.operacao", "planejamento.condicoesAnimal", "planejamento.procedimento", "planejamento.eutanasia", "planejamento.resultado")->get();
        $modelo_animal = ModeloAnimal::find($solicitacao_id);
        $planejamento = Planejamento::where('modelo_animal_id', $modelo_animal->id)->first();
        $avaliacao = Avaliacao::where('solicitacao_id', $planejamento->id)->first();
        $licenca = Licenca::where('avaliacao_id', $avaliacao->id)->first();

        $pdf = PDF::loadView('PDF/pdfAprovado', compact('solicitacao', 'instituicaos', 'grandeAreas', 'areas', 'subAreas', 'responsavel', 'colaboradores', 'modelos_animais', 'licenca'));
        return $pdf->download('pedidoAprovado.pdf');
    }
}
