<?php

use Illuminate\Database\Seeder;

class RedireccionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_redirecciones')->insert([
            ['titulo' => 'Bufete Jurídico Asistencia UV','status' => '1'],
            ['titulo' => 'Centro de Atención a Víctimas, Fiscalía General del Estado de Veracruz','status' => '1'],
            ['titulo' => 'Sistema Nacional para el Desarrollo Integral de la Familia','status' => '1'],
            ['titulo' => 'Sistema Estatal para el Desarrollo Integral de la Familia','status' => '1'],
            ['titulo' => 'Defensoría Pública','status' => '1'],
            ['titulo' => 'Dirección de participación ciudadana','status' => '1'],
            ['titulo' => 'Centro estatal de justicia alternativa de veracruz','status' => '1'],
            ['titulo' => 'Fiscalia coordinadora especializada en investigacion de deiltos contra mujeres, niños, niñas, familia y trata de personas','status' => '1'],
            ['titulo' => 'La Comisión Nacional para la Protección y Defensa de los Usuarios de Servicios Financieros','status' => '1'],
            ['titulo' => 'Fiscalía Especializada en Investigación de Delitos Ambientales y Contra los Animales','status' => '1'],
        ]);
    }
}
