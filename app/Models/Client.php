<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_client';
//    public $incrementing = false;
protected $fillable = [
    'name',
    'email',
    'phone',
    'mobile_phone',
    'address',
    'house_number',
    'complement',
    'neighborhood',
    'state',
    'city',
    'zip_code',
    'cpf',
    'rg',
    'contact',
    'contact_phone',
    'contact_mobile'
];

public function orders(){
    return $this->hasMany(Order::class, 'client_id', 'id_client');
}
}
