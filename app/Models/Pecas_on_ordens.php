<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pecas_on_ordens extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ordem',
        'id_peca',
        'quantidade',
        'valor'
    ]; 

    public function pecas(){
        return $this->hasMany(Pecas::class, 'id_peca', 'id_peca');
    }

    public function ordens(){
        return $this->hasMany(Ordens::class, 'id_ordem', 'id_ordem');
    }
}
