@extends('layouts.app')
@section('content')
<div class="container">
    <h1 class="mt-5">Lista de Clientes</h1>
    
    <!-- Botão para adicionar um novo cliente -->
    <a href="{{ route('clientes.create') }}" class="btn btn-primary mb-3">Adicionar Cliente</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Telefone</th>
                <th scope="col">Ações</th>
                <th scope='col'>Pets</th>
            </tr>
        </thead>
        <tbody>
            @foreach($clientes as $cliente)
                <tr>
                    <th scope="row">{{ $cliente->id }}</th>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->telefone }}</td>
                    <td>{{ $cliente->endereco }}</td>
                    <td>
                        @if($cliente->pets->isNotEmpty())
                            <ol>
                                @foreach($cliente->pets as $pet)
                                    <li>{{ $pet->nome }}</li>
                                @endforeach
                            </ol>
                        @else
                            <span class="text-muted">Nenhum pet cadastrado</span>
                        @endif
                    </td>
                    
                    <td>
                        <!-- Botões de Ação -->
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-warning btn-sm">Editar</a>

                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

