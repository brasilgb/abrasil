<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Models\Backup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BackupController extends Controller
{
    /**
     * @var Backup
     */
    protected $backup;

    public function __construct(Backup $backup)
    {
        $this->backup = $backup;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = $this->backup->all()->count();
        if($count > 0):
            $backups = $this->backup->all();
        else:
            $this->backup->create(['bancodedados' => '']);
            $backups = $this->backup->all();
        endif;

        return view('backups.index', compact('backups'));
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
     * @param  \App\Models\Backup  $backup
     * @return \Illuminate\Http\Response
     */
    public function show(Backup $backup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Backup  $backup
     * @return \Illuminate\Http\Response
     */
    public function edit(Backup $backup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Backup  $backup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Backup $backup)
    {
        $data = $request->all();
        $rules = [
            'bancodedados' => 'required',
            'usuario' => 'required',
            'senha' => 'required',
            'diretorio' => 'required',
            'discoinstalacao' => 'required',
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            $backup->update($data);
            flash('<i class="fa fa-check"></i> Dados de backup registrados com sucesso!')->success();
            return redirect()->route('backups.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir dados do backup!';
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
     * @param  \App\Models\Backup  $backup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Backup $backup)
    {
        //
    }
}
