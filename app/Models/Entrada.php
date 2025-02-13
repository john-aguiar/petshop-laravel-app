<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    protected $fillable = ['pet_id', 'funcionario_id', 'data_entrada'];

    public function pet()
    {
        // Uma entrada pertence a um pet == belongsTo(Pet::class)
        return $this->belongsTo(Pet::class);
    }

    public function funcionario()
    {
        // A entrada é registrada por um funcionário == belongsTo(User::class, 'funcionario_id')
        return $this->belongsTo(User::class, 'funcionario_id');
    }

    public function historicoServicos()
    {   // Uma entrada pode ter vários serviços registrados == hasMany(HistoricoServico::class)
        return $this->hasMany(HistoricoServico::class);
    }
}
