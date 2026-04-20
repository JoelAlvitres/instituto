<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->string('autor')->nullable()->after('titulo');
            $table->string('editorial')->nullable()->after('autor');
            $table->unsignedSmallInteger('anio')->nullable()->after('editorial');
            $table->string('categoria', 64)->default('Otros')->after('orden');
        });
    }

    public function down(): void
    {
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->dropColumn(['autor', 'editorial', 'anio', 'categoria']);
        });
    }
};
