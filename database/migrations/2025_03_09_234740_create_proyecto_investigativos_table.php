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
        Schema::create('proyecto_investigacions', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->foreignId('user_id')->constrained('users');
            $table->string('eje-tematico');
            $table->text('resumen-ejecutivo');
            $table->text('planteamiento-problema');
            $table->text('antecedentes');
            $table->text('justificacion');
            $table->text('objetivos');
            $table->text('metodologia');
            $table->text('resultados');
            $table->text('riesgos');
            $table->text('bibliografia');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('royecto_investigacions');
    }
};
