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
        Schema::dropIfExists('rutinaxejercicios');
        Schema::create('rutinaxejercicios', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('rutina_id');
            $table->unsignedBigInteger('ejercicio_id');

            $table->foreign('rutina_id')->references('id')->on('rutina')->onDelete('cascade');
            $table->foreign('ejercicio_id')->references('id')->on('ejercicio')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutinaxejercicios');
    }
};
