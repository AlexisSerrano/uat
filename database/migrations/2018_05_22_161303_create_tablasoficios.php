<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTablasoficios extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->longText('encabezado');
            $table->longText('contenido');
            $table->longText('pie');
            $table->integer('unidad');
            $table->timestamps();
        });
        
        Schema::create('oficios_hechos', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('html');
            $table->string('token');
            $table->string('fiscal');
            $table->integer('idOficio')->unsigned();
            $table->integer('idTabla');
            $table->timestamps();
            $table->foreign('idOficio')->references('id')->on('oficios')->onDelete('restrict');            
        });
        
        Schema::create('intentos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fiscal');
            $table->integer('idOficio')->unsigned();
            $table->integer('idTabla');
            $table->longText('html');
            $table->timestamps();

            $table->foreign('idOficio')->references('id')->on('oficios')->onDelete('restrict');            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('oficios');
        Schema::dropIfExists('oficios_hechos');
        Schema::dropIfExists('intentos');
    }
}
