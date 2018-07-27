<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNarracionesPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('narraciones_persona', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idVariablesPersona')->unsigned();
            $table->Text('narracion');
            $table->tinyInteger('tipo');
            // $table->foreign('idVariablesPersona')->references('id')->on('variables_persona')->onDelete('cascade');
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
        Schema::dropIfExists('narraciones_persona');
    }
}
