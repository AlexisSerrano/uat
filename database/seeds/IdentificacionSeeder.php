<?php

use Illuminate\Database\Seeder;

class IdentificacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_identificacion')->insert([
            ['id' => 1,'documento' => 'CREDENCIAL PARA VOTAR'],
            ['id' => 2,'documento' => 'PASAPORTE'],
            ['id' => 3,'documento' => 'CEDULA PROFESIONAL'],
            ['id' => 4,'documento' => 'CARTILLA DEL SERVICIO MILITAR NACIONAL'],
            ['id' => 5,'documento' => 'TARJETA UNICA DE IDENTIDAD MILITAR'],
            ['id' => 6,'documento' => 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES'],
            ['id' => 7,'documento' => 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL'],
            ['id' => 8,'documento' => 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR'],
            ['id' => 9,'documento' => 'LICENCIA DE CONDUCIR'],
            ['id' => 10,'documento' => 'CERTIFICADO DE MATRICULA CONSULAR'],
            ['id' => 11,'documento' => 'ACTA DE NACIMIENTO'],
            ['id' => 12,'documento' => 'CURP'],
            ['id' => 13,'documento' => 'CONSTANCIA DE RESIDENCIA'],
            ['id' => 14,'documento' => 'NO PRESENTO'],
            ['id' => 15,'documento' => 'CREDENCIAL DE TRABAJO'],




            ]);
    }
}
