<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pet_id')->constrained()->onDelete('cascade'); // Pet relacionado
            $table->foreignId('cliente_id')->constrained()->onDelete('cascade'); // Dono do pet
            $table->foreignId('servico_id')->constrained()->onDelete('cascade'); // Serviço realizado
            $table->decimal('valor', 8, 2); // Valor do serviço
            $table->timestamp('entrada')->default(DB::raw('CURRENT_TIMESTAMP')); // Horário de entrada
            $table->timestamp('saida')->nullable(); // Horário de saída (quando o pet sair)
            $table->timestamps();
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};
