<?php

use Illuminate\Database\Seeder;

class EjecutorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ejecutor')->insert([
            [ 'nombre' => 'SSP'],
            [ 'nombre' => 'POLICIA MINISTERIAL'],
            [ 'nombre' => 'POLICIA FEDERAL'],
            [ 'nombre' => 'MARINA'],
            [ 'nombre' => 'EJERCITO'],
        ]);
    }
}
