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
        Schema::create('tipoatenciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_TipoAtencion');
            $table->integer('costo_TipoAtencion');
            $table->integer('estado_TipoAtencion');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipoatenciones');
    }
};
