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
            // Validação dos campos obrigatórios
            $request->validate([
                'nome' => 'required',
                'email' => 'required|email|unique:clientes,email',
                'endereco' => 'required',
                'telefone' => 'required',
                'pets' => 'array', // Garante que 'pets' é um array se enviado
            ]);
    
            // Criando o cliente
            $cliente = Cliente::create($request->only(['nome', 'email', 'endereco', 'telefone']));
    
            // Associando os pets ao cliente (se existir pets no request)
            if ($request->has('pets')) {
                foreach ($request->pets as $petId) {
                    Pet::where('id', $petId)->update(['cliente_id' => $cliente->id]);
                }
            }
    
            return redirect()->route('clientes.index')->with('success', 'Cliente cadastrado com sucesso!');
        
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
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
    
        // Atualiza os dados do cliente
        $cliente->update($request->only(['nome', 'email', 'telefone'])); // Ajuste os campos conforme necessário
    
        // Valida se os pets pertencem ao cliente
        if (!empty($request->pets)) {
            foreach ($request->pets as $petId) {
                $pet = Pet::findOrFail($petId);
                
                if ($pet->cliente_id !== $cliente->id) {
                    return back()->withErrors(['pets' => 'Um ou mais pets não pertencem a este cliente.']);
                }
            }
        }
        return redirect()->route('clientes.index')->with('success', 'Cliente atualizado com sucesso!');
    }
    

    // Exclui um cliente
    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect()->route('clientes.index');
    }
}
