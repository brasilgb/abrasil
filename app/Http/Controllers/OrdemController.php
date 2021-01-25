<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Cliente;
use App\Models\Empresa;
use App\Models\Mensagem;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use PDF;

class OrdemController extends Controller
{
    /**
     * @var Ordem
     */
    protected $ordem;
    protected $cliente;
    protected $empresa;

    public function __construct(Ordem $ordem, Cliente $cliente, Empresa $empresa, Mensagem $mensagem)
    {
        $this->ordem = $ordem;
        $this->cliente = $cliente;
        $this->empresa = $empresa;
        $this->mensagem = $mensagem;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $term = '';
        $ordens = $this->ordem->orderby('id_ordem', 'DESC')->paginate(15);
        return view('ordens.index', compact('ordens', 'term'));
    }

    /**
     * Busca de ordens
     */
    public function busca(Request $request)
    {
        $term = $request->input('term');
        $ordens = $this->ordem->where('id_ordem', $term)->get();
        return view('ordens.index', compact('ordens', 'term'));
    }

 /**
     * Busca de ordens
     */
    public function ordemcliente($cliente)
    {
        $term = 'clientes';
        $ordens = $this->ordem->where('cliente_id', $cliente)->paginate(15);
        return view('ordens.index', compact('ordens', 'term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordens = $this->ordem->orderby('id_ordem', 'ASC')->get();
        foreach ($ordens as $next) :
            $proxordem = $next->id_ordem;
        endforeach;
        return view('ordens.create', compact('proxordem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $rules = [
            'cliente_id' => 'required',
            'equipamento' => 'required',
            'modelo' => 'required',
            'senha' => 'required',
            'defeito' => 'required',
            'estado' => 'required',
            'acessorios' => 'nullable',
            'observacoes' => 'nullable',
            'previsao' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $data['previsao'] = Carbon::createFromFormat("d/m/Y", $request->previsao)->format("Y-m-d");
            $this->ordem->create($data);
            flash('<i class="fa fa-check"></i> Ordem salva com sucesso!')->success();
            return redirect()->route('ordens.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir ordem!';
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function show(Ordem $orden)
    {
        return view('ordens.edit', compact('orden'));
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
    public function update(Request $request, Ordem $orden)
    {
        $data = $request->all();
        $rules = [
            'cliente_id' => 'required',
            'equipamento' => 'required',
            'modelo' => 'required',
            'senha' => 'required',
            'defeito' => 'required',
            'estado' => 'required',
            'acessorios' => 'nullable',
            'observacoes' => 'nullable',
            'previsao' => 'nullable',
            'orcamento' => 'nullable',
            'valorcamento' => 'nullable',
            'pecas' => 'nullable',
            'valpecas' => 'nullable',
            'servico' => 'nullable',
            'valservico' => 'nullable',
            'valtotal' => 'nullable',
            'status' => 'nullable', //orcamento,comunicado, entregue
            'dt_entrega' => 'nullable',
            'tecnico' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $data['previsao'] = Carbon::createFromFormat("d/m/Y", $request->previsao)->format("Y-m-d");
            $orden->update($data);
            flash('<i class="fa fa-check"></i> Ordem alterada com sucesso!')->success();
            return redirect()->route('ordens.show', ['orden' => $orden->id_ordem]);
        } catch (\Exception $e) {
            $message = 'Erro ao inserir ordem!';
            if (env('APP_DEBUG')) {
                $message = $e->getMessage();
            }
            flash($message)->warning();
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ordem  $ordem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ordem $orden)
    {
        $orden->delete();
        flash('<i class="fa fa-check"></i> Ordem removida com sucesso!')->success();
        return redirect()->route('ordens.index');
    }

    /**
     * Autocomplete campo cliente
     */
    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        if ($term == '') :
            $ordens = $this->ordem->orderby('id_ordem', 'ASC')->select('id_ordem')->limit(5)->get();
        else :
            $ordens = $this->ordem->orderby('id_ordem', 'ASC')->select('id_ordem')->where('id_ordem', 'LIKE', $term . '%')->get();
        endif;

        foreach ($ordens as $ordem) {
            $response[] = ['value' => $ordem->id_ordem];
        }
        return response()->json($response);
    }

    /**
     * Imprime recibos de Ordens de serviço
     */
    public function recibo(Ordem $orden) {
        // dd($orden->id_ordem);
        $ordens = $this->ordem->where('id_ordem', $orden->id_ordem)->get()->first();
        $empresa = $this->empresa->get()->first();
        $mensagem = $this->mensagem->get()->first();
        $data = [
            'ordens' => $ordens,
            'empresa' => $empresa,
            'mensagem' => $mensagem
        ];

        $pdf = PDF::loadView('ordens.recibo', $data);

        // download PDF file with download method
        return $pdf->stream('recibo.pdf');
    }
}
