<?php

namespace App\Http\Controllers;

use App\Models\Ordem;
use App\Models\Peca;
use App\Models\Ordempeca;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PecaController extends Controller
{
    /**
     * @var Peca
     * @var Ordempeca;
     */
    public function __construct(Ordem $ordem, Peca $peca, Ordempeca $ordempeca)
    {
        $this->ordem = $ordem;
        $this->peca = $peca;
        $this->ordempeca = $ordempeca;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = '';
        $pecas = $this->peca->orderBy('id_peca', 'DESC')->paginate(15);
        return view('pecas.index', compact('pecas', 'term'));
    }

    /**
     * Busca de pecas
     */
    public function busca(Request $request)
    {
        $term = $request->input('term');
        $pecas = $this->peca->where('peca', $term)->paginate(15);
        return view('pecas.index', compact('pecas', 'term'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pecas.create');
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
            'peca' => 'required',
            'descricao' => 'required',
            'fabricante' => 'required',
            'quantidade' => 'required',
            'valor' => 'required',
            'situacao' => 'required',
            'observacoes' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $this->peca->create($data);
            flash('<i class="fa fa-check"></i> Peça salva com sucesso!')->success();
            return redirect()->route('pecas.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir peça!';
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
     * @param  \App\Models\Peca  $peca
     * @return \Illuminate\Http\Response
     */
    public function show(Peca $peca)
    {
        return view('pecas.edit', compact('peca'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peca  $peca
     * @return \Illuminate\Http\Response
     */
    public function edit(Peca $peca)
    {
        return redirect()->route('pecas.show', ['peca' => $peca->id_peca]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peca  $peca
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peca $peca)
    {
        $data = $request->all();
        $rules = [
            'peca' => 'required',
            'descricao' => 'required',
            'fabricante' => 'required',
            'quantidade' => 'required',
            'valor' => 'required',
            'situacao' => 'required',
            'observacoes' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $peca->update($data);
            flash('<i class="fa fa-check"></i> Peça salva com sucesso!')->success();
            return redirect()->route('pecas.show', ['peca' => $peca->id_peca]);
        } catch (\Exception $e) {
            $message = 'Erro ao inserir peça!';
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
     * @param  \App\Models\Peca  $peca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peca $peca)
    {
        $peca->delete();
        flash('<i class="fa fa-check"></i> Peça removida com sucesso!')->success();
        return redirect()->route('pecas.index');
    }

    /**
     * Adiciona peças as ordens de serviço e remove do estoque
     */
    public function pecasordens(Request $request){
        $data['id_ordem'] = $request->ordemid;
        $data['id_peca'] = $request->pecaid;
        $data['quantidade'] = 1;
        $this->ordempeca->create($data);

        $ordens = Ordempeca::where('id_ordem', $request->ordemid)->get();// 'R$ '.number_format($peca->valor, 2, ',', '.')
        $sum = 0;
        foreach ($ordens as $ordem):
                    foreach($this->peca::where('id_peca', $ordem->id_peca)->get() as $pecas):
                        $result[] = '<li class="list-group-item"><i class="fa fa-caret-right text-default"></i> '.$pecas->peca.'<span style="margin-left:10%;">R$'.number_format($pecas->valor, 2, ',', '.').'</span><a title="Remover peça da lista" href="'.route('pecas.delpecord', ['peca' => $ordem->id_peca]).'"><i class="fa fa-times text-danger float-right"></i></a></li>';
                        $sum += $pecas->valor;
                    endforeach;
                endforeach;
                array_push($result,'<li class="list-group-item list-group-item-action list-group-item-info"><i class="fa fa-check text-success"></i>Total em peças: '.number_format($sum, 2, ',', '.').'</li><input class="totalgeral" type="hidden" value="'.$sum.'">');
        return response()->json(['pecas' => $result]);
    }

    public function delpecord($peca){
        $ordem = Ordempeca::where('id_peca', $peca)->get()->first();
        Ordempeca::where('id_peca', $peca)->delete();
        return redirect()->route('ordens.show', ['orden' => $ordem['id_ordem']]);
    }
    /**
     * Autocomplete campo cliente
     */
    public function autocomplete(Request $request)
    {
        $term = $request->input('term');
        if ($term == '') :
            $pecas = $this->peca->orderby('peca', 'ASC')->select('id_peca', 'peca')->limit(5)->get();
        else :
            $pecas = $this->peca->orderby('peca', 'ASC')->select('id_peca', 'peca')->where('peca', 'LIKE', $term . '%')->get();
        endif;

        foreach ($pecas as $peca) {
            $response[] = ['value' => $peca->id_peca, 'label' => $peca->peca];
        }
        return response()->json($response);
    }
}
