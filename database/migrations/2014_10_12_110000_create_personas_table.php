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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->integer('rut_Persona');
            $table->string('dv_Persona');
            $table->string('nombre_Persona');
            $table->string('apellido_Persona');
            $table->string('correo_Persona');
            $table->timestampTz('fechaNac_Persona'); 
            $table->string('telefono_Persona');
            $table->integer('estado_Persona');
            $table->timestamps();

            //Dependencias
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
