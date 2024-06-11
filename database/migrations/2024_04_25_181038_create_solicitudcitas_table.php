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
        Schema::create('solicitudcitas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mascota_id');
            $table->unsignedBigInteger('tipoatencion_id');
            $table->timestamp('fecha_SolicitudCita',precision:0);
            $table->integer('estado_SolicitudCita');

            $table->foreign('mascota_id')->references('id')->on('mascotas');
            $table->foreign('tipoatencion_id')->references('id')->on('tipoatenciones');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('solicitudcitas');
    }
};
