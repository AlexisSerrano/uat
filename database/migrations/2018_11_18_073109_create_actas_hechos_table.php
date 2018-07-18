<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActasHechosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actas_hechos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('folio',100)->unique();
            $table->time('hora');
            $table->date('fecha');
            $table->string('fiscal');
            $table->integer('idUnidad')->unsigned();
            $table->string('tipoActa');
            $table->integer('esEmpresa');
            $table->Text('narracion');
            $table->integer('varPersona');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idUnidad')->references('id')->on('unidad')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('actas_hechos');
    }
}
