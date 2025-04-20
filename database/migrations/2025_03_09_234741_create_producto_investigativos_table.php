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
        Schema::create('producto_investigativos', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('resumen');
            // $table->foreignId('grupo_investigacion_id')->constrained('grupo_investigacions');
            // $table->foreignId('user_id')->constrained('users');
            $table->foreignId('sub_tipo_producto_id')->constrained('sub_tipo_productos');
            $table->foreignId('proyecto_investigacion_id')->constrained('proyecto_investigacions');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('producto_investigativos');
    }
};
