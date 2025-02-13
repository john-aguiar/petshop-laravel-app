@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Agendamentos</h2>
    <a href="{{ route('agendamentos.create') }}" class="btn btn-primary mb-3">Novo Agendamento</a>
    
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Cliente</th>
                <th>Pet</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Horário</th>
                <th>Valor</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach($agendamentos as $agendamento)
                <tr>
                    <td>{{ $agendamento->cliente->nome }}</td>
                    <td>{{ $agendamento->pet->nome }}</td>
                    <td>{{ $agendamento->servico->nome }}</td>
                    <td>{{ $agendamento->data }}</td>
                    <td>{{ $agendamento->horario }}</td>
                    <td>R$ {{ number_format($agendamento->valor, 2, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('agendamentos.destroy', $agendamento->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
