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
            'unidad'=>'1'],

            ['nombre'  =>  'ACUERDO DE INICIO',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
            'contenido' =>  '<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">ACUERDO.- EN LA CIUDAD DE {{$</span></span></strong></span></span>localidad}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, {{$</span></span></strong></span></span>entidad}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, SIENDO LOS {{$</span></span></strong></span></span>fecha}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">.- - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - - - - - - - - &nbsp;VISTO:</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"> Que se encuentra presente la </span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">ciudadano {{$</span></span></span></span>nombreDenunciante}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">&nbsp;{{$</span></span></span></span>primerApDenunciante}} {{$segundoApDenunciante}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, </span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">quien pone en conocimiento de esta autoridad hechos constitutivos del delito de {{$</span></span></span></span>delito}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">,<strong> </strong>en contra de {{$</span></span></span></span>nombreDenunciado}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, por lo que con fundamento en lo dispuesto por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos; 54 de la Constitución Política Local;&nbsp; 1°,16, 108, 109, 110, 113, 115, 127, 128, 131, 132,&nbsp; 211, 212, 213, 214, 215, 216, 217, 221 y demás relativos y aplicables del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial; 5 párrafo primero, 6 fracción I y IV, 7 fracción III, IV, V y VI de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; </span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">34 Apartado A fracción I, Apartado B fracción I y Apartado C fracciones I: II; III y IV </span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">del Reglamento de la citada Ley, por lo que se: - - - <strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - A C U E R D A - - - - - - - - -&nbsp; - - - - - - - - - - - - - - - - - - &nbsp;&nbsp;&nbsp;PRIMERO.-</strong> Dese inicio a la carpeta de investigación&nbsp; que se impone, debiéndose registrar bajo el número que le corresponde en el libro de Gobierno que tiene la Unidad de Atención Temprana Número 1 del Distrito Decimo Primero, debiendo dar aviso de su inicio a la superioridad.- - - - - - - <strong>SEGUNDO.-</strong> Entrevístese al Denunciante y/o querellante en relación a los hechos que pone en conocimiento de esta Autoridad, lo anterior con el claro objetivo de investigar la veracidad de dicha denuncia y/o querella, debiéndosele notificar al denunciante los derechos que en su favor consagra el articulo 20 apartado C, de la Constitución General de la Republica en relación con el artículo 109 del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial, debiendo dejar constancia de la misma. - - - - - - - - - - - - - - - -- - - - - - - - - -- - - - - - - -&nbsp; <strong>TERCERO.-</strong>Practíquense todas aquellas diligencias urgentes e inaplazables para el esclarecimiento de los hechos, así como de las situaciones relevantes para la aplicación de la ley penal, de los autores y partícipes, así como de las circunstancias que sirvan para verificar en su oportunidad el grado de responsabilidad de los mismos, lo anterior en estricto cumplimiento a lo señalado por la ley bajo las premisas de la carga de la prueba y de presunción de inocencia, con el objeto de que esta Fiscalía reúna datos de prueba indiciaria para el esclarecimiento de los hechos que se denuncian, y en su caso, para sustentar el ejercicio o no de la acción penal que podría llegar a ejercitarse. - - - -- - - - - - - - - -- - - - - - - - - -- - - - - - - - - - - - - - - - - - - - <strong>CUARTO.-</strong> Hágasele saber al denunciante el número de Carpeta de Investigación Ministerial que le corresponde y realícense las diligencias necesarias de conformidad con el artículo </span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">201 fracción II y IV 207 Fracción I</span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"> del Reglamento de la Ley Orgánica de la Fiscalía General del Estado.- CÚMPLASE.- - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - -&nbsp; </span></span></span></span></p>

            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">LIC. {{$</span></span></strong></span></span>fiscal}}</p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">FISCAL SEXTA ORIENTADORA</span></span></strong></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">EN LA UNIDAD DE ATENCIÓN TEMPRANA</span></span></strong></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">CONSTANCIA.- En la misma fecha la presente Carpeta de Investigación queda registrada bajo el número {{$</span></span></span></span>carpeta}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - &nbsp;</span></span></span></span></p>',  
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
