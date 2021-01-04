<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Validator;

class ClienteController extends Controller
{
    /**
     * @var Cliente
     */
    protected $cliente;
    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->cliente->orderby('id_cliente', 'DESC')->paginate(20);
        return view('clientes.index', compact('clientes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
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
            'cliente' => 'required',
            'email' => 'required',
            'telefone' => 'nullable',
            'celular' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'cpf' => 'required',
            'rg' => 'nullable',
            'contato' => 'nullable',
            'telefone_contato' => 'nullable',
            'celular_contato' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $this->cliente->create($data);
            flash('<i class="fa fa-check"></i> Cliente salvo com sucesso!')->success();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir cliente!';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        return redirect()->route('clientes.show', ['cliente' => $cliente->id_cliente]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->all();
        $rules = [
            'cliente' => 'required',
            'email' => 'required',
            'telefone' => 'nullable',
            'celular' => 'required',
            'logradouro' => 'required',
            'numero' => 'required',
            'complemento' => 'required',
            'bairro' => 'required',
            'estado' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'cpf' => 'required',
            'rg' => 'nullable',
            'contato' => 'nullable',
            'telefone_contato' => 'nullable',
            'celular_contato' => 'nullable'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $cliente->update($data);
            flash('<i class="fa fa-check"></i> Cliente salvo com sucesso!')->success();
            return redirect()->route('clientes.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir cliente!';
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        flash('<i class="fa fa-check"></i> Cliente removido com sucesso!')->success();
        return redirect()->route('clientes.index');

    }
}
