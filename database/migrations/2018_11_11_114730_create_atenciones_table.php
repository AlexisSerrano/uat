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
            $table->string('nombre',100);
            $table->string('zona',10);
            $table->string('unidad',10);
            $table->string('usuario',50);
            $table->foreign('idRedireccion')->references('id')->on('cat_redirecciones');
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
