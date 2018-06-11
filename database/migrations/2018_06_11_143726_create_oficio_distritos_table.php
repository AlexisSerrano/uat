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
            $table->string('entidad',200)
            $table->string('localidad',200)
            $table->string('fecha',200)
            $table->string('denunciante',200)
            $table->string('delito',200)
            $table->string('denunciado',200)
            $table->string('fiscalCordinador',200)
            $table->string('fiscalDistrito',200)
            $table->string('unidad')
            $table->string('carpeta',200)
            $table->string('fiscalAtendio',200)
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
