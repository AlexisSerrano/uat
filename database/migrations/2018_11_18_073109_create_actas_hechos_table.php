<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActasHechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas_hechos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio')->unique();
            $table->time('hora');
            $table->date('fecha');
            $table->string('fiscal');
            $table->string('nombre');
            $table->string('primer_ap');
            $table->string('segundo_ap');
            $table->string('identificacion');
            $table->string('num_identificacion');
            $table->string('expedido');
            $table->date('fecha_nac');
            $table->integer('idDomicilio')->unsigned()->default(1);
            $table->integer('idOcupacion')->unsigned();
            $table->integer('idEstadoCivil')->unsigned();
            $table->integer('idEscolaridad')->unsigned();
            $table->string('telefono');
            $table->string('tipoActa');
            $table->Text('narracion');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idDomicilio')->references('id')->on('domicilio')->onDelete('cascade');
            $table->foreign('idEscolaridad')->references('id')->on('cat_escolaridad')->onDelete('cascade');
            $table->foreign('idOcupacion')->references('id')->on('cat_ocupacion')->onDelete('cascade');
            $table->foreign('idEstadoCivil')->references('id')->on('cat_estado_civil')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actas_hechos');
    }
}
