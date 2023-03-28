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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('email')->unique;
            $table->string('password');
            $table->string('direccion');
            $table->integer('edad');
            $table->integer('peso');
            $table->integer('altura');
            $table->integer('tipo');
            $table->boolean('is_admin')->default(false);
            $table->boolean('is_coach')->default(false);
            $table->boolean('is_atleta')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
    }
};
