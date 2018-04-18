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
            ['id'  =>  1,  'nombre'   =>  'ORIENTACION/ASESORIA',  'status' =>  0],
            ['id'  =>  2,  'nombre'   =>  'PRESENTACION DE DENUNCIA',  'status' =>  0],
            ['id'  =>  3,  'nombre'   =>  'PRESENTACION DE QUERELLA',  'status' =>  0],
            ['id'  =>  4,  'nombre'   =>  'SOLICITUD DE ACTA DE HECHOS',  'status' =>  0],
            
            
        	
        ]);
    }
}
