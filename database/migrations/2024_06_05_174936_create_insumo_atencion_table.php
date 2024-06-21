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
        Schema::create('insumo_atencion', function (Blueprint $table) {
            $table->unsignedBigInteger('id_Insumo_Nav');
            $table->unsignedBigInteger('id_Atencion_Nav');
            $table->integer('cantidad');
            $table->timestamps();


            $table->foreign('id_Atencion_Nav')->references('id')->on('atenciones');
            $table->foreign('id_Insumo_Nav')->references('id')->on('insumos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('insumo_atencion');
    }
};
