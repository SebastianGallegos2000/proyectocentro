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
        Schema::create('personales', function (Blueprint $table) {
            $table->id('id_Personal');
            $table->unsignedBigInteger('id_Persona_Personal');
            $table->unsignedBigInteger('id_Especialidad_Personal');
            $table->integer('estado_Personal'); 
            $table->timestamps();

            //Dependencias
            $table->foreign('id_Persona_Personal')->references('id_Persona')->on('personas');
            $table->foreign('id_Especialidad_Personal')->references('id_Especialidad')->on('especialidades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personales');
    }
};
