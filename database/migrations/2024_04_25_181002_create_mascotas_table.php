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
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tutor_id');
            $table->string('nombre_Mascota');
            $table->unsignedBigInteger('razamascota_id');
            $table->bigInteger('nroChip_Mascota')->nullable();
            $table->float('peso_Mascota',8,4);
            $table->integer('edad_Mascota');
            $table->string('especie_Mascota');
            $table->string('sexo_Mascota');
            $table->integer('estado_Mascota');
            $table->timestamps();


            $table->foreign('tutor_id')->references('id')->on('tutores');
            $table->foreign('razamascota_id')->references('id')->on('razamascotas');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
