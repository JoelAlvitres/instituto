<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');                 // Biblioteca Digital
            $table->string('slug')->unique();         // biblioteca, bolsa-trabajo, bienestar
            $table->text('resumen')->nullable();       // texto corto que sale en la tarjeta
            $table->longText('contenido')->nullable(); // contenido página
            $table->string('imagen')->nullable();      // imagen principal
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
