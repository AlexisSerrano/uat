<?php

use Illuminate\Database\Seeder;

class EstatusCasoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('cat_estatus_casos')->insert([
            [ 'id' => 1, 'nombreEstatus' => 'INICIO'],
            [ 'id' => 2, 'nombreEstatus' => 'DETERMINADO'],
            [ 'id' => 3, 'nombreEstatus' => 'TURNADO A UIPJ'],
            [ 'id' => 4, 'nombreEstatus' => 'ARCHIVO']   
        ]);
    }
}
