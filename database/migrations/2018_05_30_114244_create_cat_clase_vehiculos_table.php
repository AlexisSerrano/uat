<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCatClaseVehiculosTable extends Migration
{
    public function up()
    {
        Schema::create('cat_clase_vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 50)->unique();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cat_clase_vehiculo');
    }
}
