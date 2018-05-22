<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *Schema::create('cat_estado_civil', function (Blueprint $table)
     * @return void
     */
    public function up()
    {
        
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('marca',200);
            $table->string('linea');
            $table->string('modelo');
            $table->string('color');
            $table->string('numero_serie');
            $table->string('lugar_fabricacion');
            $table->string('placas');
            $table->string('nombre',200);
            $table->string('primerAp',200);
            $table->string('segundoAp',200);
            $table->string('numero');
            $table->string('calle');
            $table->integer('num_ext');
            $table->integer('num_int');

            $table->integer('idEstado')->unsigned();
            $table->integer('idMunicipio')->unsigned()->default(2493);
            $table->integer('idLocalidad')->unsigned()->nullable();//default(27592);
            $table->integer('idColonia')->unsigned()->nullable();//default(8982);
            $table->string('cp'); 
            $table->date('fecha');

            $table->foreign('idEstado')->references('id')->on('cat_estado')->onDelete('cascade');
            $table->foreign('idMunicipio')->references('id')->on('cat_municipio')->onDelete('cascade');
            $table->foreign('idLocalidad')->references('id')->on('cat_localidad')->onDelete('cascade');
            $table->foreign('idColonia')->references('id')->on('cat_colonia')->onDelete('cascade');

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
        Schema::dropIfExists('vehiculos');
    }
}
