<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Ordem extends Model
{
    use HasFactory;
    protected $table = 'ordens';
    protected $primaryKey = 'id_ordem';

    //public $incrementing = false;

    protected $fillable = [
        'cliente_id',
        'equipamento',
        'modelo',
        'senha',
        'defeito',
        'estado',
        'acessorios',
        'observacoes',
        'previsao',
        'orcamento',
        'valorcamento',
        'servico',
        'valservico',
        'valtotal',
        'status',//orcamento,comunicado, entregue
        'dt_entrega',
        'hr_entrega',
        'tecnico',

    ];

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }

    public function pecas(){
        return $this->hasMany(Peca::class, 'ordem_peca', 'id_peca', 'id_peca');
    }
}
