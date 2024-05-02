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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id('ID_VEHICULO');
            $table->string('MATRICULA', 7);
            $table->enum('TIPO', ['coche', 'furgoneta']);
            $table->string('MARCA', 20);
            $table->string('MODELO', 20);
            $table->unsignedSmallInteger('ANIO');
            $table->string('COLOR', 20);
            $table->unsignedInteger('KM');
            $table->decimal('PRECIO', 8, 2);
            $table->enum('COMBUSTIBLE', ['diesel', 'gasolina', 'electrico']);
            $table->enum('CATEGORIA', ['compacto', 'sedan', 'suv'])->nullable();
            $table->decimal('VOLUMEN_CARGA_M3', 10, 2)->nullable();
            $table->enum('TAMANIO', ['corta', 'mediana', 'larga'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};