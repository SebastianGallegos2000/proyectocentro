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
        Schema::create('users', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Persona_Usuario');
            $table->string('password_Usuario');
            $table->integer('estado_Usuario');
            $table->unsignedBigInteger('id_Rol_Usuario');
            $table->rememberToken();
            $table->timestamps();

            //Dependencias
            $table->foreign('id_Persona_Usuario')->references('id_Persona')->on('personas');
            $table->foreign('id_Rol_Usuario')->references('id_Rol')->on('rols');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
