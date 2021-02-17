<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrdemController;
use App\Http\Controllers\PecaController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\Configuracoes\BackupController;
use App\Http\Controllers\Configuracoes\EmpresaController;
use App\Http\Controllers\Configuracoes\EmailController;
use App\Http\Controllers\Configuracoes\FerramentaController;
use App\Http\Controllers\Configuracoes\UsuarioController;
use App\Http\Controllers\Configuracoes\MensagemController;
use App\Http\Controllers\Relatorios\ClienteController as RelCliente;
use App\Http\Controllers\Relatorios\OrdemController as RelOrdem;
use App\Http\Controllers\Relatorios\PecaController as RelPeca;
use App\Http\Controllers\Relatorios\AgendaController as RelAgenda;
use Illuminate\Support\Facades\Auth;

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
Route::get('/', [DashboardController::class, 'index'])->name('dashboards')->middleware('auth');

Route::post('clientes/autocomplete', [ClienteController::class, 'autocomplete'])->name('clientes.autocomplete')->middleware('auth');
Route::post('clientes/busca', [ClienteController::class, 'busca'])->name('clientes.busca')->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');

Route::get('ordens/reciboentrega/{orden}', [OrdemController::class, 'reciboentrega'])->name('ordens.reciboentrega')->middleware('auth');
Route::get('ordens/reciborecebe/{orden}', [OrdemController::class, 'reciborecebe'])->name('ordens.reciborecebe')->middleware('auth');
Route::get('ordens/ordemcliente/{cliente}', [OrdemController::class, 'ordemcliente'])->name('ordens.ordemcliente')->middleware('auth');
Route::post('ordens/autocomplete', [OrdemController::class, 'autocomplete'])->name('ordens.autocomplete')->middleware('auth');
Route::post('ordens/busca', [OrdemController::class, 'busca'])->name('ordens.busca')->middleware('auth');
Route::resource('ordens', OrdemController::class)->middleware('auth');

Route::get('agendas/enviaremail/{agendaid}/{clienteid}', [AgendaController::class, 'enviaremail'])->name('agendas.enviaremail')->middleware('auth');
Route::post('agendas/autocomplete', [AgendaController::class, 'autocomplete'])->name('agendas.autocomplete')->middleware('auth');
Route::post('agendas/busca', [AgendaController::class, 'busca'])->name('agendas.busca')->middleware('auth');
Route::resource('agendas', AgendaController::class)->middleware('auth');

Route::get('pecas/delpecord/{peca}', [PecaController::class, 'delpecord'])->name('pecas.delpecord')->middleware('auth');
Route::post('pecas/pecasordens', [PecaController::class, 'pecasordens'])->name('pecas.pecasordens')->middleware('auth');
Route::post('pecas/autocomplete', [PecaController::class, 'autocomplete'])->name('pecas.autocomplete')->middleware('auth');
Route::post('pecas/busca', [PecaController::class, 'busca'])->name('pecas.busca')->middleware('auth');
Route::resource('pecas', PecaController::class)->middleware('auth');

Route::resource('configuracoes/backups', BackupController::class)->middleware('auth');
Route::resource('configuracoes/empresas', EmpresaController::class)->middleware('auth');
Route::resource('configuracoes/emails', EmailController::class)->middleware('auth');
Route::resource('configuracoes/mensagens', MensagemController::class)->middleware('auth');

Route::post('configuracoes/ferramentas/gretiquetas', [FerramentaController::class, 'gretiquetas'])->name('ferramentas.gretiquetas')->middleware('auth');
Route::resource('configuracoes/ferramentas', FerramentaController::class)->middleware('auth');

Route::post('usuarios/autocomplete', [UsuarioController::class, 'autocomplete'])->name('usuarios.autocomplete')->middleware('auth');
Route::post('usuarios/busca', [UsuarioController::class, 'busca'])->name('usuarios.busca')->middleware('auth');
Route::resource('configuracoes/usuarios', UsuarioController::class)->middleware('auth');

Route::get('relatorios/clientes', [RelCliente::class, 'index'])->name('relatorios.clientes')->middleware('auth');
Route::get('relatorios/ordens', [RelOrdem::class, 'index'])->name('relatorios.ordens')->middleware('auth');
Route::get('relatorios/pecas', [RelPeca::class, 'index'])->name('relatorios.pecas')->middleware('auth');
Route::get('relatorios/agendas', [RelAgenda::class, 'index'])->name('relatorios.agendas')->middleware('auth');

