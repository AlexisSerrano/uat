<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta')->unsigned();
            $table->integer('idProvidencia')->unsigned();
            $table->integer('idEjecutor')->unsigned();
            $table->integer('idPersona')->unsigned();
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->string('nombre',100);
            $table->string('apellidoP',100);
            $table->string('apellidoM',100);
            $table->string('calle',100);
            $table->string('numero',100);
            $table->string('colonia',100);
            $table->string('cp',100);
            $table->string('ciudad',100);
            $table->string('estado',100);
            $table->integer('celular');
            $table->string('opcion',100);
            $table->string('delito',100);
            $table->foreign('idCarpeta')->references('id')->on('carpeta')->onDelete('cascade');
            $table->foreign('idProvidencia')->references('id')->on('cat_providencia_precautoria');
            $table->foreign('idEjecutor')->references('id')->on('ejecutor');
            $table->foreign('idPersona')->references('id')->on('persona');
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
        Schema::dropIfExists('medidas');
    }
}
