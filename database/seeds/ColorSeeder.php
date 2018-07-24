<?php

use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cat_color')->insert([
            ['id'=>  1,'nombre' => 'ROJO CLARO'],
            ['id'=>  2,'nombre' => 'ROJO CLARO METALICO'],
            ['id'=>  3,'nombre' => 'ROJO MEDIO'],
            ['id'=>  4,'nombre' => 'ROJO MEDIO METALICO'],
            ['id'=>  5,'nombre' => 'ROJO OBSCURO'],
            ['id'=>  6,'nombre' => 'ROJO OBSCURO METALICO'],
            ['id'=>  7,'nombre' => 'AZUL CLARO'],
            ['id'=>  8,'nombre' => 'AZUL CLARO METALICO'],
            ['id'=>  9,'nombre' => 'AZUL MEDIO'],
            ['id'=> 10,'nombre' => 'AZUL MEDIO METALICO'],
            ['id'=> 11,'nombre' => 'AZUL OBSCURO'],
            ['id'=> 12,'nombre' => 'AZUL OBSCURO METALICO'],
            ['id'=> 13,'nombre' => 'BEIGE/CREMA CLARO'],
            ['id'=> 14,'nombre' => 'BEIGE/CREMA CLARO METALICO'],
            ['id'=> 15,'nombre' => 'BEIGE/CREMA MEDIO'],
            ['id'=> 16,'nombre' => 'BEIGE/CREMA MEDIO METALICO'],
            ['id'=> 17,'nombre' => 'BEIGE/CREMA OBSCURO'],
            ['id'=> 18,'nombre' => 'BEIGE/CREMA OBSCURO METALICO'],
            ['id'=> 19,'nombre' => 'AMARILLO CLARO'],
            ['id'=> 20,'nombre' => 'AMARILLO CLARO METALICO'],
            ['id'=> 21,'nombre' => 'AMARILLO MEDIO'],
            ['id'=> 22,'nombre' => 'AMARILLO MEDIO METALICO'],
            ['id'=> 23,'nombre' => 'AMARILLO OBSCURO'],
            ['id'=> 24,'nombre' => 'AMARILLO OBSCURO METALICO'],
            ['id'=> 25,'nombre' => 'GRIS CLARO'],
            ['id'=> 26,'nombre' => 'GRIS CLARO METALICO'],
            ['id'=> 27,'nombre' => 'GRIS MEDIO'],
            ['id'=> 28,'nombre' => 'GRIS MEDIO METALICO'],
            ['id'=> 29,'nombre' => 'GRIS OBSCURO'],
            ['id'=> 30,'nombre' => 'GRIS OBSCURO METALICO'],
            ['id'=> 31,'nombre' => 'ROSA CLARO'],
            ['id'=> 32,'nombre' => 'ROSA CLARO METALICO'],
            ['id'=> 33,'nombre' => 'ROSA MEDIO'],
            ['id'=> 34,'nombre' => 'ROSA MEDIO METALICO'],
            ['id'=> 35,'nombre' => 'ROSA OBSCURO'],
            ['id'=> 36,'nombre' => 'ROSA OBSCURO METALICO'],
            ['id'=> 37,'nombre' => 'MORADO CLARO'],
            ['id'=> 38,'nombre' => 'MORADO CLARO METALICO'],
            ['id'=> 39,'nombre' => 'MORADO MEDIO'],
            ['id'=> 40,'nombre' => 'MORADO MEDIO METALICO'],
            ['id'=> 41,'nombre' => 'MORADO OBSCURO'],
            ['id'=> 42,'nombre' => 'MORADO OBSCURO METALICO'],
            ['id'=> 43,'nombre' => 'NARANJA CLARO'],
            ['id'=> 44,'nombre' => 'NARANJA CLARO METALICO'],
            ['id'=> 45,'nombre' => 'NARANJA MEDIO'],
            ['id'=> 46,'nombre' => 'NARANJA MEDIO METALICO'],
            ['id'=> 47,'nombre' => 'NARANJA OBSCURO'],
            ['id'=> 48,'nombre' => 'NARANJA OBSCURO METALICO'],
            ['id'=> 49,'nombre' => 'VERDE CLARO'],
            ['id'=> 50,'nombre' => 'VERDE CLARO METALICO'],
            ['id'=> 51,'nombre' => 'VERDE MEDIO'],
            ['id'=> 52,'nombre' => 'VERDE MEDIO METALICO'],
            ['id'=> 53,'nombre' => 'VERDE OBSCURO'],
            ['id'=> 54,'nombre' => 'VERDE OBSCURO METALICO'],
            ['id'=> 55,'nombre' => 'DORADO CLARO'],
            ['id'=> 56,'nombre' => 'DORADO CLARO METALICO'],
            ['id'=> 57,'nombre' => 'DORADO MEDIO'],
            ['id'=> 58,'nombre' => 'DORADO MEDIO METALICO'],
            ['id'=> 59,'nombre' => 'DORADO OBSCURO'],
            ['id'=> 60,'nombre' => 'DORADO OBSCURO METALICO'],
            ['id'=> 61,'nombre' => 'PLATA CLARO'],
            ['id'=> 62,'nombre' => 'PLATA CLARO METALICO'],
            ['id'=> 63,'nombre' => 'PLATA MEDIO'],
            ['id'=> 64,'nombre' => 'PLATA MEDIO METALICO'],
            ['id'=> 65,'nombre' => 'PLATA OBSCURO'],
            ['id'=> 66,'nombre' => 'PLATA OBSCURO METALICO'],
            ['id'=> 67,'nombre' => 'CAFÉ CLARO'],
            ['id'=> 68,'nombre' => 'CAFÉ CLARO METALICO'],
            ['id'=> 69,'nombre' => 'CAFÉ MEDIO'],
            ['id'=> 70,'nombre' => 'CAFÉ MEDIO METALICO'],
            ['id'=> 71,'nombre' => 'CAFÉ OBSCURO'],
            ['id'=> 72,'nombre' => 'CAFÉ OBSCURO METALICO'],
            ['id'=> 73,'nombre' => 'VINO/GUINDA CLARO'],
            ['id'=> 74,'nombre' => 'VINO/GUINDA CLARO METALICO'],
            ['id'=> 75,'nombre' => 'VINO/GUINDA MEDIO'],
            ['id'=> 76,'nombre' => 'VINO/GUINDA MEDIO METALICO'],
            ['id'=> 77,'nombre' => 'VINO/GUINDA OBSCURO'],
            ['id'=> 78,'nombre' => 'VINO/GUINDA OBSCURO METALICO'],
            ['id'=> 79,'nombre' => 'COBRE CLARO'],
            ['id'=> 80,'nombre' => 'COBRE CLARO METALICO'],
            ['id'=> 81,'nombre' => 'COBRE MEDIO'],
            ['id'=> 82,'nombre' => 'COBRE MEDIO METALICO'],
            ['id'=> 83,'nombre' => 'COBRE OBSCURO'],
            ['id'=> 84,'nombre' => 'COBRE OBSCURO METALICO'],
            ['id'=> 85,'nombre' => 'NEGRO'],
            ['id'=> 86,'nombre' => 'BLANCO'],
            ['id'=> 99,'nombre' => 'SIN INFORMACION']




        ]);
    }
}
