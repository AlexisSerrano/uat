<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBitacoraNavcasoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bitacora_navcaso', function (Blueprint $table) {
            $table->increments('id');
            $table->tinyInteger('denunciante');
            $table->tinyInteger('denunciado');
            $table->tinyInteger('abogado');
            $table->tinyInteger('autoridad');
            $table->tinyInteger('delitos');
            $table->tinyInteger('acusaciones');
            $table->tinyInteger('defensa');
            $table->tinyInteger('hechos');
            $table->tinyInteger('medidas');
            $table->tinyInteger('vehiculos');
            $table->tinyInteger('terminada');
            $table->integer('idCaso')->unsigned();
            $table->foreign('idCaso')->references('id')->on('carpeta')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bitacora_navcaso');
    }
}
