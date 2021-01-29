<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peca_ordem extends Model
{
    use HasFactory;
    protected $table = 'peca_ordem';
    protected $fillable = [
        'id_peca',
        'id_ordem',
        'quantidade'
    ];

}
