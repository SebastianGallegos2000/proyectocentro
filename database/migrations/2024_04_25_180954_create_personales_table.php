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
            $table->id('rut_Personal');
            $table->integer('dv_Personal');
            $table->string('password_Personal');
            $table->string('nombre_Personal');
            $table->string('apellido_Personal');
            $table->string('correo_Personal');
            $table->timestampTz('fechaNac_Personal',precision:0);
            $table->string('telefono_Personal');
            $table->integer('id_Especialidad_Personal');
            $table->unsignedBigInteger('id_Rol_Personal');
            $table->boolean('estado_Personal'); 
            $table->timestamps();


            $table->foreign('id_Rol_Personal')->references('id_Rol')->on('roles');

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
