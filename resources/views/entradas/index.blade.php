@extends('layouts.app')

@section('content')

<!-- Conteúdo Principal -->
<div class="container mt-5">
    <h2 class="text-center mb-4">Controle de Entradas</h2>

    <!-- Formulário de Nova Entrada -->
    <div class="card shadow-lg mb-4">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Nova Entrada</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('entradas.store') }}" method="POST">
                @csrf
                <div class="row g-3">
                    <!-- Seleção de Cliente -->
                    <div class="col-md-6">
                        <label class="form-label">Cliente</label>
                        <select name="cliente_id" id="cliente" class="form-select" required>
                            <option value="">Selecione um cliente</option>
                            @foreach($clientes as $cliente)
                                <option value="{{ $cliente->id }}">{{ $cliente->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Seleção de Pet (inicialmente desativado) -->
                    <div class="col-md-6">
                        <label class="form-label">Pet</label>
                        <select name="pet_id" id="pet" class="form-select" required disabled>
                            <option value="">Selecione um cliente primeiro</option>
                        </select>
                    </div>

                    <!-- Serviço -->
                    <div class="col-md-6">
                        <label class="form-label">Serviço</label>
                        <select name="servico_id" id="servico" class="form-select" required>
                            <option value="">Selecione</option>
                            @foreach($servicos as $servico)
                                <option value="{{ $servico->id }}" data-preco="{{ $servico->preco }}">
                                    {{ $servico->nome }} - R$ {{ number_format($servico->preco, 2, ',', '.') }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <!-- Valor do Serviço -->
                    <div class="col-md-6">
                        <label class="form-label">Valor</label>
                        <input type="text" id="valor" name="valor" class="form-control bg-light" readonly required>
                    </div>
                </div>
                <button type="submit" class="btn btn-success w-100 mt-3">Cadastrar Entrada</button>
            </form>
        </div>
    </div>

    <!-- Lista de Entradas Ativas -->
    <div class="card shadow-lg">
        <div class="card-header bg-secondary text-white">
            <h4 class="mb-0">Pets no Pet Shop</h4>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th>Pet</th>
                            <th>Cliente</th>
                            <th>Serviço</th>
                            <th>Valor</th>
                            <th>Entrada</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($entradas as $entrada)
                        <tr>
                            <td>{{ $entrada->pet->nome }}</td>
                            <td>{{ $entrada->cliente->nome }}</td>
                            <td>{{ $entrada->servico->nome }}</td>
                            <td>R$ {{ number_format($entrada->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($entrada->entrada)->format('d/m/Y H:i') }}</td>
                            <td>
        
                                <form action="{{ route('entradas.finalizar', $entrada->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')  <!-- Laravel precisa disso para simular um PUT -->
                                    <button type="submit" class="btn btn-danger">Finalizar</button>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Script para Atualizar Valor do Serviço e Filtrar Pets -->
<script>
    document.getElementById("servico").addEventListener("change", function() {
        let selectedOption = this.options[this.selectedIndex];
        let preco = selectedOption.getAttribute("data-preco") || "0.00";
        document.getElementById("valor").value = parseFloat(preco).toFixed(2);
    });

    // Relacionamento Cliente -> Pets
    //   pets = JSON.parse(pets); // Converte de string para objeto JSON
    let petsData = @json($pets); // Pegamos os pets já cadastrados


    let petSelect = document.getElementById("pet");
    let clienteSelect = document.getElementById("cliente");

    clienteSelect.addEventListener("change", function () {
        let clienteId = this.value;

        // Resetar opções
        petSelect.innerHTML = '<option value="">Selecione um pet</option>';
        petSelect.disabled = true;

        if (clienteId) {
            let filteredPets = petsData.filter(pet => pet.cliente_id == clienteId);

            if (filteredPets.length > 0) {
                filteredPets.forEach(pet => {
                    let option = document.createElement("option");
                    option.value = pet.id;
                    option.textContent = pet.nome;
                    petSelect.appendChild(option);
                });

                petSelect.disabled = false;
            }
        }
    });
</script>

@endsection
