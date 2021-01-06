<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Cliente;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    /**
     * @var Ordem
     */
    protected $ordem;
    protected $cliente;

    public function __construct(Ordem $ordem, Cliente $cliente)
    {
        $this->ordem = $ordem;
        $this->cliente = $cliente;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = '';
        $ordens = $this->ordem->orderby('id_ordem', 'DESC')->paginate(15);

        return view('ordens.index', compact('ordens', 'term'));
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
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function show(Ordem $orden)
    {
        return view('ordens.edit', compact('ordem'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function edit(Ordem $ordem)
    {
        return redirect()->route('ordens.show', ['ordem' => $ordem->id_ordem]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordem $ordem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordem $ordem)
    {
        //
    }
}
