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
        'previsao'
    ];

    public function clientes(){
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id_cliente');
    }
}
