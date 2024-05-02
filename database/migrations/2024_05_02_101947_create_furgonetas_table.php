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
        Schema::create('furgonetas', function (Blueprint $table) {
            $table->id('ID_VEHICULO');
            $table->string('MATRICULA', 7);
            $table->enum('TIPO', ['furgoneta']);
            $table->string('MARCA', 20);
            $table->string('MODELO', 20);
            $table->unsignedSmallInteger('ANIO');
            $table->string('COLOR', 20);
            $table->unsignedInteger('KM');
            $table->decimal('PRECIO', 8, 2);
            $table->enum('COMBUSTIBLE', ['diesel', 'gasolina', 'electrico']);
            $table->decimal('VOLUMEN_CARGA_M3', 10, 2);
            $table->enum('TAMANIO', ['corta', 'mediana', 'larga']);
            $table->timestamps();

            // Foreign key
            $table->foreign('ID_VEHICULO')->references('ID_VEHICULO')->on('vehiculos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('furgonetas');
    }
};
