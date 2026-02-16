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
        Schema::create('paginas', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->string('titulo')->default('Institucional');

            $table->longText('historia')->nullable();
            $table->longText('mision')->nullable();
            $table->longText('vision')->nullable();

            $table->string('banner')->nullable();

            $table->string('organigrama_pdf')->nullable();
            $table->string('organigrama_imagen')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paginas');
    }
};
