@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="text-primary mb-4">Histórico de Serviços</h2>

    @if (empty($historicos) || count($historicos) === 0)
        <div class="alert alert-warning">Nenhum histórico encontrado.</div>
    @else
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Pet</th>
                        <th>Serviço</th>
                        <th>Valor</th>
                        <th>Entrada</th>
                        <th>Saída</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($historicos as $historico)
                    <tr>
                        <td>{{ $historico->cliente->nome ?? 'N/A' }}</td>
                        <td>{{ $historico->pet->nome ?? 'N/A' }}</td>
                        <td>{{ $historico->servico->nome ?? 'N/A' }}</td>
                        <td>R$ {{ number_format($historico->valor, 2, ',', '.') }}</td>
                        <td>{{ $historico->entrada }}</td>
                        <td>{{ $historico->saida }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
@endsection
