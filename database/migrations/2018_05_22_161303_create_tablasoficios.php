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
        // Schema::create('secciones_oficios', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('etiqueta');
        //     $table->longText('html');
        //     $table->string('sistema');
        //     $table->timestamps();
        // });
        Schema::create('oficios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->longText('encabezado');
            $table->longText('contenido');
            $table->longText('pie');
            $table->integer('unidad');
            $table->timestamps();
        });
        // Schema::create('templates', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->integer('idSeccion')->unsigned();
        //     $table->integer('idOficio')->unsigned();
        //     $table->timestamps();

        //     $table->foreign('idSeccion')->references('id')->on('secciones_oficios')->onDelete('restrict');
        //     $table->foreign('idOficio')->references('id')->on('oficios')->onDelete('cascade');
        // });
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
        //Schema::dropIfExists('secciones_oficios');
        Schema::dropIfExists('oficios');
        //Schema::dropIfExists('templates');
        Schema::dropIfExists('oficios_hechos');
        Schema::dropIfExists('intentos');
    }
}
