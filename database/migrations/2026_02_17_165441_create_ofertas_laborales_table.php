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
        Schema::create('ofertas_laborales', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->string('empresa')->nullable();
    $table->string('ubicacion')->nullable();
    $table->string('tipo')->nullable();
    $table->date('fecha_cierre')->nullable();
    $table->text('resumen')->nullable();
    $table->longText('descripcion')->nullable();
    $table->string('enlace_postulacion')->nullable();
    $table->boolean('activa')->default(true);
    $table->unsignedInteger('orden')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ofertas_laborales');
    }
};
