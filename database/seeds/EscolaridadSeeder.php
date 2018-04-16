<?php

use Illuminate\Database\Seeder;
use App\Models\CatEscolaridad;

class EscolaridadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_escolaridad')->insert([
            ['id'=>  1,'nombre' => 'SIN INFORMACION'],
            ['id'=>  2,'nombre' => 'NINGUNA'],
            ['id'=>  3,'nombre' => 'PRIMARIA INCOMPLETA'],
            ['id'=>  4,'nombre' => 'PRIMARIA COMPLETA'],
            ['id'=>  5,'nombre' => 'SECUNDARIA INCOMPLETA'],
            ['id'=>  6,'nombre' => 'SECUNDARIA COMPLETA'],
            ['id'=>  7,'nombre' => 'BACHILLERATO INCOMPLETO'],
            ['id'=>  8,'nombre' => 'BACHILLERATO COMPLETO'],
            ['id'=>  9,'nombre' => 'ESTUDIOS TECNICOS INCOMPLETOS'],
            ['id'=> 10,'nombre' => 'ESTUDIOS TECNICOS COMPLETOS'],
            ['id'=> 11,'nombre' => 'LICENCIATURA INCOMPLETA'],
            ['id'=> 12,'nombre' => 'LICENCIATURA COMPLETA'],
            ['id'=> 13,'nombre' => 'POSGRADO INCOMPLETO'],
            ['id'=> 14,'nombre' => 'POSGRADO COMPLETO']
            
        ]);
    }
}
