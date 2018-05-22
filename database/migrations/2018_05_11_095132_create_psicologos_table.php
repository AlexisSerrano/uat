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
        Schema::create('psicologos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('nombre',200);
            $table->string('primerAp',200);
            $table->string('segundoAp',200);
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
        Schema::connection('formatos')->dropIfExists('psicologos');
    }
}
