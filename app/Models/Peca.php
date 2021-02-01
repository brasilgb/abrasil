<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_peca';
    //public $incrementing = false;

    protected $fillable = [
        'peca',
        'descricao',
        'fabricante',
        'quantidade',
        'valor',
        'situacao',
        'observacoes'
    ];

    public function ordens(){
        return $this->belongsToMany(Ordem::class, 'ordem_peca', 'id_ordem', 'id_ordem');
    }
}
