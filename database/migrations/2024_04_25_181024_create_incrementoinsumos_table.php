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
        Schema::create('incrementoinsumos', function (Blueprint $table) {
            $table->unsignedBigInteger('rut_Personal_IncrementoInventario');
            $table->unsignedBigInteger('id_Insumo_IncrementoInventario');
            $table->timestamp('fechayhora_IncrementoInventario',precision:0);
            $table->string('cantidad_IncrementoInventario');
            $table->integer('estado_IncrementoInventario');

            $table->foreign('rut_Personal_IncrementoInventario')->references('rut_Personal')->on('personales');
            $table->foreign('id_Insumo_IncrementoInventario')->references('id_Insumo')->on('insumos');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('incrementoinsumos');
    }
};
