<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Models\Pet;
use App\Models\Servico;
use App\Models\Despesa;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalClientes' => Cliente::count(),
            'totalPets' => Pet::count(),
            'totalServicos' => Servico::count(),
            'totalDespesas' => Despesa::sum('valor')
        ]);
    }
}
