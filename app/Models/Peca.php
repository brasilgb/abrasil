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
        'quantidade',
        'valor',
        'situacao',
    ];
}
