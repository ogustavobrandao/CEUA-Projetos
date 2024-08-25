<?php

use App\Http\Controllers\AvaliacaoController;
use App\Http\Controllers\AvaliacaoIndividualController;
use App\Http\Controllers\AvaliadorController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InstituicaoController;
use App\Http\Controllers\PDFViewController;
use App\Http\Controllers\SolicitacaoController;
use App\Http\Controllers\UnidadeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes(['verify' => true]);

Route::get('/', function () {
    if (Auth::check())
        return redirect()->route('home');
    return view('welcome');
})->name('welcome');

Route::get('/create', [UsuarioController::class, 'createSolicitante'])->name('create_solicitante');
Route::post('/store', [UsuarioController::class,'storeSolicitante'])->name('store_solicitante');
Route::group(['middleware' => ['auth', 'verified']], function () {

    Route::get('/home', [HomeController::class, 'home'])->name('home');
    Route::get('editar/perfil', [UsuarioController::class, 'editar_perfil'])->name('user.perfil.editar');
    Route::get('editar/senha', [UsuarioController::class, 'editar_senha'])->name('user.senha.editar');
    Route::post('alterar/senha', [UsuarioController::class, 'alterar_senha'])->name('user.senha.alterar');
    Route::post('alterar/perfil', [UsuarioController::class, 'alterar_perfil'])->name('user.perfil.alterar');

    Route::get('/formula/{planejamento_id}/download', [SolicitacaoController::class, 'downloadFormula'])->name('planejamento.formula.download');
    Route::get('/anexo_amostra_planejamento/{planejamento_id}/download', [SolicitacaoController::class, 'downloadAnexoAmostraPlanejamento'])->name('anexo_amostra_planejamento.download');
    Route::get('/licencas_previas/{modelo_animal_id}/download', [SolicitacaoController::class, 'downloadLicencasPrevias'])->name('licencas_previas.download');
    Route::get('/termos_responsabilidades/{responsavel_id}/download', [SolicitacaoController::class, 'downloadTermoResponsabilidade'])->name('termo_responsabilidade.downloadTermoResponsabilidade');
    Route::get('/treinamento/{responsavel_id}/download', [SolicitacaoController::class, 'downloadTreinamento_fileResponsavel'])->name('treinamento_file.downloadTermoResponsabilidade');
    Route::get('/experiencia/{responsavel_id}/download', [SolicitacaoController::class, 'downloadExperiencia'])->name('experiencia.download');
    Route::get('/experiencias_previasColaborador/{colaborador_id}/download', [SolicitacaoController::class, 'downloadExperienciaPreviaColaborador'])->name('experiencias_previasColaborador.download');
    Route::get('/treinamentoColaborador/{colaborador_id}/download', [SolicitacaoController::class, 'downloadTreinamento_fileColaborador'])->name('treinamento_fileColaborador.download');

    Route::get('/termos_responsabilidadesColaborador/{colaborador_id}/download', [SolicitacaoController::class, 'downloadTermoResponsabilidadeColaborador'])->name('termo_responsabilidadeColaborador.download');
    Route::get('/termo/{modelo_animal_id}/download', [SolicitacaoController::class, 'downloadTermo'])->name('termo.download');
});

Route::group(['middleware' => ['auth', 'verified', 'checkRole:Administrador']], function () {

    route::get('/home/adm', [HomeController::class, 'perfilAdmin'])->name('perfil_adm');
    
    //criação de usuário pelo adm
    Route::prefix('/usuarios')->controller(UsuarioController::class)->group(function(){
        Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
        Route::post('/store', [UsuarioController::class, 'store'])->name('usuario.store');
        Route::put('/update/{id}', [UsuarioController::class, 'update'])->name('usuario.update');

    });

    route::prefix('/intituicao')->controller(InstituicaoController::class)->group(function () {
        Route::post('/store', 'store')->name('instituicao.store');
        Route::post('/update', 'update')->name('instituicao.update');
        Route::get('/index', 'index')->name('instituicao.index');
        Route::get('/{instituicao_id}/delete', 'delete')->name('instituicao.delete');
    });
    
   

    Route::get('/instituicao/{instituicao_id}/unidade/index', [UnidadeController::class, 'index'])->name('unidade.index');
    Route::post('/unidade/store', [UnidadeController::class, 'store'])->name('unidade.store');
    Route::post('/unidade/update', [UnidadeController::class, 'update'])->name('unidade.update');
    Route::get('/unidade/{unidade_id}/delete', [UnidadeController::class, 'delete'])->name('unidade.delete');

    Route::get('/unidade/{unidade_id}/departamento/index', [DepartamentoController::class, 'index'])->name('departamento.index');
    Route::post('/departamento/store', [DepartamentoController::class, 'store'])->name('departamento.store');
    Route::post('/departamento/update', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::get('/departamento/{departamento_id}/delete', [DepartamentoController::class, 'delete'])->name('departamento.delete');

    Route::get('/solicitacao/index_admin', [SolicitacaoController::class, 'index_admin'])->name('solicitacao.admin.index');
    Route::post('/solicitacao/atribuir_avaliador', [AvaliadorController::class, 'atribuir'])->name('avaliador.atribuir');
    Route::post('/solicitacao/remover_avaliador', [AvaliadorController::class, 'remover'])->name('avaliador.remover');
    Route::get('/solicitacao/{solicitacao_id}/visualizar', [SolicitacaoController::class, 'visualizar'])->name('solicitacao.admin.visualizar');
    Route::get('/solicitacao/{solicitacao_id}/apreciacao', [SolicitacaoController::class, 'aprovar_avaliacao'])->name('solicitacao.admin.apreciacao');
    Route::get('/historico_modal/{solicitacao_id}', [SolicitacaoController::class, 'HistoricoModal'])->name('historico.modal');
    Route::get('/solicitacao/{solicitacao}/historicos/download', [SolicitacaoController::class, 'historicoDownload'])->name('solicitacao.historicos.download');

    Route::get('/solicitacao/planejamento/index/adm/{modelo_animal_id}', [SolicitacaoController::class, 'index_planejamento_adm'])->name('solicitacao.planejamento.index.adm');
    Route::get('/solicitacao/modelo_animal_tabela/adm/{id}', [SolicitacaoController::class, 'atualizar_modelo_animal_tabela_adm'])->name('solicitacao.modelo_animal_tabela_adm');
    Route::post('/adm/aprovar', [AvaliacaoController::class, 'aprovarSolicitacaoAdm'])->name('adm.solicitacao.aprovar');

});


Route::group(['middleware' => ['auth', 'verified', 'checkRole:Solicitante']], function () {
    Route::get('/solicitacao/index_solicitante', [SolicitacaoController::class, 'index_solicitante'])->name('solicitacao.solicitante.index');
    Route::post('/solicitacao/inicio', [SolicitacaoController::class, 'inicio'])->name('solicitacao.inicio');
    Route::post('/solicitacao/criar', [SolicitacaoController::class, 'criar'])->name('solicitacao.criar');
    Route::get('/formularioE/edit/{solicitacao_id}', [SolicitacaoController::class, 'editForm'])->name('solicitacao.edit.form');
    Route::post('/solicitacao/criar_responsavel', [SolicitacaoController::class, 'criar_responsavel'])->name('solicitacao.responsavel.criar');
    Route::post('/solicitacao/criar_colaborador', [SolicitacaoController::class, 'criar_colaborador'])->name('solicitacao.colaborador.criar');
    Route::post('/solicitacao/editar_colaborador', [SolicitacaoController::class, 'editar_colaborador'])->name('solicitacao.colaborador.editar');
    Route::delete('/solicitacao/colaborador/{id}', [SolicitacaoController::class, 'deletar_colaborador'])->name('solicitacao.colaborador.deletar');
    Route::get('solicitacao/colaborador_tabela/solicitante/{id}', [SolicitacaoController::class, 'atualizar_solicitante_solicitante'])->name('solicitacao.solicitante');
    Route::post('/solicitacao/criar_eutanasia', [SolicitacaoController::class, 'criar_eutanasia'])->name('solicitacao.eutanasia.criar');
    Route::post('/solicitacao/criar_modelo_animal', [SolicitacaoController::class, 'criar_modelo_animal'])->name('solicitacao.modelo_animal.criar');
    Route::put('/solicitacao/atualizar_modelo_animal/{id}', [SolicitacaoController::class, 'atualizar_modelo_animal'])->name('solicitacao.modelo_animal.update');
    Route::delete('/solicitacao/remover_modelo_animal/{id}', [SolicitacaoController::class, 'deletar_modelo_animal'])->name('solicitacao.modelo_animal.delete');
    Route::get('/solicitacao/modelo_animal_tabela/{id}', [SolicitacaoController::class, 'atualizar_modelo_animal_tabela'])->name('solicitacao.modelo_animal_tabela');
    Route::post('/solicitacao/criar_perfil', [SolicitacaoController::class, 'criar_perfil'])->name('solicitacao.perfil.criar');
    Route::post('/solicitacao/criar_condicoes_animal', [SolicitacaoController::class, 'criar_condicoes_animal'])->name('solicitacao.condicoes_animal.criar');
    Route::post('/solicitacao/criar_planejamento', [SolicitacaoController::class, 'criar_planejamento'])->name('solicitacao.planejamento.criar');
    Route::post('/solicitacao/criar_procedimento', [SolicitacaoController::class, 'criar_procedimento'])->name('solicitacao.procedimento.criar');
    Route::post('/solicitacao/criar_resultado', [SolicitacaoController::class, 'criar_resultado'])->name('solicitacao.resultado.criar');
    Route::post('/solicitacao/criar_operacao', [SolicitacaoController::class, 'criar_operacao'])->name('solicitacao.operacao.criar');
    Route::post('/solicitacao/criar_solicitacao_fim', [SolicitacaoController::class, 'criar_solicitacao_fim'])->name('solicitacao.solicitacao_fim.criar');
    Route::get('/solicitacao/{solicitacao_id}/index', [SolicitacaoController::class, 'index_solicitacao'])->name('solicitacao.index');
    Route::delete('/solicitacao/{solicitacao_id}', [SolicitacaoController::class, 'destroySolicitacao'])->name('solicitacao.delete');

    Route::get('/solicitacao/planejamento/index/{modelo_animal_id}', [SolicitacaoController::class, 'index_planejamento'])->name('solicitacao.planejamento.index');

    Route::get('/solicitacao/{solicitacao_id}/concluir', [SolicitacaoController::class, 'concluir'])->name('solicitacao.concluir');

    route::get('/home/solicitante', [HomeController::class, 'perfilSolicitante'])->name('perfil_solicitante');

});

Route::group(['middleware' => ['auth', 'verified', 'checkRole:Avaliador']], function () {
    Route::get('/solicitacao/index_avaliador', [SolicitacaoController::class, 'index_avaliador'])->name('solicitacao.avaliador.index');
    Route::post('/avaliador/aprovar', [AvaliacaoController::class, 'aprovarSolicitacao'])->name('avaliador.solicitacao.aprovar');
    Route::post('/avaliador/aprovarPendencia', [AvaliacaoController::class, 'aprovarPendenciaSolicitacao'])->name('avaliador.solicitacao.aprovarPendencia');
    Route::post('/avaliador/reprovar', [AvaliacaoController::class, 'reprovarSolicitacao'])->name('avaliador.solicitacao.reprovar');
    Route::get('/avaliar/{solicitacao_id}', [SolicitacaoController::class, 'avaliarSolicitacao'])->name('avaliador.solicitacao.avaliar');
    Route::get('/avaliar/planejamento/{modelo_animal_id}', [SolicitacaoController::class, 'avaliarPlanejamento'])->name('avaliador.solicitacao.planejamento.avaliar');

    route::get('/home/avaliador', [HomeController::class, 'perfilAvaliador'])->name('perfil_avaliador');

//Avaliação Individual
    Route::post('/avaliacao_individual/reprovar', [AvaliacaoIndividualController::class, 'realizarAvaliacao'])->name('avaliador.avaliacao_ind.realizarAvaliacao');

    Route::get('/solicitacao/modelo_animal_tabela/avaliador/{id}', [SolicitacaoController::class, 'atualizar_modelo_animal_tabela_avaliador'])->name('solicitacao.modelo_animal_tabela_avaliador');
});

// Area e Subárea de Conhecimento

Route::post('/areas/', 'AreaController@consulta')->name('area.consulta');
Route::post('/subarea/', 'SubAreaController@consulta')->name('subarea.consulta');

//Gerar PDF
Route::get('/pdf/{solicitacao_id}', [PDFViewController::class, 'gerarPDFSolicitacao'])->name('pdf.gerarPDFSolicitacao');
Route::get('/pdf/avaliacao/{solicitacao_id}', [PDFViewController::class, 'gerarPDFAprovado'])->name('pdf.gerarPDFAprovado');


//Avaliação Individual - Ajustar middlware para Avaliador e Proprietario
Route::get('/avaliacao_individual/{tipo}/{avaliacao_id}/{id}', [AvaliacaoIndividualController::class, 'exibir'])->name('avaliador.avaliacao_ind.exibir');
Route::get('/avaliacao_individual/verificar/modelo/{modelo_animal_id}/{avaliacao_id}', [AvaliacaoIndividualController::class, 'verificarAvalModelo'])->name('avaliador.avaliacao_ind.verificar.modelo');

Route::post('/unidades', [UnidadeController::class, 'consulta'])->name('unidade.consulta');
Route::post('/departamentos', [DepartamentoController::class, 'consulta'])->name('departamento.consulta');

//Contatos
Route::get('/contato', [ContatoController::class, 'contato'])->name('contato');
Route::get('/sobre', [ContatoController::class, 'sobre'])->name('sobre');
Route::get('/fluxograma', [ContatoController::class, 'fluxograma'])->name('fluxograma_documentos');
Route::get('/leis_decretos', [ContatoController::class, 'leis_decretos'])->name('leis_decretos');
Route::get('/membros', [ContatoController::class, 'membros'])->name('membros');
Route::get('/ceua', [ContatoController::class, 'ceua'])->name('ceua');
Route::get('/videos', [ContatoController::class, 'videos'])->name('videos');
Route::get('/calendarioReunioes', [ContatoController::class, 'calendarioReunioes'])->name('calendarioReunioes');

//Downloads documentos
Route::get('/modelo/termo/responsabilidade/download', [SolicitacaoController::class,'ModeloTermoResponsabilidade_download'])->name('modelo.termo.responsabilidade.download');
Route::get('/experiencia/previa', [SolicitacaoController::class, 'termoExperienciaPreviaDownload'])->name('experiencia_previa_download');
Route::get('/declaracao/consentimento/download', [SolicitacaoController::class,'DeclaracaoConsentimento_download'])->name('declaracao.consentimento.download');
Route::get('/declaracao/isencao/download', [SolicitacaoController::class,'DeclaracaoIsencao_download'])->name('declaracao.isencao.download');




Route::get('/solicitacao/{solicitacao_id}/test', function ($solicitacao_id) {
    $solicitacao = \App\Models\Solicitacao::find($solicitacao_id);
    $instituicaos = \App\Models\Instituicao::orderByRaw("nome = 'Universidade Federal do Agreste de Pernambuco (UFAPE)' DESC, nome ASC")->get();
    $grandeAreas = \App\Models\GrandeArea::orderBy('nome')->get();
    $areas = \App\Models\Area::orderBy('nome')->get();
    $subAreas = \App\Models\SubArea::orderBy('nome')->get();

    if (Auth::user()->hasRole('Solicitante') && $solicitacao->status == 'avaliado' && $solicitacao->avaliacao->first()->status == 'aprovadaPendencia') {
        $avaliacao = \App\Models\Avaliacao::where('solicitacao_id', $solicitacao_id)->where('user_id', $solicitacao->avaliacao->first()->user_id)->first();


        $avaliacaoDadosComp = \App\Models\AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('dados_complementares_id', $solicitacao->dadosComplementares->id)->first();
        $avaliacaoDadosini = \App\Models\AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('solicitacao_id', $solicitacao->id)->first();
        $avaliacaoResponsavel = \App\Models\AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('responsavel_id', $solicitacao->responsavel->id)->first();
        $avaliacaoColaborador = \App\Models\AvaliacaoIndividual::where('avaliacao_id', $avaliacao->id)->where('tipo', 2)->first();


        return view('solicitacao.solicitante.solicitante_form', compact('solicitacao',
            'instituicaos', 'grandeAreas', 'areas', 'subAreas', 'avaliacaoDadosComp', 'avaliacaoDadosini', 'avaliacaoResponsavel', 'avaliacaoColaborador', 'avaliacao'));

    }

    return view('solicitacao.solicitante.solicitante_form', compact('solicitacao', 'instituicaos', 'grandeAreas', 'areas', 'subAreas'));
});
