<?php

namespace App\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FinanceiroController extends Controller
{

    public function index(){

        return view('relatorios.financeiro.index');
    }
}
