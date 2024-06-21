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
        Schema::create('atenciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('solicitudcita_id');
            $table->unsignedBigInteger('personal_id');
            $table->text('observacion_Atencion');
            $table->integer('peso_Atencion');
            $table->boolean('estado_Atencion');
            $table->timestamps();


            $table->foreign('solicitudcita_id')->references('id')->on('solicitudcitas');
            $table->foreign('personal_id')->references('id')->on('personales');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('atenciones');
    }
};
