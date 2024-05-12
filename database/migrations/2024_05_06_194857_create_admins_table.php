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
        Schema::create('admins', function (Blueprint $table) {
            $table->id('rut_Admin');
            $table->integer('dv_Admin');
            $table->string('password_Admin');

            $table->string('nombre_Admin');
            $table->string('apellido_Admin');
            $table->string('correo_Admin');
            $table->string('telefono_Admin');
            $table->unsignedBigInteger('id_Rol_Admin');
            $table->integer('estado_Admin');
            $table->timestamps();

            $table->foreign('id_Rol_Admin')->references('id_Rol')->on('rols');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
