<?php

use Illuminate\Database\Seeder;

class ActasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficios')->insert([
            ['nombre'  =>  'actas hechos',  
            'sistema'   =>  'uat', 
            'encabezado'=>'1',  
            'contenido' =>  'En la ciudad de Xalapa, Veracruz, siendo las {{$hora}} horas del día {{$fecha}}
            , ante la presencia de la C. licenciada {{$fiscal}}, Fiscal Sexta Orientadora de la Unidad de Atención Temprana del
            XI Distrito Judicial de Xalapa, Veracruz, se presenta el C. {{$nombre}}, identificándose con {{$identificacion}} CON NÚMERO
            DE FOLIO {{$numIdentificacion}}, EXPEDIDA POR {{$expedido}}, a quien en este momento se le pone en conocimiento de las penas con
            que la ley castiga el declarar con falsedad ante la autoridad, como lo prevé el artículo 333 del Código Penal vigente
            para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad,
            bajo su única y exclusiva responsabilidad por sus generales dijo {{$nombre}}, de {{$edad}} años de edad, nació en fecha
            {{$fechaNacimiento}}, originario de {{$localidad}}, {{$estado}}, con domicilio en la calle {{$calle}} NÚMERO {{$numExterno}}
            , COLONIA {{$colonia}}, C.P. {{$cp}}, en la ciudad de {{$localidad}}, {{$estado}}; ocupación {{$ocupacion}}, estado civil
            {{$estadoCivil}}, grado de escolaridad {{$escolaridad}}, con número de teléfono {{$telefono}}, identificado como corresponde,
            y considerando el motivo de su comparecencia hacer del conocimiento de esta representación social lo siguiente: "{{$narracion}}"
            lo cual, en uso de la voz, y bajo responsabilidad explica lo siguiente:  TODO ESTO LO MANIFIESTO POR EL MAL USO QUE SE
            LE PUDIERE DAR - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Lo aquí manifestado es responsabilidad de
            quien comparece.- en términos de lo dispuesto en los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos,
            2, 3 Fracción XI, 5 y 15 Fracción XII de la ley orgánica de la fiscalía general del estado de Veracruz de Ignacio de la Llave,
            así como 201 y 207 del reglamento de la precitada ley y la Circular 01/2015, emitida por el Fiscal General del Estado esta
            representación social a mi cargo tiene a bien levantar la presente, misma que se firma por duplicado, otorgando un tanto
            al solicitante tal como lo requiere. - - - - - -',  
            'pie' =>  '2',
            'unidad'=>'1']
        ]);
    }
}
