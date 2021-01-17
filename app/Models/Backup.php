<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Backup extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_backup';

    protected $fillable = [
        'bancodedados',
        'usuario',
        'senha',
        'diretorio',
        'discoinstalacao'
    ];
}
