@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Lista de Serviços</h1>
    
    <a href="{{ route('servicos.create') }}" class="btn btn-primary mb-3">Adicionar Serviço</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead class="table-dark">
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicos as $servico)
            <tr>
                <td>{{ $servico->nome }}</td>
                <td>{{ $servico->descricao ?? 'Sem descrição' }}</td>
                <td>R$ {{ number_format($servico->preco, 2, ',', '.') }}</td>
                <td>
                    <a href="{{ route('servicos.edit', $servico->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    <form action="{{ route('servicos.destroy', $servico->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir este serviço?')">Excluir</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
