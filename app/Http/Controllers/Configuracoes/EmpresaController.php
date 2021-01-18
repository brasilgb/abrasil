<?php

namespace App\Http\Controllers\Configuracoes;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class EmpresaController extends Controller
{
    /**
     * @var Empresa
     */
    protected $empresa;

    public function __construct(Empresa $empresa)
    {
        $this->empresa = $empresa;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $count = $this->empresa->all()->count();
        if($count > 0):
            $empresas = $this->empresa->all();
        else:
            $this->empresa->create(['empresa' => '']);
            $empresas = $this->empresa->all();
        endif;

        return view('empresas.index', compact('empresas'));
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
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //dd(public_path('img/'.$request->dblogo));
        $data = $request->all();
        $rules = [
            'empresa' => 'required',
            'razao' => 'required',
            'cnpj' => 'required',
            'logo' => 'mimes:jpeg,jpg,png',
            'endereco' => 'required',
            'bairro' => 'required',
            'cidade' => 'required',
            'cep' => 'required',
            'telefone' => 'required',
            'site' => 'nullable',
            'email' => 'required'
        ];
        $messages = [
            'required' => 'O campo :attribute deve ser preenchido!',
            'integer' => 'O campo :attribute só aceita inteiros!',
            'date_format' => 'O campo :attribute só aceita datas!',
            'unique' => 'O nome do :attribute já existe na base de dados!'
        ];
        $validator = Validator::make($data, $rules, $messages)->validate();
        try {
            if(!empty($request->logo)):
                $logo = $request->file('logo');
                $input['logo'] = time().'.'.$logo->extension();
                $destinationPath = public_path('/img');
                $img = Image::make($logo->path());
                $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
                })->save($destinationPath.'/'.$input['logo']);

                File::delete(public_path('img/'.$request->dblogo));
                $destinationPath = public_path('/img');
                $data['logo'] = $input['logo'];
            else:
                $data['logo'] = $request->dblogo;
            endif;
            $empresa->update($data);
            flash('<i class="fa fa-check"></i> Empresa registrada com sucesso!')->success();
            return redirect()->route('empresas.index');
        } catch (\Exception $e) {
            $message = 'Erro ao inserir empresa!';
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
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
