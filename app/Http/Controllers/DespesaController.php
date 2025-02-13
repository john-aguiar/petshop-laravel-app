<?php
namespace App\Http\Controllers;

use App\Models\Despesa;
use Illuminate\Http\Request;

class DespesaController extends Controller
{
    // Exibe todas as despesas
    public function index()
    {
        $despesas = Despesa::all();
        return view('despesas.index', compact('despesas'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        return view('despesas.create');
    }

    // Salva uma nova despesa
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
        ]);

        Despesa::create($request->all());
        return redirect()->route('despesas.index');
    }

    // Exibe uma despesa específica
    public function show($id)
    {
        $despesa = Despesa::findOrFail($id);
        return view('despesas.show', compact('despesa'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $despesa = Despesa::findOrFail($id);
        return view('despesas.edit', compact('despesa'));
    }

    // Atualiza uma despesa
    public function update(Request $request, $id)
    {
        $despesa = Despesa::findOrFail($id);
        $despesa->update($request->all());
        return redirect()->route('despesas.index');
    }

    // Exclui uma despesa
    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id);
        $despesa->delete();
        return redirect()->route('despesas.index');
    }
}
