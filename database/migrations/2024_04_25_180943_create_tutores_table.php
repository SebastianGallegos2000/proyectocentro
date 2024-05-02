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
            $table->id('rut_Tutor');
            $table->integer('dv_Tutor');
            $table->string('password_Tutor');

            $table->string('nombre_Tutor');
            $table->string('apellido_Tutor');
            $table->string('correo_Tutor');
            $table->timestampTz('fechaNac_Tutor');
            $table->string('telefono_Tutor');
            $table->unsignedBigInteger('id_Comuna_Tutor');
            $table->string('fotocopiacarnet_Tutor');
            $table->string('registrosocial_Tutor');
            $table->unsignedBigInteger('id_Rol_Tutor');
            $table->integer('estado_Tutor');
            $table->timestamps();


            $table->foreign('id_Comuna_Tutor')->references('id_Comuna')->on('comunas');
            $table->foreign('id_Rol_Tutor')->references('id_Rol')->on('roles');

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
