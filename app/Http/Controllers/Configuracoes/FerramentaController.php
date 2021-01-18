<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Models\Ferramenta;
use App\Models\Ordem;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\PDF;
class FerramentaController extends Controller
{

    /**
     * @var Ordem
     */
    protected $ordem;

    public function __construct(Ordem $ordem)
    {
        $this->ordem = $ordem;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $etiquetainicial = $this->ordem->orderby('id_ordem', 'DESC')->get()->first();
        return view('ferramentas.index', compact('etiquetainicial'));
    }

    public function geraEtiquetas(){
        return PDF::loadView('site.certificate.certificate', compact('products'))
                // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
                ->download('nome-arquivo-pdf-gerado.pdf');
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
