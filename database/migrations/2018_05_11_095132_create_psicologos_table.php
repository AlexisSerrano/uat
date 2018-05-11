<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePsicologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('formatos')->create('psicologos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('nombre',200);
            $table->string('numero');
            $table->date('fecha');

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
        Schema::dropIfExists('psicologos');
    }
}
