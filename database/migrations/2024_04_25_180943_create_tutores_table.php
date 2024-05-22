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
        Schema::create('tutores', function (Blueprint $table) {
            $table->id('id_Tutor');
            $table->unsignedBigInteger('id_Persona_Tutor');
            $table->string('fotocopiacarnet_Tutor');
            $table->string('registrosocial_Tutor');
            $table->unsignedBigInteger('id_Comuna_Tutor');
            $table->integer('estado_Tutor');
            $table->rememberToken();
            $table->timestamps();

            //Dependencias
            $table->foreign('id_Persona_Tutor')->references('id_Persona')->on('personas');
            $table->foreign('id_Comuna_Tutor')->references('id_Comuna')->on('comunas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tutores');
    }
};
