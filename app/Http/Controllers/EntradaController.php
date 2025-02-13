<?php
namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Pet;
use App\Models\Servico;
use App\Models\Cliente;
use App\Models\HistoricoEntrada;

use Illuminate\Http\Request;

class EntradaController extends Controller
{
    // Exibe todas as entradas
    public function index()
    {
        $pets = Pet::all();
        $clientes = Cliente::all();
        $servicos = Servico::all();
        $entradas = Entrada::whereNull('saida')->get(); // Apenas pets que ainda não saíram
    
        return view('entradas.index', compact('pets', 'clientes', 'servicos', 'entradas'));
    }
    
    
    // Exibe o formulário de criação
    public function create()
    {
        $pets = Pet::all();
        $servicos = Servico::all();
        return view('entradas.create', compact('pets', 'servicos'));
    }


    public function finalizar($id)
{


    $entrada = Entrada::findOrFail($id);

    if (!$entrada) {
        return redirect()->back()->with('error', 'Entrada não encontrada.');
    }

    // Salvar os dados no histórico antes de remover a entrada
    HistoricoEntrada::create([
        'pet_id' => $entrada->pet_id,
        'cliente_id' => $entrada->cliente_id,
        'servico_id' => $entrada->servico_id,
        'valor' => $entrada->valor,
        'entrada' => $entrada->entrada,
        'saida' => now(),
    ]);
    
    
    // Remover a entrada atual
    $entrada->delete();
    
    return redirect()->route('entradas.index')->with('success', 'Entrada finalizada e registrada no histórico!');
}


    public function store(Request $request)
{
    $request->validate([
        'pet_id' => 'required|exists:pets,id',
        'cliente_id' => 'required|exists:clientes,id',
        'servico_id' => 'required|exists:servicos,id',
        'valor' => 'required|numeric',
    ]);

    Entrada::create([
        'pet_id' => $request->pet_id,
        'cliente_id' => $request->cliente_id,
        'servico_id' => $request->servico_id,
        'valor' => $request->valor,
    ]);

    return redirect()->back()->with('success', 'Entrada registrada com sucesso!');
}

    // Exibe uma entrada específica
    public function show($id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('entradas.show', compact('entrada'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        $pets = Pet::all();
        $servicos = Servico::all();
        return view('entradas.edit', compact('entrada', 'pets', 'servicos'));
    }

    // Atualiza uma entrada
    public function update(Request $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->update(['saida' => now()]);
        return redirect()->back()->with('success', 'Saída registrada com sucesso!');
        
    }
    
    // Exclui uma entrada
    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect()->route('entradas.index');
    }


    
}
