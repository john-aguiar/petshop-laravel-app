@extends('layouts.app')

@section('title', 'Página Inicial')

@section('content')
    <div class="container-fluid">

            <main class="col-md-9 ms-sm-auto col-lg-10 px-4">
                <div class="pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Cadastro realizado com sucesso</h1>
                </div>
                <p>Faça o login para acessar as funcionalidades  <a href="{{ route('login') }}">Login</a></p>
            </main>
        </div>
    </div>
@endsection
