<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoricoEntrada extends Model
{
    use HasFactory;

    protected $table = 'historico_entradas';
    protected $fillable = ['pet_id', 'cliente_id', 'servico_id', 'valor', 'entrada', 'saida'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class);
    }
}
