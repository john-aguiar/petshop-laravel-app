<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HistoricoServico extends Model
{
    protected $fillable = ['entrada_id', 'servico_id', 'valor'];

    public function entrada()
    {   // Cada registro do histórico pertence a uma entrada == belongsTo(Entrada::class)
        return $this->belongsTo(Entrada::class);
    }

    public function servico()
    {   // Cada registro do histórico está ligado a um serviço específico == belongsTo(Servico::class)
        return $this->belongsTo(Servico::class);
    }
}
