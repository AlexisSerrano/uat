<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCarpetasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carpeta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUnidad')->unsigned()->nullable();
            $table->integer('idFiscal')->unsigned()->nullable();
            $table->string('numCarpeta')->nullable();
            $table->date('fechaInicio');
            $table->boolean('esRelevante')->default(false);
            $table->integer('idEstadoCarpeta')->unsigned()->nullable(); // $table->string('estadoCarpeta',50)->default("INICIO");
            $table->time('horaIntervencion')->nullable();
            $table->string('descripcionHechos',5000)->default("SIN OBSERVACIONES");
            $table->string('fiscalAtendio',200);
            $table->integer('idTipoDeterminacion')->unsigned()->default(5);//->nullable();// en vez del nullable
            $table->date('fechaDeterminacion')->nullable();
            $table->string('observacionesEstatus',5000)->default("SIN OBSERVACIONES");
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('idUnidad')->references('id')->on('unidad')->onDelete('cascade');
            $table->foreign('idFiscal')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('idTipoDeterminacion')->references('id')->on('cat_tipo_determinacion')->onDelete('cascade');
            $table->foreign('idEstadoCarpeta')->references('id')->on('cat_estatus_casos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carpeta');
    }
}
