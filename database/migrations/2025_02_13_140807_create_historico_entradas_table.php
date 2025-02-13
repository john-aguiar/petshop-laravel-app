<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('historico_entradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_id');
            $table->unsignedBigInteger('cliente_id');
            $table->unsignedBigInteger('servico_id');
            $table->decimal('valor', 8, 2);
            $table->timestamp('entrada');
            $table->timestamp('saida')->nullable();
            $table->timestamps();

            // Chaves estrangeiras
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete('cascade');
            $table->foreign('servico_id')->references('id')->on('servicos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('historico_entradas');
    }
};
