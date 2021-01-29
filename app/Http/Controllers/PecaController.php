<?php

namespace App\Http\Controllers;

use App\Models\Peca;
use App\Models\Peca_ordem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PecaController extends Controller
{
    /**
     * @var Peca
     * @var Pecaoonrdem
     */
    public function __construct(Peca $peca, Peca_ordem $pecaordem)
    {
        $this->peca = $peca;
        $this->pecaordem = $pecaordem;
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
        Peca_ordem::create($data);
        //$po = $this->pecaordem->where('id_ordem', $request->ordemid)->get();
        return response()->json(['pecas' => 'ok']);
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
