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
Route::resource('/', DashboardController::class)->middleware('auth');

Route::post('clientes/autocomplete', [ClienteController::class, 'autocomplete'])->name('clientes.autocomplete')->middleware('auth');
Route::post('clientes/busca', [ClienteController::class, 'busca'])->name('clientes.busca')->middleware('auth');
Route::resource('clientes', ClienteController::class)->middleware('auth');

Route::get('ordens/ordemcliente/{cliente}', [OrdemController::class, 'ordemcliente'])->name('ordens.ordemcliente')->middleware('auth');
Route::post('ordens/autocomplete', [OrdemController::class, 'autocomplete'])->name('ordens.autocomplete')->middleware('auth');
Route::post('ordens/busca', [OrdemController::class, 'busca'])->name('ordens.busca')->middleware('auth');
Route::resource('ordens', OrdemController::class)->middleware('auth');

Route::post('agendas/autocomplete', [AgendaController::class, 'autocomplete'])->name('agendas.autocomplete')->middleware('auth');
Route::post('agendas/busca', [AgendaController::class, 'busca'])->name('agendas.busca')->middleware('auth');
Route::resource('agendas', AgendaController::class)->middleware('auth');

Route::post('pecas/autocomplete', [PecaController::class, 'autocomplete'])->name('pecas.autocomplete')->middleware('auth');
Route::post('pecas/busca', [PecaController::class, 'busca'])->name('pecas.busca')->middleware('auth');
Route::resource('pecas', PecaController::class)->middleware('auth');

Route::resource('configuracoes/backups', BackupController::class)->middleware('auth');
Route::resource('configuracoes/empresas', EmpresaController::class)->middleware('auth');
Route::resource('configuracoes/emails', EmailController::class)->middleware('auth');

Route::post('configuracoes/ferramentas/gretiquetas', [FerramentaController::class, 'gretiquetas'])->name('ferramentas.gretiquetas')->middleware('auth');
Route::resource('configuracoes/ferramentas', FerramentaController::class)->middleware('auth');

Route::post('usuarios/autocomplete', [UsuarioController::class, 'autocomplete'])->name('usuarios.autocomplete')->middleware('auth');
Route::post('usuarios/busca', [UsuarioController::class, 'busca'])->name('usuarios.busca')->middleware('auth');
Route::resource('configuracoes/usuarios', UsuarioController::class)->middleware('auth');



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
