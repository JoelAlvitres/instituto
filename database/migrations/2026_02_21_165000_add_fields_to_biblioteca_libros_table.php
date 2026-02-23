<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('biblioteca_libros', function (Blueprint $table) {
            $table->string('autor')->nullable()->after('titulo');
            $table->string('categoria')->nullable()->after('descripcion');
            $table->integer('paginas')->nullable()->after('categoria');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('biblioteca_libros', function (Blueprint $table) {
            $table->dropColumn(['autor', 'categoria', 'paginas']);
        });
    }
};
