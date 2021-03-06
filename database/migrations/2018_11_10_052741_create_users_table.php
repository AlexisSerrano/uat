<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('idUnidad')->unsigned()->nullable();
            $table->integer('idZona')->nullable();
            $table->string('grupo')->nullable();
            $table->boolean('grecepcion')->default(0);
            $table->boolean('gorientador')->default(0);
            $table->boolean('gfacilitador')->default(0);
            $table->boolean('gcoordinador')->default(0);
            $table->string('username', 20);
            $table->string('nombreC', 100);
            $table->string('nombres', 100);
            $table->string('apellidos', 100);
            $table->string('email', 100)->unique();
            $table->string('password', 100);
            $table->integer('idCarpeta')->unsigned()->nullable();
            $table->integer('idPreregistro')->unsigned()->nullable();
            $table->string('session_id')->nullable();
            $table->string('puesto');
            $table->string('numFiscal');
            $table->string('numFiscalLetras');
            // $table->integer('numFiscal');
            //$table->enum('nivel', ['1', '2', '3', '4', '5'])->default('1');

            $table->foreign('idUnidad')->references('id')->on('unidad')->onDelete('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
