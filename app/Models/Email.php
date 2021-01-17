<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $primaryKey = "id_email";

    protected $fillable = [
        'servidor',
        'porta',
        'seguranca',
        'usuario',
        'senha'
    ];
}
