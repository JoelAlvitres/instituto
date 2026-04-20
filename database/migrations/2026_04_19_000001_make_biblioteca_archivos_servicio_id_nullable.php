<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->dropForeign(['servicio_id']);
        });

        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->unsignedBigInteger('servicio_id')->nullable()->change();
        });

        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->foreign('servicio_id')
                ->references('id')
                ->on('servicios')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->dropForeign(['servicio_id']);
        });

        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->unsignedBigInteger('servicio_id')->nullable(false)->change();
        });

        Schema::table('biblioteca_archivos', function (Blueprint $table) {
            $table->foreign('servicio_id')
                ->references('id')
                ->on('servicios')
                ->cascadeOnDelete();
        });
    }
};
