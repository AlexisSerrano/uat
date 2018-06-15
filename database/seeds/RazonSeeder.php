<?php

use Illuminate\Database\Seeder;

class RazonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('razones')->insert([
            ['id'  =>  2,  'nombre'   =>  'ORIENTACION/ASESORIA',  'status' =>  0],
            ['id'  =>  4,  'nombre'   =>  'SOLICITUD DE CONSTANCIA DE EXTRAVIO',  'status' =>  0],
        ]);
    }
}
