<?php

namespace App\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PecaController extends Controller
{
    public function index()
    {
        return view('relatorios.pecas.index');
    }
}
