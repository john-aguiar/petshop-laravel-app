<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HistoricoEntrada;

class HistoricoEntradaController extends Controller
{
    public function index()
    {
        $historico = HistoricoEntrada::with(['pet', 'cliente', 'servico'])->orderBy('saida', 'desc')->get();
                // Verifica se encontrou registros
                if ($historico->isEmpty()) {
                    return view('historico.index')->with('historico', []);
                }
        
                // Retornar a view com os dados
                return view('historico.index', compact('historico'));
    }
}
