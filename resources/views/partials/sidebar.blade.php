<nav id="sidebar" class="d-flex flex-column flex-shrink-0 p-3 bg-dark text-white" style="width: 250px; height: 100vh; position: fixed; transition: 0.3s;">
    <button class="btn btn-outline-light d-md-none" id="sidebarToggle">
        <i class="bi bi-list"></i>
    </button>
    
    <h4 class="text-center text-orange fw-bold mt-3">Petshop</h4>
    <hr>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('dashboard') }}">
                <i class="bi bi-house-door"></i> Início
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('clientes.index') }}">
                <i class="bi bi-person"></i> Clientes
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('pets.index') }}">
                <i class="bi bi-gitlab"></i> Pets
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('despesas.index') }}">
                <i class="bi bi-wallet"></i> Despesas
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('servicos.index') }}">
                <i class="bi bi-gear"></i> Serviços
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('historico-servicos.index') }}">
                <i class="bi bi-clock-history"></i> Histórico de Serviços
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('agendamentos.index') }}">
                <i class="bi bi-calendary"></i> Agendamentos
            </a>
        </li>
    </ul>
    
    <hr>
    
    <div class="text-center">
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>

        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class=" btn btn-danger w-100">
            <i class="bi bi-box-arrow-right"></i> Sair
        </a>
    </div>
</nav>

