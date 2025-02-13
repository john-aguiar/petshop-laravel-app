@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Novo Agendamento</h2>
    
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agendamentos.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Cliente</label>
            <select name="cliente_id" id="cliente_id" class="form-control" required>
                <option value="">Selecione um cliente</option>
                @foreach($clientes as $cliente)
                    <option value="{{ $cliente->id }}" data-pets="{{ json_encode($cliente->pets) }}" >
                        {{ $cliente->nome }}
                    </option>
                @endforeach
            </select>
        </div>
        
        <div class="mb-3">
            <label class="form-label">Pet</label>
            <select name="pet_id" id="pet_id" class="form-control" required>
                <option value="">Selecione um pet</option>
            </select>

        </div>

        <div class="mb-3">
            <label class="form-label">Serviços</label>
            <div id="servicosLista">
                @foreach($servicos as $servico)
                    <div class="form-check">
                        <input class="form-check-input servico-checkbox" type="checkbox" name="servico_id[]" value="{{ $servico->id }}" data-valor="{{ $servico->preco }}"  data-descricao="{{ $servico->descricao }}">
                        <label class="form-check-label">
                            {{ $servico->nome }} (R$ {{ number_format($servico->preco, 2, ',', '.') }}) - {{ $servico->descricao }}
                        </label>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label class="form-label">Total</label>
            <input type="number" name="valor" id="valor" class="form-control" required>

         </div>

        <div class="mb-3">
            <label class="form-label">Data</label>
            <input type="date" name="data" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Horário</label>
            <select name="horario" class="form-control" required>
                @php
                    $horaInicio = strtotime('08:00');
                    $horaFim = strtotime('18:00');
                    while ($horaInicio <= $horaFim) {
                        echo "<option value='" . date('H:i', $horaInicio) . "'>" . date('H:i', $horaInicio) . "</option>";
                        $horaInicio = strtotime('+30 minutes', $horaInicio);
                    }
                @endphp
            </select>
            
        </div>

        

        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
document.querySelectorAll('.servico-checkbox').forEach(checkbox => {
    checkbox.addEventListener('change', function() {
        let total = 0;
        document.querySelectorAll('.servico-checkbox:checked').forEach(checkedBox => {
            total += parseFloat(checkedBox.dataset.valor); 
        });

        document.getElementById('valor').value =  parseFloat(total)
        

    });
});

    // Filtra os pets pelo cliente selecionado
    document.getElementById('cliente_id').addEventListener('change', function() {
        let clienteId = this.value;
        let petSelect = document.getElementById('pet_id');
        petSelect.innerHTML = '<option value="">Selecione um pet</option>';
        
        let selectedOption = this.options[this.selectedIndex];
        let pets = selectedOption.dataset.pets ? JSON.parse(selectedOption.dataset.pets) : [];
        
        pets.forEach(pet => {
            let option = document.createElement('option');
            option.value = pet.id;
            option.textContent = pet.nome;
            petSelect.appendChild(option);
        });
    });



</script>
@endsection
