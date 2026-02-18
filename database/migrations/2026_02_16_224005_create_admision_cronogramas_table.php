<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('admision_cronogramas', function (Blueprint $table) {
            $table->id();
            $table->string('actividad');
            $table->string('fechas'); // texto libre: "5/05 al 10/06"
            $table->boolean('activo')->default(true);
            $table->unsignedInteger('orden')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('admision_cronogramas');
    }
};
