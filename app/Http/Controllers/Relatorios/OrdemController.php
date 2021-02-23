<?php

namespace App\Http\Controllers\Relatorios;

use App\Http\Controllers\Controller;
use App\Models\Empresa;
use App\Models\Mensagem;
use App\Models\Ordem;
use Illuminate\Http\Request;

class OrdemController extends Controller
{
    /**
     * @var Ordem
     */
    protected $ordem;
    public function __construct(Ordem $ordem)
    {
        $this->ordem = $ordem;
    }

    public function index()
    {
        $ordens = $this->ordem->get();
        return view('relatorios.ordens.index', compact('ordens'));
    }

    public function status(Request $request){
        $status = $request->status;
        $term = '';
        $empresa = Empresa::get()->first();
        $mensagem = Mensagem::get()->first();
        if (!empty($empresa['empresa']) && !empty($mensagem['recebimento_recibo'])) :
            $link_blank = true;
        else :
            $link_blank = false;
        endif;
        $ordens = $this->ordem->where('status', $status)->paginate(15);
        return view('ordens.index', compact('ordens', 'term', 'link_blank'));
    }
}
