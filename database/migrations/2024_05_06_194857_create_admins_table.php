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
            $table->id('id_Admin');
            $table->unsignedBigInteger('id_Persona_Admin');
            $table->integer('estado_Admin');
            $table->timestamps();

            //Dependencias
            $table->foreign('id_Persona_Admin')->references('id_Persona')->on('personas');

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
