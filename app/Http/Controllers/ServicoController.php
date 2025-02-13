<?php

namespace App\Http\Controllers;

use App\Models\Servico;
use Illuminate\Http\Request;

class ServicoController extends Controller
{
    // Exibe todos os serviços
    public function index()
    {
        $servicos = Servico::all();
        return view('servicos.index', compact('servicos'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        return view('servicos.create');
    }

    // Salva um novo serviço
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'required|string',
            'preco' => 'required|numeric',
        ]);

        Servico::create($request->all());
        return redirect()->route('servicos.index')->with('success', 'Serviço cadastrado com sucesso!');
    }

    // Exibe um serviço específico
    public function show($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.show', compact('servico'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $servico = Servico::findOrFail($id);
        return view('servicos.edit', compact('servico'));
    }

    // Atualiza um serviço
    public function update(Request $request, $id)
    {
        $servico = Servico::findOrFail($id);
        $servico->update($request->all());
        return redirect()->route('servicos.index');
    }

    // Exclui um serviço
    public function destroy($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return redirect()->route('servicos.index');
    }
}
