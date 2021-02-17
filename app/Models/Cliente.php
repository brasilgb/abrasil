<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    // protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
//    public $incrementing = false;
protected $fillable = [
    'cliente',
    'nascimento',
    'email',
    'telefone',
    'celular',
    'logradouro',
    'numero',
    'complemento',
    'bairro',
    'estado',
    'cidade',
    'cep',
    'cpf',
    'rg',
    'contato',
    'telefone_contato',
    'celular_contato'
];

public function ordens(){
    return $this->hasMany(Ordem::class, 'cliente_id', 'id_cliente');
}

public function agendas(){
    return $this->hasMany(Agenda::class, 'cliente_id', 'id_cliente');
}
}
