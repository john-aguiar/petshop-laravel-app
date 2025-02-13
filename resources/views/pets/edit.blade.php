
@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Editar Pet</h1>
        <form action="{{ route('pets.update', $pet->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nome">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome" value="{{ $pet->nome }}" required>
            </div>

            <div class="form-group">
                <label for="especie">Espécie</label>
                <input type="text" class="form-control" id="especie" name="especie" value="{{ $pet->especie }}" required>
            </div>

            <div class="form-group">
                <label for="raca">Raça</label>
                <input type="text" class="form-control" id="raca" name="raca" value="{{ $pet->raca }}">
            </div>

            <div class="form-group">
                <label for="idade">Idade</label>
                <input type="number" class="form-control" id="idade" name="idade" value="{{ $pet->idade }}">
            </div>

            <div class="form-group mb-3">
                <label for="cliente_id">Dono</label>
                <select class="form-control" id="cliente_id" name="cliente_id" required>
                    @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}" {{ $pet->cliente_id == $cliente->id ? 'selected' : '' }}>
                            {{ $cliente->nome }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('pets.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection