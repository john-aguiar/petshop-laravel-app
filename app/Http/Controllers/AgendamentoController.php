<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agendamento;
use App\Models\Cliente;
use App\Models\Pet;
use App\Models\Servico;

class AgendamentoController extends Controller
{
    public function index()
    {
        $agendamentos = Agendamento::with(['cliente', 'pet', 'servico'])->get();
        return view('agendamentos.index', compact('agendamentos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $pets = Pet::all();
        $servicos = Servico::all();
        return view('agendamentos.create', compact('clientes', 'pets', 'servicos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cliente_id' => 'required|exists:clientes,id',
            'pet_id' => 'required|exists:pets,id',
            'servico_id' => 'required|exists:servicos,id',
            'data' => 'required|date',
            'horario' => 'required',
            'valor' => 'required',
        ]);

        Agendamento::create($request->all());
        return redirect()->route('agendamentos.index')->with('success', 'Serviço agendado com sucesso!');
    }

    public function destroy(Agendamento $agendamento)
    {
        $agendamento->delete();
        return redirect()->route('agendamentos.index')->with('success', 'Agendamento removido!');
    }
}
