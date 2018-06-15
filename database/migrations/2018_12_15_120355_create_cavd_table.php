<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCavdTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cavd', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idCavd')->unsigned();
            $table->integer('idVariablesPersona')->unsigned();
            $table->integer('idCarpeta')->unsigned();
            $table->timestamps();

            $table->foreign('idVariablesPersona')->references('id')->on('variables_persona')->onDelete('cascade');
            $table->foreign('idCavd')->references('id')->on('cat_cavd')->onDelete('cascade');
            $table->foreign('idCarpeta')->references('id')->on('carpeta')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cavd');
    }
}
