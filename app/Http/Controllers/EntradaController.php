<?php
namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Pet;
use App\Models\Servico;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    // Exibe todas as entradas
    public function index()
    {
        $entradas = Entrada::with(['pet', 'servico'])->get();
        return view('entradas.index', compact('entradas'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        $pets = Pet::all();
        $servicos = Servico::all();
        return view('entradas.create', compact('pets', 'servicos'));
    }

    // Salva uma nova entrada
    public function store(Request $request)
    {
        $request->validate([
            'pet_id' => 'required|exists:pets,id',
            'servico_id' => 'required|exists:servicos,id',
        ]);

        Entrada::create($request->all());
        return redirect()->route('entradas.index');
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
        $entrada->update($request->all());
        return redirect()->route('entradas.index');
    }

    // Exclui uma entrada
    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();
        return redirect()->route('entradas.index');
    }
}
