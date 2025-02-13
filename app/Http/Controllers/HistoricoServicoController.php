<?php
namespace App\Http\Controllers;

use App\Models\HistoricoServico;
use App\Models\Entrada;
use Illuminate\Http\Request;

class HistoricoServicoController extends Controller
{
    // Exibe todos os históricos de serviço
    public function index()
    {
        // Carrega os históricos de serviço com as entradas associadas
        $historicos = HistoricoServico::with('entrada')->get();
        return view('historico_servicos.index', compact('historicos'));
    }

    // Exibe o formulário de criação
    public function create()
    {
        $entradas = Entrada::all(); // Obtém todas as entradas para o dropdown
        return view('historico_servicos.create', compact('entradas'));
    }

    // Salva um novo histórico de serviço
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'entrada_id' => 'required|exists:entradas,id',
        ]);

        HistoricoServico::create($request->all());
        return redirect()->route('historico-servicos.index');
    }

    // Exibe um histórico de serviço específico
    public function show($id)
    {
        $historico = HistoricoServico::findOrFail($id);
        return view('historico_servicos.show', compact('historico'));
    }

    // Exibe o formulário de edição
    public function edit($id)
    {
        $historico = HistoricoServico::findOrFail($id);
        $entradas = Entrada::all();
        return view('historico_servicos.edit', compact('historico', 'entradas'));
    }

    // Atualiza um histórico de serviço
    public function update(Request $request, $id)
    {
        $historico = HistoricoServico::findOrFail($id);
        $historico->update($request->all());
        return redirect()->route('historico-servicos.index');
    }

    // Exclui um histórico de serviço
    public function destroy($id)
    {
        $historico = HistoricoServico::findOrFail($id);
        $historico->delete();
        return redirect()->route('historico-servicos.index');
    }
}
