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

Route::resource('/', DashboardController::class)->middleware('auth');

Route::post('clientes/autocomplete', [ClienteController::class, 'autocomplete'])->name('clientes.autocomplete');
Route::post('clientes/busca', [ClienteController::class, 'busca'])->name('clientes.busca');
Route::resource('clientes', ClienteController::class);

Route::get('ordens/ordemcliente/{cliente}', [OrdemController::class, 'ordemcliente'])->name('ordens.ordemcliente');
Route::post('ordens/autocomplete', [OrdemController::class, 'autocomplete'])->name('ordens.autocomplete');
Route::post('ordens/busca', [OrdemController::class, 'busca'])->name('ordens.busca');
Route::resource('ordens', OrdemController::class);

Route::post('agendas/autocomplete', [AgendaController::class, 'autocomplete'])->name('agendas.autocomplete');
Route::post('agendas/busca', [AgendaController::class, 'busca'])->name('agendas.busca');
Route::resource('agendas', AgendaController::class);

Route::post('pecas/autocomplete', [PecaController::class, 'autocomplete'])->name('pecas.autocomplete');
Route::post('pecas/busca', [PecaController::class, 'busca'])->name('pecas.busca');
Route::resource('pecas', PecaController::class);

Route::resource('configuracoes/backups', BackupController::class);
Route::resource('configuracoes/empresas', EmpresaController::class);
Route::resource('configuracoes/emails', EmailController::class);
Route::resource('configuracoes/ferramentas', FerramentaController::class);

Route::post('usuarios/autocomplete', [UsuarioController::class, 'autocomplete'])->name('usuarios.autocomplete');
Route::post('usuarios/busca', [UsuarioController::class, 'busca'])->name('usuarios.busca');
Route::resource('configuracoes/usuarios', UsuarioController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
