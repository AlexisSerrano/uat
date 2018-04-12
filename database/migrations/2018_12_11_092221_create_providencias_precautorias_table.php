<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProvidenciasPrecautoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('providencias_precautorias', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta')->unsigned();
            $table->integer('idProvidencia')->unsigned();
            $table->integer('idEjecutor')->unsigned();
            $table->integer('idPersona')->unsigned();
            $table->Text('observacion');
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->foreign('idCarpeta')->references('id')->on('carpeta');
            $table->foreign('idProvidencia')->references('id')->on('cat_providencia_precautoria');
            $table->foreign('idEjecutor')->references('id')->on('ejecutor');
            $table->foreign('idPersona')->references('id')->on('persona');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('providencias_precautorias');
    }
}
