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
            $table->id();
            $table->string('password_Usuario');
            $table->integer('estado_Usuario');
            $table->unsignedBigInteger('rol_id');
            $table->rememberToken();
            $table->timestamps();

            //Dependencias
            $table->foreign('rol_id')->references('id')->on('rols');

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
