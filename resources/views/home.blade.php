@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <!-- Barra lateral -->
            <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
                <div class="position-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link " href="{{ route('home') }}">
                                <i class="bi bi-house-door"></i>
                                Início
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('clientes.index') }}">
                                <i class="bi bi-person"></i>
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pets.index') }}">
                                <i class="bi bi-pet"></i>
                                Pets
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('despesas.index') }}">
                                <i class="bi bi-wallet"></i>
                                Despesasss
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('servicos.index') }}">
                                <i class="bi bi-gear"></i>
                                Serviços
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('historico-servicos.index') }}">
                                <i class="bi bi-clock-history"></i>
                                Histórico de Serviços
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Conteúdo principal -->
            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Bem-vindo ao sistema Petshop</h1>
                </div>
                <p>Bem-vindo ao painel de administração do petshop! Aqui você pode gerenciar clientes, pets, serviços e muito mais.</p>
            </main>
        </div>
    </div>
@endsection
