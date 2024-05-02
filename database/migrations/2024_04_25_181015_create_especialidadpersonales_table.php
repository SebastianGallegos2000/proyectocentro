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
        Schema::create('especialidadpersonales', function (Blueprint $table) {
            $table->id('id_EspecialidadPersonal');
            $table->unsignedBigInteger('rut_Personal_Nav');
            $table->unsignedBigInteger('id_Especialidad_Nav');
            $table->integer('estado_Especialidad_Personal_Nav');
            $table->timestamps();


            $table->foreign('rut_Personal_Nav')->references('rut_Personal')->on('personales');
            $table->foreign('id_Especialidad_Nav')->references('id_Especialidad')->on('especialidades');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidadpersonales');
    }
};
