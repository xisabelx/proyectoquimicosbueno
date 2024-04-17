<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->string('id_producto', 10)->primary();
            $table->string('id_cas', 10);
            $table->float('concentracion');
            $table->enum('tipo_concentracion', ['%', 'M']);
            $table->date('caducidad');
            $table->integer('capacidad');
            $table->string('armario', 5);
            $table->string('balda', 5);
            $table->date('fecha_entrada');
            $table->timestamps();

            // Claves foráneas

            $table->foreign('id_cas')->references('id')->on('cas_productos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
