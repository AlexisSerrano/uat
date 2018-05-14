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
            ['titulo' => 'BUFETE JURÍDICO ASISTENCIA UV'],
            ['titulo' => 'CENTRO DE ATENCIÓN A VÍCTIMAS, FISCALÍA GENERAL DEL ESTADO DE VERACRUZ'],
            ['titulo' => 'SISTEMA NACIONAL PARA EL DESARROLLO INTEGRAL DE LA FAMILIA'],
            ['titulo' => 'SISTEMA ESTATAL PARA EL DESARROLLO INTEGRAL DE LA FAMILIA'],
            ['titulo' => 'DEFENSORÍA PÚBLICA'],
            ['titulo' => 'DIRECCIÓN DE PARTICIPACIÓN CIUDADANA'],
            ['titulo' => 'CENTRO ESTATAL DE JUSTICIA ALTERNATIVA DE VERACRUZ'],
            ['titulo' => 'FISCALIA COORDINADORA ESPECIALIZADA EN INVESTIGACION DE DELITOS CONTRA MUJERES, NIÑOS, NIÑAS, FAMILIA Y TRATA DE PERSONAS'],
            ['titulo' => 'COMISIÓN NACIONAL PARA LA PROTECCIÓN Y DEFENSA DE LOS USUARIOS DE SERVICIOS FINANCIEROS'],
            ['titulo' => 'FISCALÍA ESPECIALIZADA EN INVESTIGACIÓN DE DELITOS AMBIENTALES Y CONTRA LOS ANIMALES'],
        ]);
    }
}
