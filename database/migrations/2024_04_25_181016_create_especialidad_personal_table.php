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
        Schema::create('especialidad_personal', function (Blueprint $table) {
            
            $table->unsignedBigInteger('id_Personal_Nav');
            $table->unsignedBigInteger('id_Especialidad_Nav');


            $table->foreign('id_Personal_Nav')->references('id')->on('personales');
            $table->foreign('id_Especialidad_Nav')->references('id')->on('especialidades');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidad_personal');
    }
};
