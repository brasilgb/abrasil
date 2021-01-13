<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class AgendaController extends Controller
{
    /**
     * @var Agenda
     * @var User
     */
    public function __construct(Agenda $agenda, User $user)
    {
        $this->agenda = $agenda;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $term = '';
        $agendas = $this->agenda->orderBy('id_agenda', 'DESC')->paginate(15);

        return view('agendas.index', compact('agendas', 'term'));
    }

    /**
     * Busca de ordens
     */
    public function busca(Request $request)
    {
        $term = $request->input('term');
        $agendas = $this->agenda->where('cliente_id', $term)->get();
        return view('agendas.index', compact('agendas', 'term'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = $this->user->get();
        return view('agendas.create', compact('users'));
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
            'data' => 'required',
            'hora' => 'required',
            'servico' => 'required',
            'detalhes' => 'required',
            'tecnico' => 'required',
            'status' => 'required',
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
            $data['data'] = Carbon::createFromFormat("d/m/Y", $request->data)->format("Y-m-d");
            $this->agenda->create($data);
            flash('<i class="fa fa-check"></i> Agenda salva com sucesso!')->success();
            return redirect()->route('agendas.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir agenda!';
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
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        $users = $this->user->get();
        return view('agendas.edit', compact('agenda', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function edit(Agenda $agenda)
    {
        return redirect()->route('agendas.show', ['agenda' => $agenda->id_agenda]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agenda $agenda)
    {
        $data = $request->all();
        $rules = [
            'cliente_id' => 'required',
            'data' => 'required',
            'hora' => 'required',
            'servico' => 'required',
            'detalhes' => 'required',
            'tecnico' => 'required',
            'status' => 'required',
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
            $data['data'] = Carbon::createFromFormat("d/m/Y", $request->data)->format("Y-m-d");
            $agenda->update($data);
            flash('<i class="fa fa-check"></i> Agenda salvo com sucesso!')->success();
            return redirect()->route('agendas.show', ['agenda' => $agenda->id_agenda]);
        } catch (\Exception $e) {
            $message = 'Erro ao inserir agenda!';
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
     * @param  \App\Models\Schedule  $schedule
     * @return \Illuminate\Http\Response
     */
    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        flash('<i class="fa fa-check"></i> Agenda removido com sucesso!')->success();
        return redirect()->route('agendas.index');
    }
}
