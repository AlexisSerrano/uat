<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePerPsicologosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('per_psicologos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCarpeta');
            $table->string('nombre',200);
            $table->string('primerAp',200);
            $table->string('segundoAp',200);
            $table->string('numero');
            $table->string('delito',100);

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
        Schema::dropIfExists('per_psicologos');
   
    }
}
