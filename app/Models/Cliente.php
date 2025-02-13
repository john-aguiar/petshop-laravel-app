<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = [
        'nome', 'telefone', 'endereco', 'email'
    ];

    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
