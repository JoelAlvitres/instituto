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
        Schema::create('bienestar_servicios', function (Blueprint $table) {
    $table->id();
    $table->string('titulo');
    $table->text('resumen')->nullable();
    $table->longText('contenido')->nullable();
    $table->string('imagen')->nullable();
    $table->boolean('activo')->default(true);
    $table->unsignedInteger('orden')->default(0);
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bienestar_servicios');
    }
};
