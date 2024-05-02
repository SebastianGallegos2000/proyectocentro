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
        Schema::create('razamascotas', function (Blueprint $table) {
            $table->id('id_Razamascota');
            $table->string('descripción_Razamascota');
            $table->integer('estado_Razamascota');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('razamascotas');
    }
};
