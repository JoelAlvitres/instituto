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
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->foreignId('carrera_id')->nullable()->constrained('carreras')->nullOnDelete();
        });

        Schema::table('biblioteca_libros', function (Blueprint $table) {
            $table->foreignId('carrera_id')->nullable()->constrained('carreras')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->dropForeign(['carrera_id']);
            $table->dropColumn('carrera_id');
        });

        Schema::table('biblioteca_libros', function (Blueprint $table) {
            $table->dropForeign(['carrera_id']);
            $table->dropColumn('carrera_id');
        });
    }
};
