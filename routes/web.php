<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PartController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\BackupController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\UserController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('clientes', ClientController::class);
Route::resource('ordens', OrderController::class);
Route::resource('agendamentos', ScheduleController::class);
Route::resource('pecas', PartController::class);
Route::resource('backups', BackupController::class);
Route::resource('empresas', CompanyController::class);
Route::resource('emails', EmailController::class);
Route::resource('ferramentas', ToolController::class);
Route::resource('usuarios', UserController::class);

