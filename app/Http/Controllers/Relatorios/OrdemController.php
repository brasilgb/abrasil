<?php

namespace App\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    public function index()
    {
        return view('relatorios.ordens.index');
    }
}
