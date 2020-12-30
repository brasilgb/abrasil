<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Order extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_order';

    //public $incrementing = false;

    protected $fillable = [
        'client_id',
        'previsao'
    ];

    public function clients(){
        return $this->belongsTo(Client::class, 'client_id', 'id_client');
    }
}
