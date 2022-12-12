<?php

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
Auth::routes();
Route::get('/', [App\Http\Controllers\HomeController::class, 'home'])->name('welcome');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'home'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::get('editar/perfil', [\App\Http\Controllers\UsuarioController::class, 'editar_perfil'])->name('user.perfil.editar');
    Route::post('alterar/perfil', [\App\Http\Controllers\UsuarioController::class, 'alterar_perfil'])->name('user.perfil.alterar');
});

Route::group(['middleware' => 'checkAdministrador'], function () {
    Route::post('/instituicao/store', [App\Http\Controllers\InstituicaoController::class, 'store'])->name('instituicao.store');
    Route::post('/instituicao/update', [App\Http\Controllers\InstituicaoController::class, 'update'])->name('instituicao.update');
    Route::get('/instituicao/index', [App\Http\Controllers\InstituicaoController::class, 'index'])->name('instituicao.index');
    Route::get('/instituicao/{instituicao_id}/delete', [App\Http\Controllers\InstituicaoController::class, 'delete'])->name('instituicao.delete');

    Route::get('/usuarios', [App\Http\Controllers\UsuarioController::class, 'index'])->name('usuarios.index');
    Route::post('/usuario/store', [App\Http\Controllers\UsuarioController::class, 'store'])->name('usuario.store');
    Route::post('/usuario/update', [App\Http\Controllers\UsuarioController::class, 'update'])->name('usuario.update');

    Route::get('/instituicao/{instituicao_id}/unidade/index', [App\Http\Controllers\UnidadeController::class, 'index'])->name('unidade.index');
    Route::post('/unidade/store', [App\Http\Controllers\UnidadeController::class, 'store'])->name('unidade.store');
    Route::post('/unidade/update', [App\Http\Controllers\UnidadeController::class, 'update'])->name('unidade.update');
    Route::get('/unidade/{unidade_id}/delete', [App\Http\Controllers\UnidadeController::class, 'delete'])->name('unidade.delete');

    Route::get('/unidade/{unidade_id}/departamento/index', [App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento.index');
    Route::post('/departamento/store', [App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento.store');
    Route::post('/departamento/update', [App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento.update');
    Route::get('/departamento/{departamento_id}/delete', [App\Http\Controllers\DepartamentoController::class, 'delete'])->name('departamento.delete');

    Route::get('/solicitacao/index_admin', [App\Http\Controllers\SolicitacaoController::class, 'index_admin'])->name('solicitacao.admin.index');
    Route::post('/solicitacao/atribuir_avaliador', [App\Http\Controllers\AvaliadorController::class, 'atribuir'])->name('avaliador.atribuir');
    Route::post('/solicitacao/remover_avaliador', [App\Http\Controllers\AvaliadorController::class, 'remover'])->name('avaliador.remover');
});

Route::group(['middleware' => 'checkProprietarioAvaliador'], function () {
    Route::get('/formulario/{solicitacao_id}', [App\Http\Controllers\SolicitacaoController::class, 'form'])->name('solicitacao.form');
    Route::get('/formulario/{solicitacao_id}/{num_pagina}', [App\Http\Controllers\SolicitacaoController::class, 'alterarPagina'])->name('solicitacao.alterar.pagina');

    Route::get('/formula/{planejamento_id}/download', [App\Http\Controllers\SolicitacaoController::class, 'downloadFormula'])->name('planejamento.formula.download');
    Route::get('/formulario_voltar/{solicitacao_id}', [App\Http\Controllers\SolicitacaoController::class, 'voltarPagina'])->name('solicitacao.voltar.pagina');
});


Route::group(['middleware' => 'checkProprietario'], function () {
    Route::get('/solicitacao/index_solicitante', [App\Http\Controllers\SolicitacaoController::class, 'index_solicitante'])->name('solicitacao.solicitante.index');
    Route::post('/solicitacao/inicio', [App\Http\Controllers\SolicitacaoController::class, 'inicio'])->name('solicitacao.inicio');
    Route::post('/solicitacao/criar', [App\Http\Controllers\SolicitacaoController::class, 'criar'])->name('solicitacao.criar');
    Route::get('/formularioE/edit/{solicitacao_id}', [App\Http\Controllers\SolicitacaoController::class, 'editForm'])->name('solicitacao.edit.form');
    Route::post('/solicitacao/criar_responsavel', [App\Http\Controllers\SolicitacaoController::class, 'criar_responsavel'])->name('solicitacao.responsavel.criar');
    Route::post('/solicitacao/criar_colaborador', [App\Http\Controllers\SolicitacaoController::class, 'criar_colaborador'])->name('solicitacao.colaborador.criar');
    Route::post('/solicitacao/criar_eutanasia', [App\Http\Controllers\SolicitacaoController::class, 'criar_eutanasia'])->name('solicitacao.eutanasia.criar');
    Route::post('/solicitacao/criar_modelo_animal', [App\Http\Controllers\SolicitacaoController::class, 'criar_modelo_animal'])->name('solicitacao.modelo_animal.criar');
    Route::post('/solicitacao/atualizar_modelo_animal', [App\Http\Controllers\SolicitacaoController::class, 'atualizar_modelo_animal'])->name('solicitacao.modelo_animal.update');
    Route::get('/solicitacao/remover_modelo_animal/{id}', [App\Http\Controllers\SolicitacaoController::class, 'deletar_modelo_animal'])->name('solicitacao.modelo_animal.delete');
    Route::post('/solicitacao/criar_perfil', [App\Http\Controllers\SolicitacaoController::class, 'criar_perfil'])->name('solicitacao.perfil.criar');
    Route::post('/solicitacao/criar_condicoes_animal', [App\Http\Controllers\SolicitacaoController::class, 'criar_condicoes_animal'])->name('solicitacao.condicoes_animal.criar');
    Route::post('/solicitacao/criar_planejamento', [App\Http\Controllers\SolicitacaoController::class, 'criar_planejamento'])->name('solicitacao.planejamento.criar');
    Route::post('/solicitacao/criar_procedimento', [App\Http\Controllers\SolicitacaoController::class, 'criar_procedimento'])->name('solicitacao.procedimento.criar');
    Route::post('/solicitacao/criar_resultado', [App\Http\Controllers\SolicitacaoController::class, 'criar_resultado'])->name('solicitacao.resultado.criar');
    Route::post('/solicitacao/criar_operacao', [App\Http\Controllers\SolicitacaoController::class, 'criar_operacao'])->name('solicitacao.operacao.criar');
    Route::post('/solicitacao/criar_solicitacao_fim', [App\Http\Controllers\SolicitacaoController::class, 'criar_solicitacao_fim'])->name('solicitacao.solicitacao_fim.criar');
    Route::get('/solicitacao/{solicitacao_id}/index', [\App\Http\Controllers\SolicitacaoController::class, 'index_solicitacao'])->name('solicitacao.index');

    Route::get('/solicitacao/planejamento/index/{modelo_animal_id}', [App\Http\Controllers\SolicitacaoController::class, 'index_planejamento'])->name('solicitacao.planejamento.index');

    Route::get('/solicitacao/{solicitacao_id}/concluir', [App\Http\Controllers\SolicitacaoController::class, 'concluir'])->name('solicitacao.concluir');

});

Route::group(['middleware' => 'checkAvaliador'], function () {
    Route::get('/solicitacao/index_avaliador', [App\Http\Controllers\SolicitacaoController::class, 'index_avaliador'])->name('solicitacao.avaliador.index');
    Route::post('/avaliador/aprovar', [App\Http\Controllers\SolicitacaoController::class, 'aprovarSolicitacao'])->name('avaliador.solicitacao.aprovar');
    Route::post('/avaliador/aprovarPendencia', [App\Http\Controllers\SolicitacaoController::class, 'aprovarPendenciaSolicitacao'])->name('avaliador.solicitacao.aprovarPendencia');
    Route::post('/avaliador/reprovar', [App\Http\Controllers\SolicitacaoController::class, 'reprovarSolicitacao'])->name('avaliador.solicitacao.reprovar');
    Route::get('/avaliar/{solicitacao_id}', [App\Http\Controllers\SolicitacaoController::class, 'avaliarSolicitacao'])->name('avaliador.solicitacao.avaliar');
    Route::get('/avaliar/planejamento/{modelo_animal_id}', [App\Http\Controllers\SolicitacaoController::class, 'avaliarPlanejamento'])->name('avaliador.solicitacao.planejamento.avaliar');


    //Avaliação Individual
    Route::get('/avaliacao_individual/{tipo}/{avaliacao_id}/{id}', [App\Http\Controllers\AvaliacaoIndividualController::class, 'exibir'])->name('avaliador.avaliacao_ind.exibir');
    Route::get('/avaliacao_individual/verificar/modelo/{modelo_animal_id}/{avaliacao_id}', [App\Http\Controllers\AvaliacaoIndividualController::class, 'verificarAvalModelo'])->name('avaliador.avaliacao_ind.verificar.modelo');
    Route::post('/avaliacao_individual/reprovar', [App\Http\Controllers\AvaliacaoIndividualController::class, 'realizarAvaliacao'])->name('avaliador.avaliacao_ind.realizarAvaliacao');

});

Route::post('/unidades', [App\Http\Controllers\UnidadeController::class, 'consulta'])->name('unidade.consulta');
Route::post('/departamentos', [App\Http\Controllers\DepartamentoController::class, 'consulta'])->name('departamento.consulta');

