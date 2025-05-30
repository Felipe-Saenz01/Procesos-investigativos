<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('proyecto_investigacions', function (Blueprint $table) {
            $table->json('actividades')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('proyecto_investigacions', function (Blueprint $table) {
            $table->dropColumn('actividades');
        });
    }
}; 