<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pet;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    // Exibe a lista de clientes
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        return view('clientes.create');
    }

    // Salva o cliente
    public function store(Request $request)
    {

        try {
        $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'endereco' => 'required',
            'telefone' => 'required',
        ]);
        
        $cliente = Cliente::create($request->all());
        $cliente->pets()->sync($request->pets); // Associa os pets ao cliente


        return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
        }catch (\Illuminate\Validation\ValidationException $e) {
            dd($e->errors()); // Exibe os erros de validação
        }

        // return redirect()->route('clientes.index');
    }

    // Exibe detalhes de um cliente
    public function show($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.show', compact('cliente'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $cliente = Cliente::findOrFail($id);
        return view('clientes.edit', compact('cliente'));
    }

    // Atualiza o cliente
    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        $cliente->pets()->sync($request->pets); // Atualiza os pets associados
        return redirect()->route('clientes.index');
    }

    // Exclui um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
