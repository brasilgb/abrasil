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

Route::resource('/', DashboardController::class);
Route::post('clientes/autocomplete', [ClienteController::class, 'autocomplete'])->name('clientes.autocomplete');
Route::post('clientes/busca', [ClienteController::class, 'busca'])->name('clientes.busca');
Route::resource('clientes', ClienteController::class);

Route::post('ordens/busca', [OrdemController::class, 'busca'])->name('ordens.busca');
Route::resource('ordens', OrdemController::class);

Route::resource('agendamentos', AgendaController::class);
Route::resource('pecas', PecaController::class);
Route::resource('configuracoes/backups', BackupController::class);
Route::resource('configuracoes/empresas', EmpresaController::class);
Route::resource('configuracoes/emails', EmailController::class);
Route::resource('configuracoes/ferramentas', FerramentaController::class);
Route::resource('configuracoes/usuarios', UsuarioController::class);
