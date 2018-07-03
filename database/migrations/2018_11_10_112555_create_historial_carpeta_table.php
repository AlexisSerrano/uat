<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHistorialCarpetaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historial_carpeta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta')->unsigned();
            $table->integer('idEstatusCarpeta')->unsigned();
            $table->integer('idTipoDeterminacion')->unsigned()->default(5);//->nullable();// en vez del nullable
            $table->string('numCarpeta',255);
            $table->string('observacion',5000);
            $table->string('fiscal',255);
            $table->date('fecha');
            $table->timestamps();
            
            $table->foreign('idTipoDeterminacion')->references('id')->on('cat_tipo_determinacion')->onDelete('cascade');
            $table->foreign('idCarpeta')->references('id')->on('carpeta')->onDelete('cascade');
            $table->foreign('idEstatusCarpeta')->references('id')->on('cat_estatus_casos')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historial_carpeta');
    }
}
