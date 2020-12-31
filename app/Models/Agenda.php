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
    'data',
    'hora',
    'servico',
    'detalhes',
    'tecnico',
    'status'
];


    public function clientes(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}
