<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ordem;
use App\Models\Cliente;
use App\Models\Peca;
use App\Models\Agenda;
use phpDocumentor\Reflection\Types\This;

class DashboardController extends Controller
{
    /**
     * @var Ordem
     * @var Cliente
     * @var Peca
     * @var Agenda
     */
    protected $ordem;
    protected $cliente;
    protected $peca;
    protected $agenda;

    public function __construct(Ordem $ordem, Cliente $cliente, Peca $peca, Agenda $agenda)
    {
        $this->ordem = $ordem;
        $this->cliente = $cliente;
        $this->peca = $peca;
        $this->agenda = $agenda;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordens = $this->ordem;
        $clientes = $this->cliente;
        $pecas = $this->peca;
        $agendas = $this->agenda;

        return view('dashboard.index', compact('ordens', 'clientes', 'pecas', 'agendas'));
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
