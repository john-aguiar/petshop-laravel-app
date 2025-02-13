<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendamentoController;
use App\Http\Controllers\HistoricoEntradaController;

// Rotas para os recursos (clientes, pets, serviços, etc.)


// O middleware vai ser usado para garantir que somente possa ser acessado
// essas rotas caso já esteja logado.
Route::middleware('auth')->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('pets', PetController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('entradas', EntradaController::class);
    Route::resource('historico', HistoricoEntradaController::class);
    Route::resource('despesas', DespesaController::class);
    Route::resource('agendamentos', AgendamentoController::class);


    Route::get('/entradas', [EntradaController::class, 'index'])->name('entradas.index');
    Route::post('/entradas', [EntradaController::class, 'store'])->name('entradas.store');
    // Route::post('/entradas/{id}/finalizar', [EntradaController::class, 'update'])->name('entradas.finalizar');
    Route::get('/historico', [HistoricoEntradaController::class, 'index'])->name('historico.index');



    // AQUI O TESTE
    Route::put('/entradas/{id}/finalizar', [EntradaController::class, 'finalizar'])->name('entradas.finalizar');

    //AQUI O TESTE

    Route::get('/agendamentos/create', [AgendamentoController::class, 'create'])->name('agendamentos.create');

    

});


Route::middleware(['auth'])->get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');




Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
})->name('home');


