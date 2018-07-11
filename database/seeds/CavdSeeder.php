<?php

use Illuminate\Database\Seeder;

class CavdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_cavd')->insert([
            ['id' => 1,'unidad' => 'Centro de Atención a Víctimas
            de la Fiscalía General del Estado
            ','direccion' => 'Circuito Rafael Guizar y Valencia núm. 707 
            Colonia Reserva Territorial Xalapa, Veracruz.
            ', 'estatus' => 1,'nombreDirector' => 'Lic. Zoila Aradillas Guzmán '],

            ]);
    }
}
