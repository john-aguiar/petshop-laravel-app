<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    protected $fillable = [
        'nome', 
        'especie', 
        'raca', 
        'idade', 
        'cliente_id'
    ];

    public function cliente()
    {
        // Um pet pertence a um cliente 
        return $this->belongsTo(Cliente::class);
    }

    public function entradas()
    {
        // Um pet pode ter várias entradas no petshop == hasMany(Entrada::class)
        return $this->hasMany(Entrada::class);
    }
}
