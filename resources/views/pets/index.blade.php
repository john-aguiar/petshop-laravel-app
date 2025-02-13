@extends('layouts.app')

@section('title', 'Lista de Pets')

@section('content')
   <div class="container">
    <h1 class="mt-5">Lista de Pets</h1>
        <a href="{{ route('pets.create') }}" class="btn btn-primary mb-3">Cadastrar Novo Pet</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success mt-3">{{ session('success') }}</div>
    @endif


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Espécie</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Idade</th>
                    <th scope="col">Dono</th>
                    <th scope="col" >Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                    <tr>
                        <td>{{ $pet->nome }}</td>
                        <td>{{ $pet->especie }}</td>
                        <td>{{ $pet->raca }}</td>
                        <td>{{ $pet->idade }}</td>
                        <td>{{ $pet->cliente->nome }}</td>
                        <td>
                            <a href="{{ route('pets.edit', $pet->id) }}" class="btn btn-sm btn-warning">Editar</a>
                            <form action="{{ route('pets.destroy', $pet->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
    </div>
@endsection
