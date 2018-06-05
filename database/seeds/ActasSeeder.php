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
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
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
            al solicitante tal como lo requiere. - - - - - -
            <p style="text-align:center">Firma del Compareciente:</p>

            <p style="text-align:center">______________________________&nbsp;<br />
            <strong>C.&nbsp;</strong>{{$nombre}}</p>

            <p style="text-align:center">__________________________________________&nbsp;<br />
            <strong>LIC. </strong>{{$fiscal}}</p>

            <p style="text-align:center">Fiscal Sexta Orientadora de la Unidad de Atención Temprana&nbsp;<br />
            Del XI Distrito Judicial en Xalapa, Veracruz</p>

            <p style="text-align:center">&nbsp;</p>

            <p style="text-align:center"><span style="font-size:10px"><strong>AVISO DE PRIVACIDAD SIMPLIFICADO</strong><br />
            <strong>DEL EXPEDIENTE DE ATENCIÓN TEMPRANA</strong></span></p>

            <p style="text-align:justify"><span style="font-size:10px"><strong>La Fiscalía General del Estado de Veracruz</strong>, es la responsable del tratamiento de los datos personales que nos proporcione.&nbsp;<br />
            Los datos personales que recabamos a Usted, los utilizaremos para las siguientes finalidades:&nbsp;<br />
            • Identificar al usuario y conocer su problemática a fin de poder orientar en su caso, respecto a la procedencia del asunto expuesto, iniciando de ser procedente la Carpeta de Investigación correspondiente o por el contrario la canalización del ciudadano a la Unidad Integral de Procuración de Justicia, o alguna otra instancia competente;&nbsp;<br />
            • Para iniciar el expediente de atención temprana,&nbsp;<br />
            • Para la recepción de las denuncias y querellas,&nbsp;<br />
            • Para la emisión de informes.&nbsp;<br />
            De manera adicional, utilizaremos su información personal para la siguiente finalidad que nos permite y facilita brindarle una mejor atención:&nbsp;<br />
            • Generación de informes estadísticos.&nbsp;<br />
            En caso de que no desee que sus datos personales sean tratados para las finalidades adicionales, Usted puede manifestarlo al correo electrónico&nbsp;<a href="http://uat2.oo/actaoficio/direcciondetransparencia@fiscaliaveracruz.gob.mx">direcciondetransparencia@fiscaliaveracruz.gob.mx</a>&nbsp;<br />
            Le informamos que sus datos personales&nbsp;<strong>NO</strong>&nbsp;son compartidos con personas, empresas, organizaciones y autoridades distintas al sujeto obligado, salvo que sean necesarias para atender requerimientos de información de una autoridad competente, debidamente fundados y motivados.&nbsp;<br />
            Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a través de la dirección electrónica:&nbsp;<a href="http://fiscaliaveracruz.gob.mx/">http://fiscaliaveracruz.gob.mx</a></span></p>',  
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1']
        ]);
    }
}
