<?php

use Illuminate\Database\Seeder;

class OficiosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('oficios')->insert([

            ['nombre'  =>  'ACTAS HECHOS MORAL',
            'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

            <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
            <strong>"Si lo platicamos, lo solucionamos”</strong></p>', 

            'contenido' => '<p style="text-align:center"><span style="font-size:10.0pt"><span style="font-family:Neo Sans Pro,sans-serif&quot;">ACTA DE HECHOS NÚMERO {{$folio}}</span></span></p>

            <p>En la ciudad de <strong>{{$unidadMunicipio}}, VERACRUZ, </strong>siendo las {{$hora}} horas del día {{$fecha}} , ante la presencia del (la) c. licenciado (a) {{$fiscal}}, {{$puesto}}, Veracruz, se presenta el C. {{$nombre}} en representación de la empresa {{$nombreEmpresa}} con número de teléfono {{$telefono}}, fecha de alta {{$fechaNacimiento}} y&nbsp;domicilio&nbsp;{{$calle}} NÚMERO {{$numExterno}} , COLONIA {{$colonia}}, C.P. {{$cp}}, en la ciudad de {{$localidad}}, {{$estado}};&nbsp;&nbsp;a quien en este momento se le pone en conocimiento de las penas con que la ley castiga el declarar con falsedad ante la autoridad, como lo prevé el artículo 333 del Código Penal vigente para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad, bajo su única y exclusiva responsabilidad por sus generales dijo C.{{$nombre}}, identificándose con {{$identificacion}} EXPEDIDA POR {{$expedido}}&nbsp;número&nbsp;{{$numIdentificacion}}, identificado como corresponde, y considerando el motivo de su comparecencia hacer del conocimiento de esta representación social lo siguiente: <strong>"EL EXTRAVIO Y/O PERDIDA DE {{$perdida}}."</strong> para lo cual&nbsp;en uso de la voz, y bajo responsabilidad explica lo siguiente:<strong>"........................................................<em>narración de hechos</em>.............................................."</strong>&nbsp;<strong>{{$narracion}}</strong>.-&nbsp;en terminos de lo dispuesto en los articulos 21 de la constitución politica de los Estados Unidos Mexicanos, 5, 6 y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 apartado A fracción XIV. 195 y 201 del Reglamento de la precipitada Ley Orgánica, esta representación social a mi cargo tiene a bien levantar la presente misma que se firma por duplicado, otrorgando un tanto al solicitante tal como lo requiere. - - - - - -&nbsp;<strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</strong>- - - - - -&nbsp;<strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</strong>- - - - - -&nbsp;<strong>- - - - - - - - - - - - - - - - - - -</strong><strong>&nbsp;</strong></p>
            
            <p style="text-align:center">Firma del Compareciente:</p>
            
            <p style="text-align:center">______________________________&nbsp;<br />
            <strong>C.&nbsp;</strong>{{$nombre}}</p>
            
            <p style="text-align:center">__________________________________________&nbsp;<br />
            <strong>LIC. </strong>{{$fiscal}}</p>
            
            <p style="text-align:center">{{$puesto}}, <strong>VERACRUZ.</strong></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:10px"><strong>AVISO DE PRIVACIDAD SIMPLIFICADO</strong><br />
            <strong>DEL EXPEDIENTE DE ATENCIÓN TEMPRANA</strong></span></p>
            
            <p style="text-align:justify"><span style="font-size:9px"><strong>La Fiscalía General del Estado de Veracruz</strong>, es la responsable del tratamiento de los datos personales que nos proporcione.&nbsp;<br />
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


            ['nombre'  =>  'actas hechos',
            'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:100px; width:100px" /></p>
            <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br>
            <strong>"Si lo platicamos, lo solucionamos”</strong><br />
            &nbsp;</p>',  
            'contenido' =>  '
            <p style="text-align:center"><span style="font-size:10.0pt"><span style="font-family:Neo Sans Pro,sans-serif&quot;">ACTA DE HECHOS NÚMERO {{$folio}}</span></span></p>

<p>En la ciudad de<strong> {{$unidadMunicipio}}, VERACRUZ,</strong> siendo las <strong>{{$hora}}</strong> horas del día <strong>{{$fecha}}</strong>, ante la presencia del (la) c. licenciado (a)&nbsp;<strong>{{$fiscal}}, {{$puesto}}</strong>, <strong>VERACRUZ</strong>, se presenta el (la)&nbsp;<strong>C.{{$nombre}}</strong>,&nbsp;identificándose con <strong>{{$identificacion}}&nbsp;EXPEDIDA POR {{$expedido}}&nbsp;NÚMERO {{$numIdentificacion}},&nbsp;</strong>a quien en este momento se le pone en conocimiento de las penas con que la ley castiga el declarar con falsedad ante la autoridad,&nbsp;como lo prevé el artículo 333 del Código Penal vigente para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad,&nbsp;bajo su única y exclusiva responsabilidad por sus generales dijo llamarse como se ha quedado escrito, ser&nbsp;de <strong>{{$edad}}</strong> años de edad,&nbsp; nació en fecha <strong>{{$fechaNacimiento}}</strong>, originario y vecino de <strong>{{$municipioOrigen}}, {{$estadoOrigen}},</strong>&nbsp;con domicilio en la calle <strong>{{$calle}}</strong> <strong>NÚMERO {{$numExterno}}, </strong>colonia&nbsp;<strong>{{$colonia}},</strong> C.P.<strong>{{$cp}}</strong>, en el municipio de <strong>{{$municipio}}</strong>,<strong>{{$estado}}</strong>; ocupación <strong>{{$ocupacion}}</strong>,&nbsp;estado civil <strong>{{$estadoCivil}}</strong>, grado de estudios&nbsp;<strong>{{$escolaridad}}</strong>,&nbsp;con número telefónico&nbsp;<strong>{{$telefono}}</strong>, identificado como corresponde, y considerando el motivo de su comparecencia hacer del conocimiento de esta representación social lo siguiente:<strong>"EL EXTRAVÍO Y/O PERDIDA DE {{$perdida}}." </strong>Para lo cual&nbsp;uso de la voz, y bajo su responsabilidad explica lo siguiente:<strong> ..................................................................<em>narración de hechos</em>................................................"{{$narracion}}".-&nbsp;</strong>en terminos de lo dispuesto en los articulos 21 de la constitución politica de los Estados Unidos Mexicanos, 5, 6 y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 apartado A fracción XIV. 195 y 201 del Reglamento de la precipitada Ley Orgánica, esta representación social a mi cargo tiene a bien levantar la presente misma que se firma por duplicado, otrorgando un tanto al solicitante tal como lo requiere. - - - - - -&nbsp;<strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</strong> - - - - - -&nbsp;<strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</strong> - - - - - -&nbsp;<strong>- - - - - - -</strong></p>

<p style="text-align:center">Firma del Compareciente:</p>

<p style="text-align:center">______________________________&nbsp;<br />
<strong>C.{{$nombre}}</strong></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center">__________________________________________&nbsp;<br />
<strong>LIC.{{$fiscal}}</strong></p>

<p style="text-align:center"><strong>{{$puesto}}, VERACRUZ.</strong></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:10px"><strong>AVISO DE PRIVACIDAD SIMPLIFICADO</strong><br />
<strong>DEL EXPEDIENTE DE ATENCIÓN TEMPRANA</strong></span></p>

<p><span style="font-size:9px"><strong>La Fiscalía General del Estado de Veracruz</strong>, es la responsable del tratamiento de los datos personales que nos proporcione.&nbsp;<br />
Los datos personales que recabamos a Usted, los utilizaremos para las siguientes finalidades:&nbsp;<br />
• Identificar al usuario y conocer su problemática a fin de poder orientar en su caso, respecto a la procedencia del asunto expuesto, iniciando de ser procedente la Carpeta de Investigación correspondiente o por el contrario la canalización del ciudadano a la Unidad Integral de Procuración de Justicia, o alguna otra instancia competente;&nbsp;<br />
• Para iniciar el expediente de atención temprana,&nbsp;<br />
• Para la recepción de las denuncias y querellas,&nbsp;<br />
• Para la emisión de informes.&nbsp;<br />
De manera adicional, utilizaremos su información personal para la siguiente finalidad que nos permite y facilita brindarle una mejor atención:&nbsp;<br />
• Generación de informes estadísticos.&nbsp;<br />
En caso de que no desee que sus datos personales sean tratados para las finalidades adicionales, Usted puede manifestarlo al correo electrónico&nbsp;<a href="http://uat2.oo/actaoficio/direcciondetransparencia@fiscaliaveracruz.gob.mx">direcciondetransparencia@fiscaliaveracruz.gob.mx</a>&nbsp;<br />
Le informamos que sus datos personales&nbsp;<strong>NO</strong>&nbsp;son compartidos con personas, empresas, organizaciones y autoridades distintas al sujeto obligado, salvo que sean necesarias para atender requerimientos de información de una autoridad competente, debidamente fundados y motivados.&nbsp;<br />
Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a través de la dirección electrónica:&nbsp;<a href="http://fiscaliaveracruz.gob.mx/">http://fiscaliaveracruz.gob.mx</a></span></p> ',  
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
            'contenido' =>  '
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">ACUERDO.- EN LA CIUDAD DE {{$localidad}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, {{$entidad}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, SIENDO LOS {{$fecha}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">.- - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - -</span></span></strong></span></span></span></span></strong></span></span></span></span></strong></span></span></span></span></strong></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">VISTO:</span></span></strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"> Que se encuentra presente la ciudadano {{$nombreDenunciante}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">&nbsp;<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, quien pone en conocimiento de esta autoridad hechos constitutivos del delito de {{$delito}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">,<strong> </strong>en contra de {{$nombreDenunciado}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, por lo que con fundamento en lo dispuesto por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos; 54 de la Constitución Política Local;&nbsp; 1°,16, 108, 109, 110, 113, 115, 127, 128, 131, 132,&nbsp; 211, 212, 213, 214, 215, 216, 217, 221 y demás relativos y aplicables del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial; 5 párrafo primero, 6 fracción I y IV, 7 fracción III, IV, V y VI de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 Apartado A fracción I, Apartado B fracción I y Apartado C fracciones I: II; III y IV del Reglamento de la citada Ley, por lo que se: - - - <strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </strong><strong>A C U E R D A - - - - - - - - -&nbsp; - - - - - - - - - - - - - - - - - - &nbsp;PRIMERO.-</strong> Dese inicio a la carpeta de investigación&nbsp; que se impone, debiéndose registrar bajo el número que le corresponde en el libro de Gobierno que tiene la Unidad de Atención Temprana Número 1 del Distrito Decimo Primero, debiendo dar aviso de su inicio a la superioridad.- - - - - - - - - - - - - - - - - - - - - -</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></strong></span></span></span></span></strong></span></span></span></span></strong></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><strong>SEGUNDO.-</strong> Entrevístese al Denunciante y/o querellante en relación a los hechos que pone en conocimiento de esta Autoridad, lo anterior con el claro objetivo de investigar la veracidad de dicha denuncia y/o querella, debiéndosele notificar al denunciante los derechos que en su favor consagra el articulo 20 apartado C, de la Constitución General de la Republica en relación con el artículo 109 del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial, debiendo dejar constancia de la misma. - - - - - - - - - - - - - - - -- - - - - - - - - -- - - - - - - -&nbsp;- - - - - - - - - - - - - - - - - - -- - - - - - - -&nbsp;- - - - -&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></strong></span></span></span></span></strong></span></span></span></span></strong></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"><strong>TERCERO.-</strong>Practíquense todas aquellas diligencias urgentes e inaplazables para el esclarecimiento de los hechos, así como de las situaciones relevantes para la aplicación de la ley penal, de los autores y partícipes, así como de las circunstancias que sirvan para verificar en su oportunidad el grado de responsabilidad de los mismos, lo anterior en estricto cumplimiento a lo señalado por la ley bajo las premisas de la carga de la prueba y de presunción de inocencia, con el objeto de que esta Fiscalía reúna datos de prueba indiciaria para el esclarecimiento de los hechos que se denuncian, y en su caso, para sustentar el ejercicio o no de la acción penal que podría llegar a ejercitarse. - - - -- - - - - - - - - -- - - - - - <strong>CUARTO.-</strong> Hágasele saber al denunciante el número de Carpeta de Investigación Ministerial que le corresponde y realícense las diligencias necesarias de conformidad con el artículo 201 fracción II y IV 207 Fracción I</span></span><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;"> del Reglamento de la Ley Orgánica de la Fiscalía General del Estado.- CÚMPLASE.- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></span></strong></span></span></span></span></strong></span></span></span></span></strong></span></span></p>

<p style="text-align:center"><strong><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">LIC. {{$fiscal}}</span></span></strong></span></span></strong></strong></p>

<p style="text-align:center"><strong><strong><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">{{$puestoFiscal}}</span></span></strong></span></span></strong></strong></strong></p>



<p style="text-align:justify"><strong><strong><strong>&nbsp;</strong></strong></strong></p>

<p style="text-align:justify"><strong><strong><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </strong></span></span></strong></strong></strong></p>

<p style="text-align:justify"><strong><strong><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">CONSTANCIA.- En la misma fecha la presente Carpeta de Investigación queda registrada bajo el número {{$carpeta}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">
            
            ',  
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],

            ['nombre'  =>  'circunstanciada',
            'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:100px" /></p>

            <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
            <strong>"Si lo platicamos, lo solucionamos”</strong></p>', 
           'contenido' =>'
           <p style="text-align:center"><strong>ACTA CIRCUNSTANCIADA No. {{$folio}}</strong></p>

<p>&nbsp;</p>

<p><em><strong>{{$unidad}}</strong></em></p>

<p style="text-align:justify"><br />
<span style="font-size:12px">En la ciudad de <strong>{{$localidad}}, VERACRUZ, </strong>siendo las&nbsp;<strong>{{$hora}}</strong>&nbsp;horas del día {{$fecha}}, ante la presencia del (la) Licenciada&nbsp;{{$fiscal}}, {{$puesto}}, se presenta el (la) C.{{$nombre}}, identificándose con {{$identificacion}}&nbsp;número&nbsp;{{$numIdentificacion}}, a quien en este momento se le pone en conocimiento de las penas con que la ley castiga el declarar con falsedad ante la autoridad, como lo prevé el artículo 333 del código penal vigente para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad, bajo su única y exclusiva responsabilidad por sus generales dijo: llamarse como ha quedado escrito, ser de&nbsp;{{$edad}}&nbsp;años de edad, nació en fecha&nbsp;{{$fechaNacimiento}}, originario de&nbsp;{{$municipioOrigen}}, {{$estadoOrigen}}, con domicilio en la calle&nbsp;{{$calle}}, {{$numExterno}}, colonia {{$colonia}}, C.P.{{$cp}}, ocupación {{$ocupacion}}, estado civil {{$estadoCivil}}, grado de escolaridad&nbsp;{{$escolaridad}}, número telefónico&nbsp;{{$telefono}},&nbsp;identificado como corresponde, esta fiscalía hace del conocimiento a quien comparece los derechos de la víctima u ofendido consagrados en la <strong>Constitución Política de los Estados Unidos Mexicanos y el Código Nacional de Procedimientos Penales: - - - - - - - - - - - - - - - - - - -</strong></span></p>

<p><span style="font-size:12px"><strong>Artículo 20, apartado C de la Constitución Política de los Estados Unidos Mexicanos:</strong></span></p>

<p><span style="font-size:12px"><strong>C.</strong> De los derechos de la víctima o del ofendido:</span></p>

<p><span style="font-size:12px"><strong>I.</strong> Recibir asesoría jurídica; ser informado de los derechos que en su favor establece la Constitución y, cuando lo solicite, ser informado del desarrollo del procedimiento penal;</span></p>

<p><span style="font-size:12px"><strong>II. </strong>Coadyuvar con el Ministerio Público; a que se le reciban todos los datos o elementos de prueba con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que prevea la ley. Cuando el Ministerio Público considere que no es necesario el desahogo de la diligencia, deberá fundar y motivar su negativa;</span></p>

<p><span style="font-size:12px"><strong>III.</strong> Recibir, desde la comisión del delito, atención médica y psicológica de urgencia;</span></p>

<p><span style="font-size:12px"><strong>IV. </strong>Que se le repare el daño. En los casos en que sea procedente, el Ministerio Público estará obligado a solicitar la reparación del daño, sin menoscabo de que la víctima u ofendido lo pueda solicitar directamente, y el juzgador no podrá absolver al sentenciado de dicha reparación si ha emitido una sentencia condenatoria.</span></p>

<p><span style="font-size:12px">La ley fijará procedimientos ágiles para ejecutar las sentencias en materia de reparación del daño;</span></p>

<p><span style="font-size:12px"><strong>V.</strong> Al resguardo de su identidad y otros datos personales en los siguientes casos: cuando sean menores de edad; cuando se trate de delitos de violación, secuestro o delincuencia organizada; y cuando a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa.</span></p>

<p><span style="font-size:12px">El Ministerio Público deberá garantizar la protección de víctimas, ofendidos, testigos y en general todas los sujetos que intervengan en el proceso. Los jueces deberán vigilar el buen cumplimiento de esta obligación;</span></p>

<p><span style="font-size:12px"><strong>VI.</strong> Solicitar las medidas cautelares y providencias necesarias para la protección y restitución de sus derechos, y</span></p>

<p><span style="font-size:12px"><strong>VII.</strong> Impugnar ante autoridad judicial las omisiones del Ministerio Público en la investigación de los delitos, así como las resoluciones de reserva, no ejercicio, desistimiento de la acción penal o suspensión del procedimiento cuando no esté satisfecha la reparación del daño.</span></p>

<p>&nbsp;</p>

<p><span style="font-size:12px"><strong>Artículo 109 del Código Nacional de Procedimientos Penales.</strong></span></p>

<p><span style="font-size:12px">En los procedimientos previstos en este Código, la víctima u ofendido tendrán los siguientes derechos:</span></p>

<p><span style="font-size:12px"><strong>I.</strong> A ser informado de los derechos que en su favor le reconoce la Constitución;</span></p>

<p><span style="font-size:12px"><strong>II.</strong> A que el Ministerio Público y sus auxiliares así como el Órgano jurisdiccional les faciliten el acceso a la justicia y les presten los servicios que constitucionalmente tienen encomendados con legalidad, honradez, lealtad, imparcialidad, profesionalismo, eficiencia y eficacia y con la debida diligencia;</span></p>

<p><span style="font-size:12px"><strong>III. </strong>A contar con información sobre los derechos que en su beneficio existan, como ser atendidos por personal del mismo sexo, o del sexo que la víctima elija, cuando así lo requieran y recibir desde la comisión del delito atención médica y psicológica de urgencia, así como asistencia jurídica a través de un Asesor jurídico;</span></p>

<p><span style="font-size:12px"><strong>IV.</strong> A comunicarse, inmediatamente después de haberse cometido el delito con un familiar, e incluso con su Asesor jurídico;</span></p>

<p><span style="font-size:12px"><strong>V. </strong>A ser informado, cuando así lo solicite, del desarrollo del procedimiento penal por su Asesor jurídico, el Ministerio Público y/o, en su caso, por el Juez o Tribunal;</span></p>

<p><span style="font-size:12px"><strong>VI.</strong> A ser tratado con respeto y dignidad;</span></p>

<p><span style="font-size:12px"><strong>VII.</strong> A contar con un Asesor jurídico gratuito en cualquier etapa del procedimiento, en los términos de la legislación aplicable;</span></p>

<p><span style="font-size:12px"><strong>VIII.</strong> A recibir trato sin discriminación a fin de evitar que se atente contra la dignidad humana y se anulen o menoscaben sus derechos y libertades, por lo que la protección de sus derechos se hará sin distinción alguna;</span></p>

<p><span style="font-size:12px"><strong>IX.</strong> A acceder a la justicia de manera pronta, gratuita e imparcial respecto de sus denuncias o querellas;</span></p>

<p><span style="font-size:12px"><strong>X.</strong> A participar en los mecanismos alternativos de solución de controversias;</span></p>

<p><span style="font-size:12px"><strong>XI.</strong> A recibir gratuitamente la asistencia de un intérprete o traductor desde la denuncia hasta la conclusión del procedimiento penal, cuando la víctima u ofendido pertenezca a un grupo étnico o pueblo indígena o no conozca o no comprenda el idioma español;</span></p>

<p><span style="font-size:12px"><strong>XII.</strong> En caso de tener alguna discapacidad, a que se realicen los ajustes al procedimiento penal que sean necesarios para salvaguardar sus derechos;</span></p>

<p><span style="font-size:12px"><strong>XIII.</strong> A que se le proporcione asistencia migratoria cuando tenga otra nacionalidad;</span></p>

<p><span style="font-size:12px"><strong>XIV.</strong> A que se le reciban todos los datos o elementos de prueba pertinentes con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que establece este Código;</span></p>

<p><span style="font-size:12px"><strong>&nbsp;XV. </strong>A intervenir en todo el procedimiento por sí o a través de su Asesor jurídico, conforme lo dispuesto en este Código;</span></p>

<p><span style="font-size:12px"><strong>XVI. </strong>A que se le provea protección cuando exista riesgo para su vida o integridad personal;</span></p>

<p><span style="font-size:12px"><strong>XVII.</strong>A solicitar la realización de actos de investigación que en su caso correspondan, salvo que el Ministerio Público considere que no es necesario, debiendo fundar y motivar su negativa;</span></p>

<p><span style="font-size:12px"><strong>XVIII.</strong> A recibir atención médica y psicológica o a ser canalizado a instituciones que le proporcionen estos servicios, así como a recibir protección especial de su integridad física y psíquica cuando así lo solicite, o cuando se trate de delitos que así lo requieran;</span></p>

<p><span style="font-size:12px"><strong>XIX.</strong> A solicitar medidas de protección, providencias precautorias y medidas cautelares;</span></p>

<p><span style="font-size:12px"><strong>XX.</strong> A solicitar el traslado de la autoridad al lugar en donde se encuentre, para ser interrogada o participar en el acto para el cual fue citada, cuando por su edad, enfermedad grave o por alguna otra imposibilidad física o psicológica se dificulte su comparecencia, a cuyo fin deberá requerir la dispensa, por sí o por un tercero, con anticipación;</span></p>

<p><span style="font-size:12px"><strong>XXI.</strong> A impugnar por sí o por medio de su representante, las omisiones o negligencia que cometa el Ministerio Público en el desempeño de sus funciones de investigación, en los términos previstos en este Código y en las demás disposiciones legales aplicables;</span></p>

<p><span style="font-size:12px"><strong>XXII.</strong> A tener acceso a los registros de la investigación durante el procedimiento, así como a obtener copia gratuita de éstos, salvo que la información esté sujeta a reserva así determinada por el Órgano jurisdiccional;</span></p>

<p><span style="font-size:12px"><strong>XXIII. </strong>A ser restituido en sus derechos, cuando éstos estén acreditados;</span></p>

<p><span style="font-size:12px"><strong>XXIV.</strong> A que se le garantice la reparación del daño durante el procedimiento en cualquiera de las formas previstas en este Código;</span></p>

<p><span style="font-size:12px"><strong>XXV.</strong> A que se le repare el daño causado por la comisión del delito, pudiendo solicitarlo directamente al Órgano jurisdiccional, sin perjuicio de que el Ministerio Público lo solicite;</span></p>

<p><span style="font-size:12px"><strong>XXVI.</strong> Al resguardo de su identidad y demás datos personales cuando sean menores de edad, se trate de delitos de violación contra la libertad y el normal desarrollo psicosexual, violencia familiar, secuestro, trata de personas o cuando a juicio del Órgano jurisdiccional sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa;</span></p>

<p><span style="font-size:12px"><strong>XXVII.</strong> A ser notificado del desistimiento de la acción penal y de todas las resoluciones que finalicen el procedimiento, de conformidad con las reglas que establece este Código;</span></p>

<p><span style="font-size:12px"><strong>XXVIII.</strong> A solicitar la reapertura del proceso cuando se haya decretado su suspensión, y</span></p>

<p><span style="font-size:12px"><strong>XXIX.</strong> Los demás que establezcan este Código y otras leyes aplicables.</span></p>

<p style="text-align:justify"><span style="font-size:12px">En el caso de que las víctimas sean personas menores de dieciocho años, el Órgano jurisdiccional o el Ministerio Público tendrán en cuenta los principios del interés superior de los niños o adolescentes, la prevalencia de sus derechos, su protección integral y los derechos consagrados en la Constitución, en los Tratados, así como los previstos en el presente Código.</span></p>

<p style="text-align:justify"><span style="font-size:12px">Para los delitos que impliquen violencia contra las mujeres, se deberán observar todos los derechos que en su favor establece la Ley General de Acceso de las Mujeres a una Vida Libre de Violencia y demás disposiciones aplicables.</span></p>

<p style="text-align:justify"><span style="font-size:12px">Hecho lo anterior, bajo protesta de decir verdad, considerando el motivo de su comparecencia hacer del conocimiento de esta representación lo siguiente:<strong> - - - - - - - - - - - - - - - - - - - - - - - - - - “<em>Narración de Hechos</em>” - - - -&nbsp;- - - - - - - - - - - - - - - - - - - - - - -&nbsp;{{$narracion}}.-&nbsp;CONSTE. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</strong></span></p>

<p style="text-align:justify"><span style="font-size:12px">En términos de los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos; 5, 6 fracción XI, 7 fracción II, y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 apartado A, fracción II, 195 y 201 fracción V del Reglamento de la precitada Ley Orgánica, en relación con la Circular 01/2015 inciso “a” fracción IV, V y VI emitida por el Fiscal General del Estado, esta Fiscalía Orientadora a mi cargo, tiene a bien levantar la presente, firmando por duplicado los que en ella intervienen.- - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</span></p>

<table align="center" cellpadding="1" cellspacing="1" style="width:500px">
	<tbody>
		<tr>
			<td style="text-align:center; width:307px">Firma del Compareciente</td>
			<td style="width:180px">&nbsp;</td>
		</tr>
		<tr>
			<td style="height:76px; text-align:center; width:307px">__________________________________</td>
			<td style="height:76px; width:180px">____________________________________</td>
		</tr>
		<tr>
			<td style="text-align:center">{{$nombre}}</td>
			<td style="text-align:center; width:180px">
			<p><strong>LIC.</strong>{{$fiscal}}</p>
			</td>
		</tr>
		<tr>
			<td style="width:307px">&nbsp;</td>
			<td style="text-align:center; width:180px"><span style="font-size:11px">{{$puesto}}</span></td>
		</tr>
	</tbody>
</table>
           ',
           'pie' =>  '<p>Circuito Rafael Guízar y<br />
           Valencia No. 147,<br />
           Colonia Reserva Territorial,<br />
           C.P. 91096<br />
           Teléfono: 01 (228) 8149428,<br />
           Xalapa-Enríquez, Veracruz</p>',
           'unidad'=>'1'],

           ['nombre'  =>  'CAVD',
           'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
           <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                       Distrito XI Xalapa, Veracruz“</p>', 
           'contenido' => 
           '<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">C.{{$dirigido}}</span></strong></span></span></p>

           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Directora del Centro de Atención a Víctimas</span></em></span></span></p>
           
           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">de la Fiscalía General del Estado</span></em></span></span></p>
           
           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Presente</span></em></span></span></p>
           
           <p>&nbsp;</p>
           
           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">{{$entidad}}</span><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">, Veracruz; a {{$fecha}}</span></span></span></p>
           
           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">Oficio: UAT-XI/092/2018</span></span></span></p>
           
           <p>&nbsp;</p>
           
           <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Carpeta de Investigación: {{$numCarpeta}}</span></strong></span></span></p>
           
           <p>&nbsp;</p>
           
           <p>&nbsp;</p>
           
           <p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Verdana,sans-serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Con fundamento en lo dispuesto por los artículos 20 apartado C y 21 de la Constitución Política de los Estados Unidos Mexicanos;&nbsp; 109, 127, 131, 211 y demás relativos y aplicables del Código Nacional de Procedimientos Penales; 1, 2 y 4 párrafo segundo, 5 párrafo diecinueve, 7 fracciones XXIII, 62 fracción I de La Ley General de Víctimas; 5, 6, 7 y 40 de la Ley Orgánica de la Fiscalía General del Estado; 201 fracciones I y IV del Reglamento de la citada ley, &nbsp;por medio del presente me permito canalizar a usted a la C. {{$denunciante}}, con número telefónico {{telefono}}, solicitándole muy atentamente, tenga a bien girar sus apreciables instrucciones a quien corresponda, a efecto de que se le brinde la atención que necesita.</span></span></span></span></p>
           
           <p style="text-align:justify">&nbsp;</p>
           
           <p style="text-align:left"><span style="font-size:12pt"><span style="font-family:Verdana,sans-serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Lo anterior a fin de integrar la carpeta de investigación que al rubro superior derecho se indica.</span></span></span></span></p>
           
           <p style="text-align:left">&nbsp;</p>
           
           <p style="text-align:left"><span style="font-size:12pt"><span style="font-family:Verdana,sans-serif"><span style="font-size:11.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Sin otro particular le reitero mi consideración distinguida.</span></span></span></span></p>
           
           <p style="text-align:left">&nbsp;</p>
           
           <p style="text-align:left">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Atentamente.</span></span></span></p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">LIC. {{$fiscalAtendio}}</span></span></strong></span></span></p>
           
           <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">{{$puesto}}</span></span></span></span></p>
           
           <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Del XI Distrito Judicial en Xalapa, Veracruz</span></span></span></span></p>
           
           <p>&nbsp;</p>
           
           <p><strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</strong></p>
           
           ',

           'pie' =>  '<p>Circuito Rafael Guízar y<br />
           Valencia No. 147,<br />
           Colonia Reserva Territorial,<br />
           C.P. 91096<br />
           Teléfono: 01 (228) 8149428,<br />
           Xalapa-Enríquez, Veracruz</p>',
           'unidad'=>'1'],


            
            ['nombre'  =>  'pervehiculo',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>', 
            'contenido' => 
            '<p style="text-align:right"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><em><span style="font-size:12.0pt"><span style="font-family:&quot;Aparajita&quot;,&quot;sans-serif&quot;">Unidad de Atención Temprana del Distrito Judicial XI de Xalapa</span></span></em></strong></span></span></p>

            <table cellspacing="0" style="width:454.5pt">
                <tbody>
                    <tr>
                        <td rowspan="3" style="border-color:black; vertical-align:top; width:95.25pt">
                        <p>&nbsp;</p>
                        </td>
                        <td style="vertical-align:top; width:205.2pt">
                        <p style="text-align:right"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">OFICIO No.&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span></span></p>
                        </td>
                        <td style="border-color:black; vertical-align:top; width:163.95pt">
                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">&nbsp;UAT-XI/045/2018</span></span></strong></span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:205.2pt">
                        <p style="text-align:right"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">No. Carpeta de Investigación:</span></span></span></span></p>
                        </td>
                        <td style="vertical-align:top; width:163.95pt">
                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">UAT/D-XI/021/2018-6°</span></span></strong></span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="vertical-align:top; width:205.2pt">
                        <p style="text-align:right"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Asunto derivador por:</span></span></span></span></p>
                        </td>
                        <td style="vertical-align:top; width:163.95pt">
                        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:8.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Se solicita peritaje que se indica</span></span></span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-color:black; vertical-align:top; width:95.25pt">
                        <p>&nbsp;</p>
                        </td>
                        <td style="vertical-align:top; width:205.2pt">
                        <p style="text-align:right">&nbsp;</p>
                        </td>
                        <td style="vertical-align:top; width:163.95pt">
                        <p>&nbsp;</p>
                        </td>
                    </tr>
                </tbody>
            </table>
            
            <p style="text-align:right"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><em><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Xalapa, Veracruz, a 3 de enero de 2018</span></em></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">LIC. DIRECTOR GENERAL DE LOS SERVICIOS</span></strong><br />
            <strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">PERICIALES EN EL ESTADO.</span></strong></span></span></p>
            
            <p style="text-align:left"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-size:11.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">P R E S E N T E.</span></span></strong></span></span></p>
            
            <p style="text-align:right">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política Local; 2°, 127,130, 131 fracción, 132, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted designe perito en la materia a fin de que realice peritaje de avalúo de daños que presenta la unidad <strong>TIPO</strong> {{$clase}} <strong>MARCA {{</strong>$marca<strong>}}, SUBMARCA {{</strong>$submarca<strong>}}, LÍNEA {{</strong>$linea<strong>}}, MODELO {{</strong>$modelo<strong>}}, COLOR {{</strong>$color<strong>}}, CON NÚMERO DE SERIE {{</strong>$numero_serie<strong>}}, MOTOR HECHO EN {{</strong>$lugar_fabricacion<strong>}}, CON PLACAS DE CIRCULACIÓN {{</strong>$placas<strong>}} PARTICULARES DEL ESTADO DE {{</strong>$Estado<strong>}}, </strong>propiedad del <strong>C. {{</strong>$nombre<strong>}}, </strong>número de celular <strong>{{</strong>$telefono<strong>}}</strong>, vehículo que se encuentra en SU DOMICILIO ubicado en la calle<strong> {{</strong>$calle<strong>}} {{</strong>$num_ext<strong>}}, LOCALIDAD {{</strong>$Localidad<strong>}}, COLONIA {{</strong>$Colonia<strong>}}, C.P.{{</strong>$CP<strong>}}, {{</strong>$Municipio<strong>}}, {{</strong>$Estado<strong>}}</strong></span><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">; </span></strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">a efecto de que el perito designado, realice lo ya indicado.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta<strong> Unidad de Atención Temprana</strong>, para la debida integración de la Carpeta de Investigación al rubro referida.</span></span></span></p>
            
            <p style="text-align:right">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Atentamente</span></strong></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">___________________________</span></strong></span></span></p>
            
            <table cellspacing="0" style="width:448.85pt">
                <tbody>
                    <tr>
                        <td style="border-color:black; vertical-align:top; width:458.75pt">
                        <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Lic. Brenda Xiovara Moreno Escalante</span></strong></span></span></p>
                        </td>
                    </tr>
                    <tr>
                        <td style="border-color:black; vertical-align:top; width:458.75pt">
                        <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Fiscal Sexta Orientadora en la Unidad de Atención Temprana en el Distrito XI Judicial en Xalapa</span></strong></span></span></p>
                        </td>
                    </tr>
                </tbody>
            </table>
            ',

            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],
            ['nombre'  =>  'PERPSICOLOGO',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
            'contenido' =>  '<p style="text-align:center">&nbsp;</p>
 
            <p style="text-align:center">&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">C. DIRECTOR DE SERVICIOS PERICIALES DEL ESTADO</span></strong></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Presente</span></em></span></span></p>
            
            <p>&nbsp;</p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Xalapa-Enríquez, Veracruz; a {{$fecharealizacion}}</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Oficio: UAT-XI/2,{{$id}}/2018</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Carpeta de Investigación: UAT/D-XI/{{$idCarpeta}}/2018-6°</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política Local; 2°, 127, 131, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted designe perito en la materia a fin de que se sirva a efecto de que se sirva realizar valoración psicológica al ciudadana <strong>{{$nombre}} </strong>con número de teléfono celular<strong> {{$telefono}},</strong> quien denunciara hechos en su agravio que pudieran constituir delito, debiendo determinar el estado emocional y descripción de estado psicológico, precisando si presenta:</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">a) Daño psicológico. </span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">b) Efecto atemorizante y/o estado zozobra. </span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">c) Determinar si dicha persona se encuentra afectada por los hechos denunciados. </span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">d) Cuantifique el costo de la recuperación de la agraviada en caso de que ésta presente daño <strong>{{$delito}}</strong>.</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta <strong>Unidad de Atención Temprana</strong> para la debida integración de la Carpeta de Investigación al rubro referida. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo.</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Atentamente.</span></span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">LIC. BRENDA XIOVARA MORENO ESCALANTE</span></strong></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Fiscal Sexta Orientadora de la Unidad de Atención Temprana</span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Del XI Distrito Judicial en Xalapa, Veracruz</span></span></span></p>',
            'unidad'=>'1',
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],
            ['nombre'  =>  'PERMENSAJE',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
            'contenido' =>  '<p>&nbsp;</p>

            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><strong>C. DIRECTOR DE SERVICIOS PERICIALES DEL ESTADO</strong></span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><em>Presente</em></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">{{$localidad}}, Veracruz; a {{$fecha}}</span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Oficio: {{$oficio}}</span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Carpeta de Investigación: {{$numCarpeta}}°</span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política Local; 2°, 127, 131, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted designe perito en la materia a fin de que se sirva examinar clínicamente a la<strong> C. {{$nombre}}</strong><strong>&nbsp;</strong> y se determine lo siguiente:</span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">1. Su orden de esfera neurológico.</span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">2. Si presenta huellas de lesiones, su naturaleza, ubicación y clasificación.</span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">3. Tiempo de evolución de la lesión.</span></span></p>
            
            <p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Asimismo, deberá cuantificar el monto de la reparación del daño consistente en las medicinas, las consultas médicas, la prótesis, la rehabilitación y todo aquello que sea necesario al caso para la total recuperación de las lesiones sufridas, en base al conocimiento y los datos que se tenga al momento, siempre en el entendido de que, si posteriormente se cuenta con mayor evolución de las mismas, se realizarán las adecuaciones pertinentes.</span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Debiendo rendir el dictamen solicitado a la mayor brevedad, toda vez que resulta necesario para lograr la debida integración del expediente al rubro citado. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo y afectuoso.</span></span></p>
            
            <p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta<strong> Unidad de Atención Temprana,</strong> para la debida integración de la Carpeta de Investigación al rubro referida. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo.</span></span></p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt">Atentamente.</span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><strong>Lic.{{$nombreC}}</strong></span></span></p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:14.6667px">{{$puesto}}</span></span></p>
            
            <p>&nbsp;</p>',
            'unidad'=>'1',
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],
                
            ['nombre'  =>  'PERLESIONES',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
            'contenido' =>  '<p>&nbsp;</p>
 
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">C. DIRECTOR DE SERVICIOS PERICIALES DEL ESTADO</span></strong></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Presente</span></em></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Xalapa-Enríquez, Veracruz; a {{$fecha}}</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Oficio: UAT-XI/2,{{$id}}/2018</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Carpeta de Investigación: UAT/D-XI/{{$idCarpeta}}/2018-6°</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política Local; 2°, 127, 131, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted designe perito en la materia a fin de que se sirva examinar clínicamente a la<strong> C. {{$nombre}}</strong><strong>&nbsp;</strong> y se determine lo siguiente:</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">1. Su orden de esfera neurológico.</span><br />
            <span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">2. Si presenta huellas de lesiones, su naturaleza, ubicación y clasificación.</span><br />
            <span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">3. Tiempo de evolución de la lesión.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Asimismo, deberá cuantificar el monto de la reparación del daño consistente en las medicinas, las consultas médicas, la prótesis, la rehabilitación y todo aquello que sea necesario al caso para la total recuperación de las lesiones sufridas, en base al conocimiento y los datos que se tenga al momento, siempre en el entendido de que, si posteriormente se cuenta con mayor evolución de las mismas, se realizarán las adecuaciones pertinentes.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Debiendo rendir el dictamen solicitado a la mayor brevedad, toda vez que resulta necesario para lograr la debida integración del expediente al rubro citado. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo y afectuoso.</span></span></span></p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta<strong> Unidad de Atención Temprana,</strong> para la debida integración de la Carpeta de Investigación al rubro referida. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo.</span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Atentamente.</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">LIC. BRENDA XIOVARA MORENO ESCALANTE</span></strong></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Fiscal Sexta Orientadora de la Unidad de Atención Temprana</span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Del XI Distrito Judicial en Xalapa, Veracruz</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Veracruz</span></span></span></p>',
            'unidad'=>'1',
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],
       
            ['nombre'  =>  'DIRECCION GRAL TRANSITO',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>',  
    
            'contenido' => '<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><strong><span style="font-size:12.0pt">C. DIRECTOR GENERAL DE TRANSPORTE DEL ESTADO</span></strong></span></span></p>

            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><em><span style="font-size:12.0pt">Presente</span></em></span></span></p>
            
            <p>&nbsp;</p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">{{$zona}}, VERACRUZ; A&nbsp;{{$fecha}}</span></span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">OFICIO: {{$oficio}}</span></span></span></p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">CARPETA DE INVESTIGACIÓN: {{$numCarpeta}}</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">Por medio del presente y con fundamento en lo establecido por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos, 52 de la Constitución Política del Estado de Veracruz de Ignacio de la Llave, 131, 132 y demás aplicables del Código Nacional de Procedimientos Penales;&nbsp; solicito a usted atenta y respetuosamente, tenga a bien instruir personal a su cargo a efecto de que informe a esta Representación Social en un <strong>término de tres</strong> días hábiles, el nombre y domicilio del <strong>propietario y conductor</strong> de la unidad vehicular: <strong>MARCA</strong> <strong>{{$marca}}, LÍNEA {{$submarca}}, COLOR {{$color}}, NÚMERO DE SERIE {{$numSerie}}, MODELO {{$modelo}},&nbsp;PLACAS DE CIRCULACIÓN {{$placas}},</strong>&nbsp;del cual se desconoce más datos; debiendo remitir copia certificada del expediente de dicha unidad y de los registro de los conductores.</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">Sin más por el momento agradezco la atención que se sirva brindar al presente.</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:14.0pt">Atentamente.</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><strong><span style="font-size:12.0pt">LIC. {{$fiscalAtendio}}</span></strong></span></span></p>
            
            <p style="text-align:center"><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11pt"><span style="font-size:12.0pt">{{$puestoFiscal}}</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            ',
    
            
            'unidad'=>'1',
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],

        ['nombre'  =>  'AcuerdoFiscalDistrito',
        'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
        <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                    Distrito XI Xalapa, Veracruz“</p>',  

        'contenido' => '
        ACUERDO.- EN LA CIUDAD DE {{$localidad}}, VERACRUZ; A {{$fecha}}. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  VISTO: El estado actual que guarda la presente Carpeta de Investigación, iniciada con motivo de la denuncia presentada por el ciudadano {{$denunciante}}quien pone en conocimiento de esta autoridad hechos constitutivos del delito de {{$delito}}, en agravio de mi integridad física, en contra de {{$denunciado}}, con fundamento en lo dispuesto por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos, 54 de la Constitución Política local, 1°, 16, 127, 128, 131 y demás relativos y aplicables del Código Nacional de Procedimientos penales vigente en este Distrito Judicial; 5 párrafo primero, 6 fracción I y IV, 7 fracción III, IV, V, VI de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 Apartado A fracción I, Apartado B fracción I y Apartado C fracciones I: II; III y IV, 201 fracción II y IV  207 Fracción I del Reglamento de la citada Ley, la suscrita:- - - - - - - - -  - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -D I S P O N E - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - ÚNICO.- Remítase por conducto de la C. Licenciada ALEJANDRA EDITH RIVERA HERNÁNDEZ, Fiscal Coordinadora de la Unidad de Atención Temprana Distrito XI Xalapa, la presente carpeta de Investigación número {{$carpeta}}, al Licenciado MTRO. FERNANDO PENSADO ORTEGA, C. Fiscal de Distrito de la Unidad Integral de Procuración de Justicia de este Distrito Judicial, a efecto de que turne e instruya al C. Fiscal que corresponda para que se continúe con su integración y perfeccionamiento hasta su determinación que en derecho proceda.- CÚMPLASE.- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - 


Atentamente.



LIC. {{$fiscalAtendio}}
{{$puesto}}, Veracruz
',

        
        'unidad'=>'1',
        'pie' =>  '<p>Circuito Rafael Guízar y<br />
        Valencia No. 147,<br />
        Colonia Reserva Territorial,<br />
        C.P. 91096<br />
        Teléfono: 01 (228) 8149428,<br />
        Xalapa-Enríquez, Veracruz</p>',
        'unidad'=>'1'],
        
      

        ['nombre'  =>  'CARATULA DE LA CARPETA',
        'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

        <p style="text-align:right"><span style="font-size:16px">Unidad de Atención Temprana.</span></p>
        
        <p style="text-align:right"><span style="font-size:16px">"Si lo platicamos, lo solucionamos”</span></p>',  

        'contenido' => '<table align="center" cellpadding="1" cellspacing="1" style="width:646px; font-size:27px;">
        <tbody>
            <tr>
                <td style="height:97px; text-align:center; width:638px"><span style="font-size:27px"><strong>{{$descripcion}}</strong></span></td>
            </tr>
            <tr>
                <td style="height:126px; text-align:center; width:638px"><span style="font-size:27px"><strong>VERACRUZ CARPETA DE INVESTIGACIÓN:{{$numeroCarpeta}}°</strong></span></td>
            </tr>
            <tr>
                <td style="height:70px; text-align:center; width:638px"><span style="font-size:27px"><strong>C. {{$denunciante}}</strong></span></td>
            </tr>
            <tr>
                <td style="height:78px; text-align:center; width:638px"><span style="font-size:27px"><strong>LIC. {{$nombreC}}</strong></span></td>
            </tr>
            <tr>
                <td style="height:96px; text-align:center; width:638px"><span style="font-size:27px"><strong>{{$puesto}}</strong></span></td>
            </tr>
        </tbody>
    </table>
    
    <p>&nbsp;</p>
    
    <p>&nbsp;</p>
    
    <p>&nbsp;</p>
',
            'unidad'=>'1',
            'pie' =>  '<p>Circuito Rafael Guízar y<br />
            Valencia No. 147,<br />
            Colonia Reserva Territorial,<br />
            C.P. 91096<br />
            Teléfono: 01 (228) 8149428,<br />
            Xalapa-Enríquez, Veracruz</p>',
            'unidad'=>'1'],
           
           
           
           
            ['nombre'  =>  'POLICIA MINISTERIAL',
            'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

            <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
            <strong>"Si lo platicamos, lo solucionamos”</strong></p>',

           'contenido' => '
           <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">C. DELEGADO REGIONAL DE LA POLICÍA MINISTERIAL </span></strong></span></span></p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Zona Centro Xalapa</span></em></span></span></p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Presente</span></em></span></span></p>

<p>&nbsp;</p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">{{$localidad}}</span><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">, VERACRUZ; A {{$fecha}}</span></span></span></p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">OFICIO: {{$OFICIO}}</span></span></span></p>

<p>&nbsp;</p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">CARPETA DE INVESTIGACION: {{$numeroCarpeta}}°</span></strong></span></span></p>

<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">URGENTE</span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución General de la República; 52 de la Constitución Política Local; 127,131, 132 y demás relativos y aplicables del&nbsp; Código Nacional de Procedimientos Penales en vigor; solicito a usted atentamente, designe personal a su cargo a efecto de que se aboquen a INVESTIGAR los hechos denunciados por {{$complemento1}} <strong>{{$denunciante}}</strong><strong> </strong>con número de teléfono <strong>{{$telefono}}</strong>, ocurridos con domicilio en la calle <strong>{{$calle}} {{$numExterno}}, COLONIA {{$colonia}}, C.P.{{$CP}},</strong> de la ciudad de <strong>{{$municipio}}, VERACRUZ</strong>, por hechos que considero constitutivos del delito de <strong>{{$delito}}</strong> cometidos en contra de mi patrimonio y respecto a los hechos manifiesto</span><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">: </span></span><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">“<strong>. . . </strong></span><em><span style="font-size:9.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">{{$narracion}}<strong>. . .</strong></span></span></em><strong><em><span style="font-size:7.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">”;</span></span></em></strong><em> </em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">para lo cual se deja a la vista la carpeta de investigación al rubro citada para su consulta.</span></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Por lo que en virtud de lo anterior solicito a usted y al personal adscrito, que realice lo siguiente:</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">a) <strong>Realice inspección ocular en el lugar de los hechos</strong>;&nbsp; debiendo entrevistar sobre los mismos al ciudadano <strong>xxx, </strong>con domicilio en la calle xxx<strong>,</strong> de esta ciudad; quién deberá señalar si es su deseo presentar denuncia y/o querella.</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">b) Se investiguen los nombres y domicilios de los posibles testigos presenciales de los hechos materia de esta Carpeta, debiendo de realizar las entrevistas correspondientes;</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">c) Si existen cámaras de vigilancia en el lugar de los hechos o cerca del mismo, de ser afirmativo verifique los videos y de resultar datos que ayuden al esclarecimiento de los hechos, extraiga los mismos, en compañía de perito en la materia.</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">d) Búsqueda del objeto robado en casa de empeño, tianguis y demás comercios, debiendo realizar las diligencias necesarias.</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">e) Aporten datos que generen líneas de investigación que conlleven al esclarecimiento de los hechos;</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">f) Aporte los datos de prueba que considere pertinentes para demostrar la responsabilidad de quien le resulte.</span></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">No omitiendo señalar, que el informe respectivo deberá ser rendido con <strong>CARÁCTER URGENTE</strong>, para la debida integración de la carpeta de investigación al rubro referida, y debido esclarecimiento de los hechos puestos en conocimiento.</span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Atentamente.</span></span></span></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,&quot;sans-serif&quot;"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">LIC. {{$nombreC}}</span></span></strong></span></span></p>

<p style="text-align:center">{{$puesto}}</p>

<p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><strong><span style="font-size:5.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">&lt;</span></span></strong></span></span></p>

<p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Arial&quot;,&quot;sans-serif&quot;"><strong>&nbsp;</strong></span></span></p>

<p>&nbsp;</p> ',


           
           
'unidad'=>'1',
'pie' =>  '<p>&nbsp;</p>

<p><span style="font-size:11px"><span style="font-family:Arial,Helvetica,sans-serif">Circuito Rafael Guízar y Valencia No. 147,&nbsp;</span></span><br />
<span style="font-size:11px"><span style="font-family:Arial,Helvetica,sans-serif">Colonia Reserva Territorial, C.P. 91096<br />
Teléfono: 01 (228) 8149428,<br />
Xalapa-Enríquez, Veracruz</span></span></p>

<p>&nbsp;</p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11px">Delegacion Policia Ministerial, Calle Miami n.19</span></span></p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11px">Xalapa Ver. CP. 91130 TEL:01(228)8407186</span></span></p>

<p><span style="font-family:Arial,Helvetica,sans-serif"><span style="font-size:11px">Horario: Abierto las 24 horas</span></span></p>

<p>&nbsp;</p>',
'unidad'=>'1'],  

['nombre'  =>  'NOT. ACTUACIONES FISCAL DISTRITO',
        'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

        <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
        <strong>"Si lo platicamos, lo solucionamos”</strong></p>',  

        'contenido' => '
        <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">CARPETA DE INVESTIGACIÓN NÚMERO {{$numCarpeta}}</span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">NOTIFICACIÓN DE RESULTADO DE ACTUACIONES BRINDADAS POR ESTA FISCALÍA ORIENTADORA DE ESTA UNIDAD DE ATENCIÓN TEMPRANA.- EN LA CIUDAD DE {{$localidad}},&nbsp;VERACRUZ, DE EL DÍA&nbsp;{{$fecha}}. - - - - - - - - -</span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Estando en la oficinas de esta Fiscalía Sexta Orientadora, me es notificado y puesto a la vista el RESULTADO DE ACTUACIONES QUE ME FUERON BRINDADAS POR ESTA FISCALÍA Orientadora, en relación a la presente carpeta, en donde se me informa que la presente Carpeta de Investigación será turnada al Fiscal de Distrito XI en esta ciudad, previas las diligencias consistentes en girar oficio a la Delegación de la Policía Ministerial y oficio a la Dirección de Servicios Periciales para la investigación de los hechos; solicitándole al C. Fiscal de Distrito que en ejercicio de sus funciones la turne al Fiscal Investigador que corresponda, a efecto de que continúe con la integración de la misma, quedando debidamente notificado de manera personal, estando de acuerdo con la forma y modo de notificación, asimismo quedo enterado del término que establece el artículo 201 fracción VII del Reglamento de la Ley Orgánica de la Fiscalía General de Estado de Veracruz.- CONSTE. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </span></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">NOTIFICADO</span></strong></span></span></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">________________________________</span></strong></span></span></p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">C. {{$notificado}}</span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">NOTIFICA:</span></strong></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">LIC. {{$fiscal}}</span></strong></span></span></p>

<p><strong><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">{{$puesto}}</span></span></span></strong></p>

<p style="text-align:justify"><strong>&nbsp;</strong></p>

<p style="text-align:justify"><strong>&nbsp;</strong></p>

<p style="text-align:justify"><strong>&nbsp;</strong></p>
       ',

        
        'unidad'=>'1',
        'pie' =>  '<p>Circuito Rafael Guízar y<br />
        Valencia No. 147,<br />
        Colonia Reserva Territorial,<br />
        C.P. 91096<br />
        Teléfono: 01 (228) 8149428,<br />
        Xalapa-Enríquez, Veracruz</p>',
        'unidad'=>'1'],
           
           
           


   ['nombre'  =>  'MEDIDASP',
   'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
   <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />',  

   'contenido' => '<p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-size:12.0pt">NOTIFICACIÓN PERSONAL DE LA MEDIDA DE PROTECCIÓN</span></strong><span style="font-size:12.0pt">.- En la ciudad de Xalapa, Enríquez, Veracruz, siendo el día nueve de abril del año dos mil dieciocho, encontrándose presente el ciudadano {{$nombre}}<strong>,</strong> se le informa que con fundamento en el artículo </span><span style="font-size:12.0pt">137 fracciones VI, VII y VIII</span> <span style="font-size:12.0pt">del Código Nacional de Procedimientos Penales para el Estado de Veracruz, se decretó por parte de esta autoridad la medida u orden de protección,&nbsp; en su favor y de su familia consistente en: <strong>a)</strong> vigilancia a través de rondines en el domicilio que habita ubicado en la calle <strong><em>{{$calle}} {{$numExterno}} {{$colonia}}, {{$cp}}, {{$municipio}}, {{$estado}}; </em></strong>que es su lugar de domicilio; <strong>b)</strong> Protección Policial y <strong>c)</strong> la atención ante cualquier llamado de auxilio en su domicilio o en cualquier lugar que se encuentre; girándose al efecto &nbsp;Oficio <strong>{{$ejecutor}}</strong> con sede en esta ciudad, a fin de que comisione personal a su mando que corresponda y se dé cumplimiento a las medidas de protección antes mencionadas, medidas que tendrán una vigencia de <strong>{{$vigencia}} días a partir del día de hoy</strong>, así como las condiciones y limitantes para su aplicación y las circunstancias en que podrán ser revocadas, lo anterior para que manifieste lo que a su derecho convenga. Por lo que en uso de la voz el denunciante manifiesta: Que en relación a la medida de protección decretada a mi quiero señalar que estoy de acuerdo con la misma.- Con lo anterior se da por concluida&nbsp; la presente diligencia y previa lectura manifiesta que se encuentra de acuerdo con el contenido de la misma firmando al margen y al calce para constancia.- CONSTE.- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - </span></span></span></p>

   <p style="text-align:justify">&nbsp;</p>
   
   <table align="center" border="1" cellspacing="0">
       <tbody>
           <tr>
               <td style="vertical-align:top; width:220.6pt">
               <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-size:12.0pt">{{$nombre}}</span></strong></span></span></p>
               </td>
               <td style="vertical-align:top; width:232.1pt">
               <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-size:12.0pt">LIC. BRENDA XIOVARA MORENO&nbsp; ESCALANTE</span></strong></span></span></p>
   
               <p style="text-align:center">&nbsp;</p>
               </td>
           </tr>
           <tr>
               <td style="vertical-align:top; width:220.6pt">
               <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-size:12.0pt">COMPARECIENTE</span></strong></span></span></p>
               </td>
               <td style="vertical-align:top; width:232.1pt">
               <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-size:12.0pt">FISCAL&nbsp; SEXTA ORIENTADORA DE LAUNIDAD DE ATENCIÓN TEMPRANA </span></strong></span></span></p>
               </td>
           </tr>
       </tbody>
   </table>
   
   <p style="text-align:right">&nbsp;</p>
   
   <p style="text-align:right">&nbsp;</p>
   
   <p style="text-align:right">&nbsp;</p>
   
   <p style="text-align:right">&nbsp;</p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">C. SECRETARIO DE SEGURIDAD PÚBLICA</span></strong></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">DEL ESTADO DE VERACRUZ </span></strong></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Ignacio Zaragoza sin número</span></em></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Zona Centro, C.P.91000</span></em></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Xalapa, Veracruz</span></em></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Presente</span></em></span></span></p>
   
   <p>&nbsp;</p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Xalapa-Enríquez, Veracruz; a {{$fecha}}</span></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Oficio: UAT-XI/3,{{$id}}/2018</span></span></span></p>
   
   <p>&nbsp;</p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">CARPETA DE INVESTIGACION: UAT/D-XI/{{$carpeta}}/2018-6°</span></strong></span></span></p>
   
   <p><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">URGENTE</span></strong></span></span></p>
   
   <p>&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Con fundamento en los artículos 20 Apartado C, fracción VI y 21 de la Constitución Política de los Estados Unidos Mexicanos; 54 de la Constitución Política Local;&nbsp; 108, 109 fracción I, XVI y XIX, 127, 131, 132, 137 fracción IV, VI y VIII del Código Nacional de Procedimientos Penales en vigor; 1, 2 y 4 párrafo primero, 5 párrafo diecinueve, 7 fracción XXIII, 62 fracción I de la Ley General de Víctimas; 154 Quáter del Código Penal vigente en el Estado; 4, 9 fracción X y 15 último párrafo de la Ley del Sistema Estatal de Seguridad Pública; 5, &nbsp;6 fracción I y IV, 7 fracción III, IV, V y VI y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 201 fracciones I y IV&nbsp; del Reglamento de la citada Ley; por medio del pres</span><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">ente me permito solicitar a usted respetuosamente que en auxilio de esta Representación Social, designe personal a su mando, a efecto de que sea proporcionado lo siguiente:</span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">1).- Se preste la vigilancia debida a través de rondines en el domicilio que habita el C</span></strong> <strong><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">{{$nombre}} {{$numExterno}}, COLONIA {{$colonia}}, X.P.{{$cp}}, {{$municipio}}, {{$estado}}; </span></em></strong><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">con número telefónico celular {{$telefono}}.</span></strong></span></span></p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">2).- Se brinde Protección Policial al agraviado </span></strong><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">{{$nombre}}</span></strong><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">.</span></strong></span></span></p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">3).- Atención ante cualquier llamado de auxilio en su domicilio, en su centro de trabajo o en cualquier lugar que se encuentre dicho agraviado. </span></strong></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Lo anterior en virtud de que dicho agraviado, interpuso denuncia en contra de <strong>QUIEN O QUIENES RESULTEN RESPONSABLES</strong>, por el delito de<strong> AMENAZAS</strong>, por lo que en caso de que persona desconocida, intente o realice actos que pudieran ser constitutivos de delito en agravio de dichas víctimas, deberá proceder conforme a derecho corresponda. Así mismo no omito manifestarle que deberá informar sobre las acciones implementadas a la presente solicitud; medidas de protección que deberán comenzar a partir del día de la recepción del presente libelo y con duración de 60 días.</span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Sin otro particular por el momento le envío un cordial saludo.</span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Atentamente.</span></span></span></p>
   
   <p style="text-align:center">&nbsp;</p>
   
   <p style="text-align:center">&nbsp;</p>
   
   <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">LIC. BRENDA XIOVARA MORENO ESCALANTE</span></strong></span></span></p>
   
   <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Fiscal Sexta Orientadora de la Unidad de Atención Temprana</span></span></span></p>
   
   <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Trebuchet MS&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Del XI Distrito Judicial en Xalapa, Veracruz</span></span></span></p>
   
   <p>&nbsp;</p>',
       'unidad'=>'1',
       'pie' =>  '<p>Circuito Rafael Guízar y<br />
       Valencia No. 147,<br />
       Colonia Reserva Territorial,<br />
       C.P. 91096<br />
       Teléfono: 01 (228) 8149428,<br />
       Xalapa-Enríquez, Veracruz</p>',
       'unidad'=>'1'],

       ['nombre'  =>  'NOTIFICACIÓN DE ARCHIVO TEMPORAL',
            'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

            <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
            <strong>"Si lo platicamos, lo solucionamos”</strong></p>',


           'contenido' => '<p style="text-align:center"><strong><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">FISCALÍA GENERAL&nbsp; DEL ESTADO DE VERACRUZ-LLAVE</span></span></span></strong></p>

           <p style="text-align:center"><span style="font-family:Trebuchet MS,sans-serif"><span style="font-size:16px">{{$unidad}}</span></span></p>
           
           <p>&nbsp;</p>
           
           <table align="center" border="1" cellspacing="0" style="width:695px">
               <tbody>
                   <tr>
                       <td style="height:22.7pt; width:689px">
                       <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">CARPETA DE INVESTIGACIÓN: </span><strong><span style="font-size:11.5pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">{{$numeroCarpeta}}<span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:11.5pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">°</span></span></strong></span></span></span></span></strong></span></span></p>
                       </td>
                   </tr>
                   <tr>
                       <td style="height:22.7pt; width:689px">
                       <p style="text-align:center"><span style="font-family:Trebuchet MS,sans-serif"><span style="font-size:16px">{{$puesto}}</span></span></p>
                       </td>
                   </tr>
               </tbody>
           </table>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">NOTIFICACIÓN DE ARCHIVO TEMPORAL: </span></strong></span></span></p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <table align="center" border="1" cellspacing="0" style="width:723px">
               <tbody>
                   <tr>
                       <td style="vertical-align:top; width:717px">
                       <p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">Estando en las oficinas de esta Fiscalía Sexta Orientadora, me es notificado y puesto a la vista el acuerdo recaído en esta fecha, en el cual se determinó el <strong>ARCHIVO TEMPORAL</strong> de la carpeta de investigación {{$numeroCarpeta}}<span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-size:11.5pt"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">°</span></span></strong><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">, cuyo contenido leí íntegramente, quedando archivada temporalmente la presente carpeta ÚNICA Y EXCLUSIVAMENTE en cuanto se tenga alguna línea de investigación que nos permita continuar con la misma; misma determinación de la cual me doy por enterado, quedando debidamente notificado de manera personal estando de acuerdo con la forma y modo de notificación, asimismo, quedo enterado del término que establece el artículo 258 del Código Nacional de Procedimientos Penales para impugnar dicho acuerdo, sin embargo no es mi deseo hacerlo por estar ajustado a derecho, asimismo, recibo copia de la presente notificación.- Es todo lo que tiene que decir.- CONSTE. - - - - - - - - - - -&nbsp; </span></span></span></span></span></span></p>
           
                       <p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif">&nbsp;</span></span></p>
                       </td>
                   </tr>
               </tbody>
           </table>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">NOTIFICADO:</span></span></span></p>
           
           <p style="text-align:center">&nbsp;</p>
           
           <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">______________________________________</span></span></span></p>
           
           <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong>C. {{$notificado}}</strong></span></span></p>
           
           <p>&nbsp;</p>
           
           <p>&nbsp;</p>
           
           <p>&nbsp;</p>
           
           <p><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">NOTIFICA.</span></strong></span></span></p>
           
           <p style="text-align:justify">&nbsp;</p>
           
           <p style="text-align:justify">&nbsp;</p>
           
           <p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:&quot;Times New Roman&quot;,serif"><strong><span style="font-family:&quot;Trebuchet MS&quot;,&quot;sans-serif&quot;">LIC. {{$nombreC}}</span></strong></span></span></p>
           
           <p style="text-align:justify"><span style="font-family:Trebuchet MS,sans-serif"><span style="font-size:16px">{{$puesto}}</span></span></p> ',


           
           
'unidad'=>'1',
'pie' =>  '<p>Circuito Rafael Guízar y<br />
Valencia No. 147,<br />
Colonia Reserva Territorial,<br />
C.P. 91096<br />
Teléfono: 01 (228) 8149428,<br />
Xalapa-Enríquez, Veracruz</p>',
'unidad'=>'1'],
            
           
       
       ['nombre'  =>  'OFICIO FINANZAS',
   'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
   <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />',
       
   'contenido' => '<p>&nbsp;</p>

   <p style="text-align:center">&nbsp;</p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">C. SUBDIRECTOR DE REGISTRO Y CONTROL </span></span></strong></span></span></p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">DE OBLIGACIONES DE LA SEFIPLAN</span></span></strong></span></span></p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Presente</span></span></em></span></span></p>
   
   <p>&nbsp;</p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">{{$Localidad}}, Veracruz; a {{$fecha}}</span></span></span></span></p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">Oficio: UAT-XI/046/2018</span></span></span></span></p>
   
   <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro Light&quot;,&quot;sans-serif&quot;">Carpeta de Investigación: {{$numCarpeta}}-{{$numF}}°</span></span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Con fundamento en lo dispuesto por los artículos 21 de la Constitución General de la República; 54 de&nbsp; la Constitución Política Local; 108, 109, 127, 131, 212, 213, 221, y demás relativos y aplicables del Código Nacional de Procedimientos Penales vigente en la entidad; 5 párrafo primero, 6, 7 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz, y 201 del Reglamento de la citada Ley; por medio del presente me permito solicitar gire sus instrucciones a quien corresponda, a efecto de que se informe a esta Autoridad lo siguiente:</span></span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">1.- NOMBRE Y DOMICILIO DEL PROPIETARIO DEL VEHÍCULO&nbsp; MARCA {{$marca}}, LÍNEA {{$linea}}, CON PLACAS DE CIRCULACIÓN {{$placas}}, PARTICULARES DEL ESTADO DE {{$Estado}}.</span></span></strong></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">DEBIENDO REMITIR COPIA DEBIDAMENTE CERTIFICADA DE LA DOCUMENTACIÓN QUE AVALE SU INFORMACIÓN.</span></span></strong></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Lo anterior, por resultar necesario para la integración de la carpeta de investigación correspondiente.</span></span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Sin otro particular, le agradezco de antemano la atención que se sirva brindar al presente.</span></span></span></span></p>
   
   <p style="text-align:center">&nbsp;</p>
   
   <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Atentamente.</span></span></span></span></p>
   
   <p style="text-align:center">&nbsp;</p>
   
   <p style="text-align:center">&nbsp;</p>
   
   <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">LIC. {{$fiscalAtendio}}</span></span></strong></span></span></p>
   
   <p style="text-align:center"><span style="font-size:12pt"><span style="font-family:Neo Sans Pro,sans-serif">{{$puestoF}}</span></span><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif; font-size:12pt">, Veracruz</span></p>
   ' ,
       
   'unidad'=>'1',
   'pie' =>  '<p>Circuito Rafael Guízar y<br />
   Valencia No. 147,<br />
   Colonia Reserva Territorial,<br />
   C.P. 91096<br />
   Teléfono: 01 (228) 8149428,<br />
   Xalapa-Enríquez, Veracruz</p>',
   'unidad'=>'1'],
       
       

   ['nombre'  =>  'INVITACION INICIAL',
   'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
   <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />',


'contenido' =>'<table align="right" cellspacing="0" style="width:503.45pt">
<tbody>
    <tr>
        <td style="border-color:black; vertical-align:top; width:184.0pt">
        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif">&nbsp;</span></span></p>

        <p>&nbsp;</p>
        </td>
        <td style="border-color:black; vertical-align:top; width:319.4pt">
        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">INVITACIÓN INICIAL</span></span></strong></span></span></p>

        <p>&nbsp;</p>

        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">No. Carpeta de Investigación:<strong>&nbsp;{{$numCarpeta}}-{{NF}}° </strong></span></span></span></span></p>

        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Número de invitaciones:<strong> PRIMERA</strong></span></span></span></span></p>

        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">&nbsp;Xalapa, Veracruz; a 6 de abril de 2018</span></em></span></span></p>
        </td>
    </tr>
</tbody>
</table>

<p>&nbsp;</p>

<p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">DATOS DEL INVESTIGADO:</span></span></strong></span></span></p>

<table border="1" cellspacing="0" style="width:503.45pt">
<tbody>
    <tr>
        <td style="border-color:black; height:30.6pt; vertical-align:top; width:503.45pt">
        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Nombre: NANCY RUTH SANCHEZ PEREZ</span></span></strong></span></span></p>

        <p><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Domicilio: SAN CIPRIANO ESQUINA SAN MIGUEL NÚMERO 33, FRACCIONAMIENTO LOMAS DE SANTA FE, XALAPA, VERACRUZ</span></span></strong></span></span></p>
        </td>
    </tr>
</tbody>
</table>

<p>&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Por medio del presente y con fundamento en los artículos 184, 189 del Código Nacional de Procedimientos Penales, 5, 6, 14 y 15 de la Ley Nacional de Mecanismos Alternativos de Solución de Controversias en Materia Penal, y derivado de la solicitud realizada por el <strong>C. FRANCISCO HUERTA PEREZ</strong>, para solucionar a través de un método alterno el conflicto que tiene con usted en relación a<strong> DAÑOS</strong>; se le invita cordialmente a participar en una entrevista inicial que se verificará el próximo<strong> MARTES 10 DE ABRIL DE 2018</strong>, a las<strong> 10:30</strong> horas, en las instalaciones ubicadas en<strong> Circuito Guizar y Valencia No. 147, Col. Reserva Territorial, Xalapa Veracruz</strong> durante la cual se le podrá explicar lo relacionado al mecanismo alternativo y los servicios que ofrece esta Institución.</span></span></span></span></p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Se hace de su conocimiento que los métodos alternos, tales como la mediación, conciliación y junta restaurativa, son mecanismos pacíficos de solución de conflictos regulados por la Ley Nacional de Mecanismos Alternativos de Solución de Controversias en Materia Penal, enfocados a resolver las controversias de los particulares, a través del dialogo y el entendimiento, con el apoyo de un tercero neutral e imparcial, para llegar a un acuerdo voluntario entre las partes que ponga fin al conflicto planteado. Como tal, el Órgano Especializado en Mecanismos Alternativos de Solución de Controversias de la Fiscalía General del Estado ofrece este servicio de manera gratuita y confidencial. </span></span></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p><span style="font-size:12pt"><span style="font-family:Cambria,serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Se le solicita que a la entrevista acuda con identificación oficial de la manera siguiente:</span></span></span></p>

<p>&nbsp;</p>

<table border="1" cellspacing="0" style="width:498.35pt">
<tbody>
    <tr>
        <td style="border-color:black; vertical-align:top; width:497.8pt">
        <ul>
            <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Cambria,serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Credencial de elector o;</span></span></span></li>
        </ul>
        </td>
    </tr>
    <tr>
        <td style="border-color:black; vertical-align:top; width:497.8pt">
        <ul>
            <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Cambria,serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Pasaporte vigente;</span></span></span></li>
        </ul>
        </td>
    </tr>
    <tr>
        <td style="border-color:black; vertical-align:top; width:497.8pt">
        <ul>
            <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Cambria,serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">En caso de ser extranjero</span></em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;"> deberá traer la forma migratoria que acredite su legal estancia en el país;</span></span></span></li>
        </ul>
        </td>
    </tr>
    <tr>
        <td style="border-color:black; vertical-align:top; width:497.8pt">
        <ul>
            <li style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Cambria,serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">En caso de comparecer como representante o apoderado</span></em><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;"> de persona física o persona jurídica, deberá traer copia certificada de los documentos que acrediten su carácter.</span></span></span></li>
        </ul>
        </td>
    </tr>
</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:12pt"><span style="font-family:Cambria,serif"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Se le informa que se ha designado como servidor público para la atención de este servicio, a la <strong>LIC. MARÍA DEL CARMEN MORENO MUNGUÍA, Facilitadora Quinta en la Unidad de Atención Temprana en el Distrito XI Judicial en Xalapa</strong>, con quien deberá tener contacto previo a la entrevista para confirmar su asistencia, o bien señalar nueva fecha, lo cual podrá hacer directamente en las instalaciones previamente indicadas o al teléfono <strong>228-8149428</strong>. <strong>Acudir a la cita con identificación oficial (credencial para votar, CURP, acta de nacimiento y/o pasaporte en original para cotejo y copia simple de la misma.</strong></span></span></span></p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:14.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Atentamente.</span></span></span></span></p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">LIC. BRENDA XIOVARA MORENO ESCALANTE</span></span></strong></span></span></p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Fiscal Sexta Orientadora de la Unidad de Atención Temprana</span></span></span></span></p>

<p style="text-align:center"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">Del XI Distrito Judicial en Xalapa</span></span><span style="font-size:12.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,&quot;sans-serif&quot;">, Veracruz</span></span></span></span></p>
',

'unidad'=>'1',
   'pie' =>  '<p>Circuito Rafael Guízar y<br />
   Valencia No. 147,<br />
   Colonia Reserva Territorial,<br />
   C.P. 91096<br />
   Teléfono: 01 (228) 8149428,<br />
   Xalapa-Enríquez, Veracruz</p>',
   'unidad'=>'1'],
   ['nombre'  =>  'INICIO1',
   'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:100px; width:100px" /></p>
   <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br>
   <strong>"Si lo platicamos, lo solucionamos”</strong><br />
   &nbsp;</p>',


'contenido' =>'<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">En la ciudad de {{$ciudad}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">, Veracruz, siendo las<strong>&nbsp;{{$hora}}</strong>&nbsp;horas del día <strong>{{$fecha}}</strong>, el ciudadano {{$nombreC}}<span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">, {{$puesto}}</span></strong><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">, quien actúa en forma legal. &nbsp;- - - - - - - - - - - - - - - - - - - - - - -<strong> </strong>- - - - - - - - - - - - - -&nbsp;- - -- <strong>A c u e r d a: </strong>- - - - - - - - - - - - - - - - - - - - - - -<strong> </strong>- - - -- - - - - -- - - - - - - - - -- - - -Vista la denuncia por comparecencia/escrito {{$complemento1}}<strong>&nbsp;{{$denunciante}},</strong> quien pone en conocimiento de esta autoridad hechos posiblemente constitutivos de delito de<strong>&nbsp;{{$delitos}}</strong>&nbsp;en contra del Ciudadano<strong>&nbsp;{{$denunciados}}</strong>, con fundamento en lo dispuesto por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos; 54 y 67 fracción I de la Constitución Política del Estado de Veracruz; 1°,16, 127, 128, 131, 183, 212, 213, 214, 215, 216, 221 y demás relativos y aplicables del Código de Nacional de Procedimientos Penales; 5 párrafo primero, 6 fracción I y IV, 7 fracción III,IV, V, VI, y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34, 195, 201 y 206 del Reglamento de la citada Ley Orgánica, dese inicio a la Carpeta de Investigación que se impone, debiéndose registrar bajo el número que le corresponde en el libro de Gobierno con que cuenta la Unidad de Atención Temprana Número 1 del Distrito Decimo Primero, debiendo dar aviso de su inicio a la superioridad; entrevístese al denunciante y/o querellante en relación a los hechos que pone en conocimiento de esta Autoridad, lo anterior con el claro objetivo de investigar la veracidad de dicha denuncia y/o querella, debiéndose notificar los derechos que en su favor consagra el articulo 20 apartado C, de nuestra Carta Magna en relación con el 109 de la Ley Procesal Nacional, debiendo dejar constancia de la misma; <strong>así también y toda vez que los hechos denunciados se encuentran dentro de los señalados en el diverso 187 de la mencionada ley procesal, hágasele saber al agraviado la procedencia de los mecanismos alternativos de solución de controversias, asentando constancia de esto;</strong> por otra parte gírese oficio al Director de los Servicios Periciales solicitando perito en la materia a fin de que se emita dictamen pericial de<strong> {{$dictamenP}}</strong>; gírese oficio a la Policía Ministerial de este Distrito Judicial para que se avoquen a la investigación de los hechos que nos ocupan, y practíquense todas aquellas diligencias urgentes e inaplazables para el esclarecimiento de los hechos; en su momento recábense las entrevistas necesarias a todas aquellas personas<strong> </strong>que les resulte cita en relación con los hechos que se investigan, así como de las situaciones relevantes para la aplicación de la ley penal, de los autores y participes así como de las circunstancias que sirvan para verificar en su oportunidad el grado de responsabilidad de los mismos, lo anterior en estricto cumplimiento a lo señalado por la ley y bajo las premisas de la carga de la prueba y de presunción de inocencia, con el objeto de que esta Fiscalía reúna datos de prueba indiciaria para el esclarecimiento de los hechos denunciados, y en su caso, para sustentar el ejercicio o no ejercicio de la acción penal; por último, hágasele saber al denunciante el número de Carpeta de Investigación Ministerial que le corresponde.- CUMPLASE.- - -</span></span><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;"> - - - - - - - - - - - - -&nbsp;</span><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">- - - - - - - - - - - - - - - - -<strong> </strong>- - - -- - - - - -&nbsp;- - - - - - - - - - - - - - - - -<strong> </strong>- - - -- - - - - -&nbsp;- - - - - - - - - - - - - -</span></span></span></span></span></span></span></span></span></span></span></span></p>

<table align="center" border="0" cellpadding="1" cellspacing="1" style="width:700px">
	<tbody>
		<tr>
			<td style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">__________________________________</span></strong></span></span></td>
		</tr>
		<tr>
			<td style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">LIC. {{$nombreC}}</span></strong></span></span></td>
		</tr>
		<tr>
			<td style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">&nbsp;{{$puesto}}</span></strong></span></span></td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:center"><br />
&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">En la misma fecha la presente Carpeta de Investigación queda registrada bajo el número<strong>&nbsp;{{$numCarpeta}}</strong>.– CONSTE. - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;</span></span></span></p>',

'unidad'=>'1',
   'pie' =>  '<p>Circuito Rafael Guízar y<br />
   Valencia No. 147,<br />
   Colonia Reserva Territorial,<br />
   C.P. 91096<br />
   Teléfono: 01 (228) 8149428,<br />
   Xalapa-Enríquez, Veracruz</p>',
   'unidad'=>'1'],


   ['nombre'  =>  'ACUERDO REMISION',
   'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" /></p>

   <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br />
   <strong>"Si lo platicamos, lo solucionamos”</strong></p>',

   'contenido' =>'<p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">En la ciudad de <strong>{{$ciudad}}</strong>, Veracruz, siendo las<strong>&nbsp;{{$hora}}</strong>&nbsp;horas del día <strong>{{$fecha}}</strong>, el ciudadano </span></span><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">{{$fiscalAtendio}}, {{$puesto}}</span></strong><span style="font-size:12.0pt"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">, quien actúa en forma legal. </span></span><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">- - -&nbsp;</span><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">- - - - -</span><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">&nbsp;- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - <strong>A C U E R D A: </strong>- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -</span></span></span></p>

   <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:Calibri,sans-serif"><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">Vistas las diligencias de la Carpeta de Investigación número <strong>{{$numCarpeta}}</strong>, iniciada con la&nbsp; denuncia del C.<strong>{{$denunciante}},</strong> por el delito de <strong>{{$delito}}</strong> en agravio de su patrimonio y en contra de el&nbsp;C. <strong>{{$denunciado}}</strong><strong>,</strong> y toda vez que hasta el momento se han desahogado diligencias urgentes e inaplazables, así mismo se agotaron los mecanismos alternos de solución de conflictos de los cuales según informe del Facilitador _______ de esta Unidad de Atención Temprana las partes <strong>no llegaron a ningún acuerdo que permita dar por concluida la presente,</strong> en tal orden de ideas, con independencia de que posteriormente pueda de nuevo aplicarse un mecanismo alterno, resulta procedente remitir el sumario de investigación que nos ocupa a la Unidad Integral de Procuración de Justicia de este Distrito Judicial, a efecto de que el Fiscal de Distrito la turne con el Fiscal Investigador que corresponda y se continúe la secuela procesal que se impone, hasta su total integración y determinación conforme a derecho sea procedente. Lo anterior con fundamento en los diversos 21 de la Constitución Política de los Estados Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política local; 1°,16, 127, 128, 131, 212, 213, y demás relativos y aplicables del Código de Nacional de Procedimientos Penales en vigor; 5 párrafo primero, 6 fracción I y IV, 7 fracción III, IV, V, VI, y 40 de la referida Ley Orgánica de la Fiscalía General del Estado; 34, 195, 201 y 206 del Reglamento de la citada Ley Orgánica.- CUMPLASE.- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - - - - - - - - -&nbsp;- - - - - -&nbsp;- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -&nbsp;- - - - - - - - -&nbsp;- - - - -</span></span></span></p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <table align="center" border="0" cellpadding="1" cellspacing="1" style="width:500px">
       <tbody>
           <tr>
               <td style="border-color:black; vertical-align:top; width:736px">
               <p style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">__________________________________</span></strong></span></span></p>
               </td>
           </tr>
           <tr>
               <td style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">LIC.&nbsp;{{$fiscalAtendio}}</span></strong></span></span></td>
           </tr>
           <tr>
               <td style="text-align:center"><span style="font-size:10pt"><span style="font-family:&quot;Courier New&quot;"><strong><span style="font-family:&quot;Times New Roman&quot;,&quot;serif&quot;">&nbsp;{{$puesto}}</span></strong></span></span></td>
           </tr>
       </tbody>
   </table>
   
   <p style="text-align:justify">&nbsp;</p>
   
   <p>&nbsp; &nbsp; &nbsp;</p>
   ',

   'unidad'=>'1',
   'pie' =>  '<p>Circuito Rafael Guízar y<br />
   Valencia No. 147,<br />
   Colonia Reserva Territorial,<br />
   C.P. 91096<br />
   Teléfono: 01 (228) 8149428,<br />
   Xalapa-Enríquez, Veracruz</p>',
   'unidad'=>'1'],

   ['nombre'  =>  'FORMATO DE DENUNCIA',
   'encabezado'=>'<p><img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:100px; width:100px" /></p>
   <p style="text-align:right">Unidad de Atención Temprana, Veracruz&nbsp;<br>
   <strong>"Si lo platicamos, lo solucionamos”</strong><br />
   &nbsp;</p>',


'contenido' =>'
<p style="text-align:right"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><em>{{$localidad}}, VERACRUZ, A&nbsp;{{$fecha}}-{{$hora}}</em></span></span></p>

<p><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><em>La denuncia se presenta por:</em><strong> {{$tipoDenuncia}}</strong></span></span></p>

<p><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">No. de Expediente:<strong> {{$nuc}}</strong></span></span></p>

<p><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Calidad Jurídica en la que se presenta:<strong>&nbsp;{{$tipoDenunciante}}</strong></span></span></p>

<p>&nbsp;</p>

<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>a. INFORMACIÓN DEL DENUNCIANTE/QUERELLANTE</strong></span></span></p>

<table align="left" cellpadding="1" cellspacing="1" style="width:875px">
	<tbody>
		<tr>
			<td style="height:13px; width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Nombre:&nbsp;<strong>{{$denunciante}}</strong></span></span></td>
			<td style="height:13px; width:3px">&nbsp;</td>
			<td style="height:13px; width:525px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Sexo:&nbsp;<strong>{{$sexo}} </strong></span></span></td>
		</tr>
		<tr>
			<td style="width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Profesión:&nbsp;<strong>{{$ocupacion}} </strong></span></span></td>
			<td style="width:3px">&nbsp;</td>
			<td style="width:525px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Estado Civil:<strong> {{$edoCivil}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Edad<strong> {{$edad}}</strong></span></span></td>
			<td style="width:3px">&nbsp;</td>
			<td style="width:525px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Fecha de Nacimiento:<strong>{{$fechaNac}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Nacionalidad:<strong> {{$nacionalidad}}</strong></span></span></td>
			<td style="width:3px">&nbsp;</td>
			<td style="width:525px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Lugar de Nacimiento:<strong> {{$lugarNac}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Teléfono Trabajo:<strong> {{$telTrabajo}}</strong>&nbsp;</span></span></td>
			<td style="width:3px">&nbsp;</td>
			<td style="width:525px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Teléfono Particular:<strong> {{$telefono}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:329px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Correo electrónico:<strong>{{$email}}</strong></span></span></td>
			<td style="width:3px">&nbsp;</td>
			<td style="width:525px">&nbsp;</td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify"><br />
&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<table align="left" cellpadding="1" cellspacing="1" style="width:870px">
	<tbody>
		<tr>
			<td style="width:862px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Dirección:<strong> {{$direccionDenunciante}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:862px">
			<p>&nbsp;</p>

			<p><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>b. INFORMACIÓN DEL IMPUTADO(S)</strong></span></span></p>
			</td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<table align="left" cellpadding="1" cellspacing="1" style="width:881px">
	<tbody>
		<tr>
			<td style="width:416px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{$denunciante}}</strong></span></span></td>
			<td style="width:16px">&nbsp;</td>
			<td style="width:431px">&nbsp;</td>
		</tr>
		<tr>
			<td style="width:416px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">{{$alias}}</span></span></td>
			<td style="width:16px">&nbsp;</td>
			<td style="width:431px">&nbsp;</td>
		</tr>
		<tr>
			<td style="width:416px">&nbsp;</td>
			<td style="width:16px">&nbsp;</td>
			<td style="width:431px">&nbsp;</td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<table align="left" cellpadding="1" cellspacing="1" style="width:904px">
	<tbody>
		<tr>
			<td style="width:896px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>c. HECHOS</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:896px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>{{$hechos}}</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:896px">&nbsp;</td>
		</tr>
		<tr>
			<td style="width:896px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>d. DERECHOS DE LA VÍCTIMA U OFENDIDO</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:896px"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>Artículo 20 apartado C. Constitucional de los derechos de la víctima o del ofendido:</strong></span></span></td>
		</tr>
		<tr>
			<td style="width:896px">&nbsp;</td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<p style="text-align:justify">&nbsp;</p>

<table align="left" cellpadding="1" cellspacing="1" style="width:1000px">
	<tbody>
		<tr>
			<td>
			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>I.</strong> Recibir asesoría jurídica; ser informado de los derechos que en su favor establece la Constitución y, cuando lo solicite, ser informado del desarrollo del procedimiento penal;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>II.</strong> Coadyuvar con el Ministerio Público; a que se le reciban todos los datos o elementos de prueba con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que prevea la ley.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Cuando el Ministerio Público considere que no es necesario el desahogo de la diligencia, deberá fundar y motivar su negativa;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>III.</strong> Recibir, desde la comisión del delito, atención médica y psicológica de urgencia;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>IV.</strong> Que se le repare el daño. En los casos en que sea procedente, el Ministerio Público estará obligado a solicitar la reparación del daño, sin menoscabo de que la víctima u ofendido lo pueda solicitar directamente, y el juzgador no podrá absolver al sentenciado de dicha reparación si ha emitido una sentencia condenatoria.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">La ley fijará procedimientos ágiles para ejecutar las sentencias en materia de reparación del daño;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>V</strong>. Al resguardo de su identidad y otros datos personales en los siguientes casos: cuando sean menores de edad; cuando se trate de delitos de violación, secuestro o delincuencia organizada; y cuando a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>V.</strong> Al resguardo de su identidad y otros datos personales en los siguientes casos: cuando sean menores de edad; cuando se trate de delitos de violación, trata de personas, secuestro o delincuencia organizada; y cuando a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa. </span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">El Ministerio Público deberá garantizar la protección de víctimas, ofendidos, testigos y en general todos los sujetos que intervengan en el proceso. Los jueces deberán vigilar el buen cumplimiento de esta obligación;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>VI.</strong> Solicitar las medidas cautelares y providencias necesarias para la protección y restitución de sus derechos, y</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>VII.</strong> Impugnar ante autoridad judicial las omisiones del Ministerio Público en la investigación de los delitos, así como las resoluciones de reserva, no ejercicio, desistimiento de la acción penal o suspensión del procedimiento cuando no esté satisfecha la reparación del daño.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>Artículo 109 del Código Nacional de Procedimientos Penales:</strong></span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">En los procedimientos previstos en este Código, la víctima u ofendido tendrán los siguientes derechos:</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>I.</strong> A ser informado de los derechos que en su favor le reconoce la Constitución;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>II.</strong> A que el Ministerio Público y sus auxiliares, así como el Órgano jurisdiccional le faciliten el acceso a la justicia y les presten los servicios que constitucionalmente tienen encomendados con legalidad, honradez, lealtad, imparcialidad, profesionalismo, eficiencia y eficacia y con la debida diligencia;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>III.</strong> A contar con información sobre los derechos que en su beneficio existan, como ser atendidos por personal del mismo sexo, o del sexo que la víctima elija, cuando así lo requieran y recibir desde la comisión del delito atención médica y psicológica de urgencia, así como asistencia jurídica a través de un Asesor jurídico;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>IV.</strong> A comunicarse, inmediatamente después de haberse cometido el delito con un familiar, e incluso con su Asesor jurídico;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>V.</strong> A ser informado, cuando así lo solicite, del desarrollo del procedimiento penal por su Asesor jurídico, el Ministerio Público y/o, en su caso, por el Juez o Tribunal;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>VI.</strong> A ser tratado con respeto y dignidad;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>VII.</strong> A contar con un Asesor jurídico gratuito en cualquier etapa del procedimiento, en los términos de la legislación aplicable;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>VIII.</strong> A recibir trato sin discriminación a fin de evitar que se atente contra la dignidad humana y se anulen o menoscaben sus derechos y libertades, por lo que la protección de sus derechos se hará sin distinción alguna;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>IX.</strong> A acceder a la justicia de manera pronta, gratuita e imparcial respecto de sus denuncias o querellas;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>X.</strong> A participar en los mecanismos alternativos de solución de controversias;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XI.</strong> A recibir gratuitamente la asistencia de un intérprete o traductor desde la denuncia hasta la conclusión del procedimiento penal, cuando la víctima u ofendido pertenezca a un grupo étnico o pueblo indígena o no conozca o no comprenda el idioma español;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XII.</strong> En caso de tener alguna discapacidad, a que se realicen los ajustes al procedimiento penal que sean necesarios para salvaguardar sus derechos;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XIII.</strong> A qué se le proporcione asistencia migratoria cuando tenga otra nacionalidad;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XIV.</strong> A qué se le reciban todos los datos o elementos de prueba pertinentes con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que establece este Código;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">&nbsp;<strong>XV.</strong> A intervenir en todo el procedimiento por sí o a través de su Asesor jurídico, conforme lo dispuesto en este Código;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XVI.</strong> A qué se le provea protección cuando exista riesgo para su vida o integridad personal;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XVII.</strong>A solicitar la realización de actos de investigación que en su caso correspondan, salvo que el Ministerio Público considere que no es necesario, debiendo fundar y motivar su negativa;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XVIII. </strong>A recibir atención médica y psicológica o a ser canalizado a instituciones que le proporcionen estos servicios, así como a recibir protección especial de su integridad física y psíquica cuando así lo solicite, o cuando se trate de delitos que así lo requieran;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XIX.</strong> A solicitar medidas de protección, providencias precautorias y medidas cautelares;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XX.</strong> A solicitar el traslado de la autoridad al lugar en donde se encuentre, para ser interrogada o participar en el acto para el cual fue citada, cuando por su edad, enfermedad grave o por alguna otra imposibilidad física o psicológica se dificulte su comparecencia, a cuyo fin deberá requerir la dispensa, por sí o por un tercero, con anticipación;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXI.</strong> A impugnar por sí o por medio de su representante, las omisiones o negligencia que cometa el Ministerio Público en el desempeño de sus funciones de investigación, en los términos previstos en este Código y en las demás disposiciones legales aplicables;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXII. </strong>A tener acceso a los registros de la investigación durante el procedimiento, así como a obtener copia gratuita de éstos, salvo que la información esté sujeta a reserva así determinada por el Órgano jurisdiccional;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXIII.</strong> A ser restituido en sus derechos, cuando éstos estén acreditados;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXIV.</strong> A qué se le garantice la reparación del daño durante el procedimiento en cualquiera de las formas previstas en este Código;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXV. </strong>A que se le repare el daño causado por la comisión del delito, pudiendo solicitarlo directamente al Órgano jurisdiccional, sin perjuicio de que el Ministerio Público lo solicite;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXVI.</strong> Al resguardo de su identidad y demás datos personales cuando sean menores de edad, se trate de delitos de violación contra la libertad y el normal desarrollo psicosexual, violencia familiar, secuestro, trata de personas o cuando a juicio del Órgano jurisdiccional sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXVII.</strong> A ser notificado del desistimiento de la acción penal y de todas las resoluciones que finalicen el procedimiento, de conformidad con las reglas que establece este Código;</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXVIII.</strong> A solicitar la reapertura del proceso cuando se haya decretado su suspensión, y</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>XXIX.</strong> Los demás que establezcan este Código y otras leyes aplicables.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">En el caso de que las víctimas sean personas menores de dieciocho años, el Órgano jurisdiccional o el Ministerio Público tendrán en cuenta los principios del interés superior de los niños o adolescentes, la prevalencia de sus derechos, su protección integral y los derechos consagrados en la Constitución, en los Tratados, así como los previstos en el presente Código.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif">Para los delitos que impliquen violencia contra las mujeres, se deberán observar todos los derechos que en su favor establece la Ley General de Acceso de las Mujeres a una Vida Libre de Violencia y demás disposiciones aplicables.</span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><s>Me doy por enterado de los derechos que me asisten sin embargo en este momento me los reservo ya que no cuento con un abogado para nombrar como asesor pero lo haré posteriormente en caso de que yo considere necesario; por cuanto hace a los mecanismos alternos de solución de conflictos, he sido informado y orientado, comprendo los alcances y beneficios de los mismos y que proceden en mi denuncia, (SI/NO) es mi deseo someterme a ellos (ya que mi interés es que se solucione a la brevedad mi problema).</s></span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>e. NOTIFICACIÓN A TRAVÉS DE MEDIOS ELECTRÓNICOS</strong></span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><s>En términos de los artículos 83, 84 y 85 del Código Nacional de Procedimientos Penales, se pregunta al entrevistado si autoriza ser notificado vía telefónica o correo electrónico y en uso de la voz manifiesta:</s></span></span></p>

			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>&nbsp;&lt;AceptaMail&gt; </strong>expresamente la notificación por correo electrónico indicado en el apartado “<em>A”</em> como medio alternativo de comunicación.</span></span></p>
			</td>
		</tr>
		<tr>
			<td>
			<p style="text-align:justify"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>f. FIRMAS</strong></span></span></p>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>
	</tbody>
</table>

<p style="text-align:justify">&nbsp;</p>

<table cellspacing="0" style="width:901px">
	<tbody>
		<tr>
			<td style="border-color:black; vertical-align:top; width:475px">
			<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>________________________________________</strong></span></span></p>

			<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>C.{{$denunciante}}</strong></span></span></p>
			</td>
			<td style="border-color:black; vertical-align:top; width:416px">
			<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>_______________________________________</strong></span></span></p>

			<p style="text-align:center"><span style="font-size:12px"><span style="font-family:Arial,Helvetica,sans-serif"><strong>LIC. {{$fiscalAtendio}}</strong></span></span></p>
			</td>
		</tr>
	</tbody>
</table>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

<p style="text-align:center">&nbsp;</p>

<p style="text-align:right">&nbsp;</p>

',

'unidad'=>'1',
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
