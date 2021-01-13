<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_agenda';
//    public $incrementing = false;
protected $fillable = [
    'cliente_id',
    'tecnico_id',
    'data',
    'hora',
    'servico',
    'detalhes',
    'tecnico',
    'status',
    'observacoes'
];


public function clientes(){
    return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
}

public function users(){
    return $this->belongsTo(User::class, 'tecnico_id', 'id');
}
}
