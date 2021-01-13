<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $primaryKey = 'id_empresa';

    protected $fillable = [
        'empresa',
        'razao',
        'cnpj',
        'logo',
        'endereco',
        'bairro',
        'cidade',
        'cep',
        'telefone',
        'site',
        'email'
    ];
}
