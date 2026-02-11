<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->longText('perfil_profesional')->nullable()->after('descripcion');
            $table->json('campo_laboral')->nullable()->after('perfil_profesional');

            // malla curricular (elige PDF o imagen)
            $table->string('malla_pdf')->nullable()->after('campo_laboral');
            $table->string('malla_imagen')->nullable()->after('malla_pdf');

            // opcional: botón “descargar plan”
            $table->string('plan_estudios_pdf')->nullable()->after('malla_imagen');
        });
    }

    public function down(): void
    {
        Schema::table('carreras', function (Blueprint $table) {
            $table->dropColumn([
                'perfil_profesional',
                'campo_laboral',
                'malla_pdf',
                'malla_imagen',
                'plan_estudios_pdf',
            ]);
        });
    }
};
