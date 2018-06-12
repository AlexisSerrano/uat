<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOficioDistritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oficio_distritos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('entidad');
            $table->string('localidad');
            $table->string('fecha');
            $table->string('denunciante');
            $table->string('delito');
            $table->string('denunciado');
            $table->string('fiscalCordinador'); 
            $table->string('fiscalDistrito');
            $table->string('unidad');
            $table->string('carpeta');
            $table->string('fiscalAtendio');
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
        Schema::dropIfExists('oficio_distritos');
    }
}
