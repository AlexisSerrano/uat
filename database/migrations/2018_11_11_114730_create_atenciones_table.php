<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtencionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('atenciones', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idRedireccion')->unsigned();
            $table->integer('idUsuario')->unsigned();
            $table->integer('idZona')->unsigned();
            $table->integer('idUnidad')->unsigned();
            $table->string('nombres',40);
            $table->string('primerAp',30);
            $table->string('segundoAp',30)->nullable();
            $table->string('telefono',20);
            $table->foreign('idRedireccion')->references('id')->on('cat_redirecciones');
            $table->foreign('idUsuario')->references('id')->on('users');
            $table->foreign('idUnidad')->references('id')->on('unidad');
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
        Schema::dropIfExists('atenciones');
    }
}
