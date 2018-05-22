<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerMensajesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('per_mensajes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('nombre',200);
            $table->string('primerAp',200);
            $table->string('segundoAp',200);
            $table->string('marca');
            $table->string('imei');
            $table->string('compania');
            $table->string('telefono',15);
            $table->string('telefono_destino',15);
            $table->string('narracion',300);
            // $table->foreign('idCarpeta')->references('id')->on('carpeta')->onDelete('cascade');
            // $table->foreign('idPersona')->references('id')->on('persona');
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
        Schema::dropIfExists('per_mensajes');
    }
}
