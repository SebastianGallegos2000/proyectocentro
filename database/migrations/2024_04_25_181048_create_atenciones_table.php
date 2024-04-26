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
        Schema::create('atenciones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_SolicitudCita_Atencion');
            $table->unsignedBigInteger('rut_Personal_Atencion');
            $table->string('observacion_Atencion');
            $table->integer('peso_Atencion');
            $table->boolean('estado_Atencion');
            $table->timestamps();


            $table->foreign('id_SolicitudCita_Atencion')->references('id_SolicitudCita')->on('solicitudcitas');
            $table->foreign('rut_Personal_Atencion')->references('rut_Personal')->on('personales');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones');
    }
};
