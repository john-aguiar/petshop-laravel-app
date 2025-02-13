@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Cadastrar Serviço</h1>

    <form action="{{ route('servicos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome do Serviço</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="descricao" class="form-label">Descrição</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>

        <div class="mb-3">
            <label for="preco" class="form-label">Preço</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('servicos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection
