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
            $table->id();
            $table->unsignedBigInteger('persona_id');
            $table->unsignedBigInteger('comuna_id');
            $table->string('fotocopiacarnet_Tutor');
            $table->string('registrosocial_Tutor');
            $table->integer('estado_Tutor');
            $table->rememberToken();
            $table->timestamps();

            //Dependencias
            $table->foreign('persona_id')->references('id')->on('personas');
            $table->foreign('comuna_id')->references('id')->on('comunas');
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
