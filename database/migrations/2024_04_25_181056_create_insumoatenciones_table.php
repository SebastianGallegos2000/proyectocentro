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
        Schema::create('insumoatenciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Insumo_Atencion_Nav');
            $table->unsignedBigInteger('id_SolicitudCita_Atencion_Nav');
            $table->boolean('estado_Insumo_Atencion_Nav');
            $table->timestamps();


            $table->foreign('id_SolicitudCita_Atencion_Nav')->references('id')->on('solicitudcitas');
            $table->foreign('id_Insumo_Atencion_Nav')->references('id')->on('insumos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumoatenciones');
    }
};
