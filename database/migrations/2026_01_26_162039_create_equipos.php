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
        Schema::create('equipos', function (Blueprint $table) {
            $table->id();
            $table->string('Nombre');
            $table->integer('Puntos')->nullable();
            $table->integer('Goles_Favor')->nullable();
            $table->integer('Goles_Contra')->nullable();
            $table->decimal('Presupuesto', 15, 2)->nullable();
            $table->string('Entrenador')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipos');
    }
};
