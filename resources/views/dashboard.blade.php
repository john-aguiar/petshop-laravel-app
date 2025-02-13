@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
            <div class="py-4">
                <h1 class="text-dark fw-bold">Dashboard</h1>
                <p class="text-muted">Resumo geral do petshop</p>
            </div>

            <div class="row">
                <!-- Card Clientes -->
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary fw-bold">Clientes</h5>
                            <p class="card-text fs-3 fw-bold text-dark">{{ $totalClientes }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Pets -->
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-danger fw-bold">Pets</h5>
                            <p class="card-text fs-3 fw-bold text-dark">{{ $totalPets }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Serviços -->
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning fw-bold">Serviços</h5>
                            <p class="card-text fs-3 fw-bold text-dark">{{ $totalServicos }}</p>
                        </div>
                    </div>
                </div>

                <!-- Card Despesas -->
                <div class="col-md-3">
                    <div class="card bg-light shadow-sm">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success fw-bold">Faturamento</h5>
                            <p class="card-text fs-3 fw-bold text-dark">R$ {{ number_format($totalDespesas, 2, ',', '.') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            
        </main>
    </div>
</div>
@endsection
