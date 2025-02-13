<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\ServicoController;
use App\Http\Controllers\EntradaController;
use App\Http\Controllers\HistoricoServicoController;
use App\Http\Controllers\DespesaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AgendamentoController;

// Rotas para os recursos (clientes, pets, serviços, etc.)


// O middleware vai ser usado para garantir que somente possa ser acessado
// essas rotas caso já esteja logado.
Route::middleware('auth')->group(function () {
    Route::resource('clientes', ClienteController::class);
    Route::resource('pets', PetController::class);
    Route::resource('servicos', ServicoController::class);
    Route::resource('entradas', EntradaController::class);
    Route::resource('historico-servicos', HistoricoServicoController::class);
    Route::resource('despesas', DespesaController::class);
    Route::resource('agendamentos', AgendamentoController::class);
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

Route::get('/inicial', function () {
    return view('inicial');
})->name('inicial');

