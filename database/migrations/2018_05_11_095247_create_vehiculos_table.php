<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('formatos')->Schema::create('vehiculos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('marca');
            $table->string('linea');
            $table->string('modelo');
            $table->string('color');
            $table->string('numero_serie');
            $table->string('lugar_fabricacion');
            $table->string('placas');
            $table->string('nombre',200);
            $table->string('numero');
            $table->string('calle');
            $table->string('numeroE');
            $table->string('numeroI');
            $table->string('entidad');
            $table->string('municipio');
            $table->string('localidad');
            $table->string('colonia');
            $table->string('codigo_postal');



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
