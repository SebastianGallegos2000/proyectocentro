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
        Schema::create('modificacioninsumos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('personal_id');
            $table->unsignedBigInteger('insumo_id');
            $table->timestamp('fechayhora_ModificacionInsumo',precision:0);
            $table->string('cantidad_ModificacionInsumo');
            $table->integer('estado_ModificacionInsumo');
            $table->timestamps();

            $table->foreign('personal_id')->references('id')->on('personales');
            $table->foreign('insumo_id')->references('id')->on('insumos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modificacioninsumos');
    }
};
