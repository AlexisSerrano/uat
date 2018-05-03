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
            [ 'nombre' => 'SECRETARIA DE SEGURIDAD PUBLICA'],
            [ 'nombre' => 'POLICIA MINISTERIAL'],
            [ 'nombre' => 'POLICIA FEDERAL'],
            [ 'nombre' => 'POLICIA MUNICIPAL'],
            [ 'nombre' => 'SECRETARIA DE MARINA'],
            [ 'nombre' => 'SECRETARIA DE DEFENSA NACIONAL'],
        ]);
    }
}
