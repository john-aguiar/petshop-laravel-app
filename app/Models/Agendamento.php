<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'pet_id', 'servico_id', 'data', 'horario', 'valor'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
