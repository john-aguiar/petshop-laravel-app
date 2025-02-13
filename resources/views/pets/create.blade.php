@extends('layouts.app')

@section('title', 'Cadastrar Pet')

@section('content')
    <h2>Cadastrar Pet</h2>

    <form action="{{ route('pets.store') }}" method="POST" class="mt-3">
        @csrf

        <div class="mb-3">
            <label class="form-label">Nome:</label>
            <input type="text" name="nome" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Espécie:</label>
            <input type="text" name="especie" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Raça:</label>
            <input type="text" name="raca" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Idade:</label>
            <input type="number" name="idade" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Dono:</label>
            <select name="cliente_id" class="form-select" required>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Cadastrar</button>
    </form>
@endsection
