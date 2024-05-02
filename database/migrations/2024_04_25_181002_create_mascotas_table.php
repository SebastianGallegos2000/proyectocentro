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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id('id_Mascota');
            $table->unsignedBigInteger('id_Razamascota_Mascota');
            $table->unsignedBigInteger('rut_Tutor_Mascota');
            $table->string('nombre_Mascota');
            $table->integer('nroChip_Mascota');
            $table->integer('peso_Mascota');
            $table->integer('edad_Mascota');
            $table->string('especie_Mascota');
            $table->string('sexo_Mascota');
            $table->integer('estado_Mascota');
            $table->timestamps();


            $table->foreign('rut_Tutor_Mascota')->references('rut_Tutor')->on('tutores');
            $table->foreign('id_Razamascota_Mascota')->references('id_Razamascota')->on('razamascotas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
