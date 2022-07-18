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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/instituicao/store', [App\Http\Controllers\InstituicaoController::class, 'store'])->name('instituicao.store');
Route::post('/instituicao/update', [App\Http\Controllers\InstituicaoController::class, 'update'])->name('instituicao.update');
Route::get('/instituicao/index', [App\Http\Controllers\InstituicaoController::class, 'index'])->name('instituicao.index');
Route::get('/instituicao/{instituicao_id}/delete', [App\Http\Controllers\InstituicaoController::class, 'delete'])->name('instituicao.delete');

Route::get('/instituicao/{instituicao_id}/unidade/index', [App\Http\Controllers\UnidadeController::class, 'index'])->name('unidade.index');
Route::post('/unidade/store', [App\Http\Controllers\UnidadeController::class, 'store'])->name('unidade.store');
Route::post('/unidade/update', [App\Http\Controllers\UnidadeController::class, 'update'])->name('unidade.update');
Route::get('/unidade/{unidade_id}/delete', [App\Http\Controllers\UnidadeController::class, 'delete'])->name('unidade.delete');

Route::get('/unidade/{unidade_id}/departamento/index', [App\Http\Controllers\DepartamentoController::class, 'index'])->name('departamento.index');
Route::post('/departamento/store', [App\Http\Controllers\DepartamentoController::class, 'store'])->name('departamento.store');
Route::post('/departamento/update', [App\Http\Controllers\DepartamentoController::class, 'update'])->name('departamento.update');
Route::get('/departamento/{departamento_id}/delete', [App\Http\Controllers\DepartamentoController::class, 'delete'])->name('departamento.delete');


Route::post('/unidades/',[App\Http\Controllers\UnidadeController::class, 'consulta'])->name('unidade.consulta');

