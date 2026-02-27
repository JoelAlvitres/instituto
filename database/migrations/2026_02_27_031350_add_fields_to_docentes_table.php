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
        Schema::table('docentes', function (Blueprint $table) {
            $table->string('email')->nullable()->after('especialidad');
            $table->string('cv_pdf')->nullable()->after('email');
            $table->foreignId('carrera_id')->nullable()->after('cv_pdf')->constrained('carreras')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('docentes', function (Blueprint $table) {
            $table->dropForeign(['carrera_id']);
            $table->dropColumn(['email', 'cv_pdf', 'carrera_id']);
        });
    }
};
