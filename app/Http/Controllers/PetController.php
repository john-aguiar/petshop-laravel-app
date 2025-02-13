<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Cliente;
use Illuminate\Http\Request;

class PetController extends Controller
{
    // Exibe todos os pets de um cliente
    public function index()
    {
        // Recupera todos os pets com os dados do cliente
        $pets = Pet::with('cliente')->get();
        return view('pets.index', compact('pets'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        $clientes = Cliente::all(); // Obtém todos os clientes para o dropdown
        return view('pets.create', compact('clientes'));
    }

    // Salva um novo pet
    public function store(Request $request)
    {
        // Validação e criação do pet
        $request->validate([
            'nome' => 'required|string',
            'especie' => 'required|string',
            'raca' => 'nullable|string',
            'idade' => 'nullable|integer',
            'cliente_id' => 'required|exists:clientes,id'
        ]);

        Pet::create($request->all());
        return redirect()->route('pets.index');
    }

    // Exibe um pet específico
    public function show($id)
    {
        $pet = Pet::findOrFail($id);
        return view('pets.show', compact('pet'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $pet = Pet::findOrFail($id);
        $clientes = Cliente::all();
        return view('pets.edit', compact('pet', 'clientes'));
    }

    // Atualiza um pet
    public function update(Request $request, $id)
    {
        $pet = Pet::findOrFail($id);
        $pet->update($request->all());
        return redirect()->route('pets.index');
    }

    // Exclui um pet
    public function destroy($id)
    {
        $pet = Pet::findOrFail($id);
        $pet->delete();
        return redirect()->route('pets.index');
    }
}
