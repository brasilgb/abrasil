<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mensagem extends Model
{
    use HasFactory;
    protected $table = 'mensagens';
    protected $primaryKey = 'id_mensagem';
    public $incrementing = false;
    protected $fillable = [
        'recebimento_recibo',
        'entrega_recibo',
        'mensagem_agendamento',
        'mensagem_servico_concluido'
    ];
}
