<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Models\Ferramenta;
use Illuminate\Http\Request;

class FerramentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ferramentas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ferramenta  $ferramenta
     * @return \Illuminate\Http\Response
     */
    public function show(Ferramenta $ferramenta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ferramenta  $ferramenta
     * @return \Illuminate\Http\Response
     */
    public function edit(Ferramenta $ferramenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ferramenta  $ferramenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ferramenta $ferramenta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ferramenta  $ferramenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ferramenta $ferramenta)
    {
        //
    }
}
