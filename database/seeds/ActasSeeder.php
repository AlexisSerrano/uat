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
            'unidad'=>'1'],

            ['nombre'  =>  'circunstanciada',
            'encabezado'=>'<img alt="" src="http://gobiernoabierto.fiscaliaveracruz.gob.mx/img/logo.png" style="float:left; height:150px" />
            <p style="text-align:right">Unidad de Atención Temprana, Si lo platicamos, lo solucionamos”<br />
                        Distrito XI Xalapa, Veracruz“</p>', 
           'contenido' =>'En la ciudad de Xalapa, Veracruz, siendo las {{$hora}} horas del día {{$fecha}}, ante la
            presencia de la C. {{$fiscal}}, Fiscal Sexta Orientadora en la Unidad de Atención Temprana 
            en el Distrito XI Judicial en Xalapa, se presenta el C. {{$nombre}}, identificándose 
            con  {{$identificacion}} número {{$numIdentificacion}}, a quien en este momento se le pone
            en conocimiento de las penas con que la ley castiga el declarar con falsedad ante la autoridad,
            como lo prevé el artículo 333 del código penal vigente para el estado de Veracruz, al cual se le da
            lectura, y previa la protesta que otorga de decir la verdad, bajo su única y exclusiva responsabilidad
            por sus generales dijo: llamarse como ha quedado escrito, ser de {{$edad}} años de edad, nació en fecha 
            {{$fechaNacimiento}},  originario de {{$municipioOrigen}}, {{$estadoOrigen}}, con domicilio en la calle
            {{$calle}} {{$numExterno}}, Colonia {{$colonia}}, C.P. {{$cp}}, ocupación {{$ocupacion}}, estado civil
            {{$estadoCivil}}, grado de escolaridad {{$escolaridad}}, número telefónico {{$telefono}}, identificado
            como corresponde, esta fiscalía hace del conocimiento a quien comparece los derechos de la víctima u 
            ofendido consagrados en la Constitución Política de los Estados Unidos Mexicanos y el Código Nacional 
            de Procedimientos Penales: - - - - - - - - - - - - - - - - - - - -

           Artículo 20, apartado C de la Constitución Política de los Estados Unidos Mexicanos:
           C. De los derechos de la víctima o del ofendido:
           I. Recibir asesoría jurídica; ser informado de los derechos que en su favor establece la Constitución y, cuando lo solicite, ser informado del desarrollo del procedimiento penal;
           II. Coadyuvar con el Ministerio Público; a que se le reciban todos los datos o elementos de prueba con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que prevea la ley. Cuando el Ministerio Público considere que no es necesario el desahogo de la diligencia, deberá fundar y motivar su negativa;
           III. Recibir, desde la comisión del delito, atención médica y psicológica de urgencia;
           IV. Que se le repare el daño. En los casos en que sea procedente, el Ministerio Público estará obligado a solicitar la reparación del daño, sin menoscabo de que la víctima u ofendido lo pueda solicitar directamente, y el juzgador no podrá absolver al sentenciado de dicha reparación si ha emitido una sentencia condenatoria.
           La ley fijará procedimientos ágiles para ejecutar las sentencias en materia de reparación del daño;
           V. Al resguardo de su identidad y otros datos personales en los siguientes casos: cuando sean menores de edad; cuando se trate de delitos de violación, secuestro o delincuencia organizada; y cuando a juicio del juzgador sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa.
           El Ministerio Público deberá garantizar la protección de víctimas, ofendidos, testigos y en general todas los sujetos que intervengan en el proceso. Los jueces deberán vigilar el buen cumplimiento de esta obligación;
           VI. Solicitar las medidas cautelares y providencias necesarias para la protección y restitución de sus derechos, y
           VII. Impugnar ante autoridad judicial las omisiones del Ministerio Público en la investigación de los delitos, así como las resoluciones de reserva, no ejercicio, desistimiento de la acción penal o suspensión del procedimiento cuando no esté satisfecha la reparación del daño.
           
           Artículo 109 del Código Nacional de Procedimientos Penales.
           En los procedimientos previstos en este Código, la víctima u ofendido tendrán los siguientes derechos:
           I. A ser informado de los derechos que en su favor le reconoce la Constitución;
           II. A que el Ministerio Público y sus auxiliares así como el Órgano jurisdiccional les faciliten el acceso a la justicia y les presten los servicios que constitucionalmente tienen encomendados con legalidad, honradez, lealtad, imparcialidad, profesionalismo, eficiencia y eficacia y con la debida diligencia;
           III. A contar con información sobre los derechos que en su beneficio existan, como ser atendidos por personal del mismo sexo, o del sexo que la víctima elija, cuando así lo requieran y recibir desde la comisión del delito atención médica y psicológica de urgencia, así como asistencia jurídica a través de un Asesor jurídico;
           IV. A comunicarse, inmediatamente después de haberse cometido el delito con un familiar, e incluso con su Asesor jurídico;
           V. A ser informado, cuando así lo solicite, del desarrollo del procedimiento penal por su Asesor jurídico, el Ministerio Público y/o, en su caso, por el Juez o Tribunal;
           VI. A ser tratado con respeto y dignidad;
           VII. A contar con un Asesor jurídico gratuito en cualquier etapa del procedimiento, en los términos de la legislación aplicable;
           VIII. A recibir trato sin discriminación a fin de evitar que se atente contra la dignidad humana y se anulen o menoscaben sus derechos y libertades, por lo que la protección de sus derechos se hará sin distinción alguna;
           IX. A acceder a la justicia de manera pronta, gratuita e imparcial respecto de sus denuncias o querellas;
           X. A participar en los mecanismos alternativos de solución de controversias;
           XI. A recibir gratuitamente la asistencia de un intérprete o traductor desde la denuncia hasta la conclusión del procedimiento penal, cuando la víctima u ofendido pertenezca a un grupo étnico o pueblo indígena o no conozca o no comprenda el idioma español;
           XII. En caso de tener alguna discapacidad, a que se realicen los ajustes al procedimiento penal que sean necesarios para salvaguardar sus derechos;
           XIII. A que se le proporcione asistencia migratoria cuando tenga otra nacionalidad;
           XIV. A que se le reciban todos los datos o elementos de prueba pertinentes con los que cuente, tanto en la investigación como en el proceso, a que se desahoguen las diligencias correspondientes, y a intervenir en el juicio e interponer los recursos en los términos que establece este Código;
            XV. A intervenir en todo el procedimiento por sí o a través de su Asesor jurídico, conforme lo dispuesto en este Código;
           XVI. A que se le provea protección cuando exista riesgo para su vida o integridad personal;
           XVII.A solicitar la realización de actos de investigación que en su caso correspondan, salvo que el Ministerio Público considere que no es necesario, debiendo fundar y motivar su negativa;
           XVIII. A recibir atención médica y psicológica o a ser canalizado a instituciones que le proporcionen estos servicios, así como a recibir protección especial de su integridad física y psíquica cuando así lo solicite, o cuando se trate de delitos que así lo requieran;
           XIX. A solicitar medidas de protección, providencias precautorias y medidas cautelares;
           XX. A solicitar el traslado de la autoridad al lugar en donde se encuentre, para ser interrogada o participar en el acto para el cual fue citada, cuando por su edad, enfermedad grave o por alguna otra imposibilidad física o psicológica se dificulte su comparecencia, a cuyo fin deberá requerir la dispensa, por sí o por un tercero, con anticipación;
           XXI. A impugnar por sí o por medio de su representante, las omisiones o negligencia que cometa el Ministerio Público en el desempeño de sus funciones de investigación, en los términos previstos en este Código y en las demás disposiciones legales aplicables;
           XXII. A tener acceso a los registros de la investigación durante el procedimiento, así como a obtener copia gratuita de éstos, salvo que la información esté sujeta a reserva así determinada por el Órgano jurisdiccional;
           XXIII. A ser restituido en sus derechos, cuando éstos estén acreditados;
           XXIV. A que se le garantice la reparación del daño durante el procedimiento en cualquiera de las formas previstas en este Código;
           XXV. A que se le repare el daño causado por la comisión del delito, pudiendo solicitarlo directamente al Órgano jurisdiccional, sin perjuicio de que el Ministerio Público lo solicite;
           XXVI. Al resguardo de su identidad y demás datos personales cuando sean menores de edad, se trate de delitos de violación contra la libertad y el normal desarrollo psicosexual, violencia familiar, secuestro, trata de personas o cuando a juicio del Órgano jurisdiccional sea necesario para su protección, salvaguardando en todo caso los derechos de la defensa;
           XXVII. A ser notificado del desistimiento de la acción penal y de todas las resoluciones que finalicen el procedimiento, de conformidad con las reglas que establece este Código;
           XXVIII. A solicitar la reapertura del proceso cuando se haya decretado su suspensión, y
           XXIX. Los demás que establezcan este Código y otras leyes aplicables.
           En el caso de que las víctimas sean personas menores de dieciocho años, el Órgano jurisdiccional o el Ministerio Público tendrán en cuenta los principios del interés superior de los niños o adolescentes, la prevalencia de sus derechos, su protección integral y los derechos consagrados en la Constitución, en los Tratados, así como los previstos en el presente Código.
           Para los delitos que impliquen violencia contra las mujeres, se deberán observar todos los derechos que en su favor establece la Ley General de Acceso de las Mujeres a una Vida Libre de Violencia y demás disposiciones aplicables.
           Hecho lo anterior, bajo protesta de decir verdad, considerando el motivo de su comparecencia hacer del conocimiento de esta representación lo siguiente: - - - - - - - - - - - -  - - - - - - - - - - - - - - - -- - - - - - - “Narración de Hechos” - - - - - - - - - - - - - - - - - - - - - - - - {{$narracion}}
           CONSTE. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - . 
           
           En términos de los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos; 5, 6 fracción XI, 7 fracción II, y 40 de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 apartado A, fracción II, 195 y 201 fracción V del Reglamento de la precitada Ley Orgánica, en relación con la Circular 01/2015 inciso “a” fracción IV, V y VI emitida por el Fiscal General del Estado, esta Fiscalía Orientadora a mi cargo, tiene a bien levantar la presente, firmando por duplicado los que en ella intervienen.- - - - - - - - - - - - - - - - - - - - - - -
           
           <p style="text-align:center">Firma del Compareciente:</p>

           <p style="text-align:center">______________________________&nbsp;<br />
           <strong>C.&nbsp;</strong>{{$nombre}}</p>

           <p style="text-align:center">__________________________________________&nbsp;<br />
           <strong>LIC. </strong>{{$fiscal}}</p>

           <p style="text-align:center">Fiscal Sexta Orientadora de la Unidad de Atención Temprana&nbsp;<br />
           Del XI Distrito Judicial en Xalapa, Veracruz</p>

           <p style="text-align:center">&nbsp;</p>',
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
            '<strong>LIC. DIRECTOR GENERAL DE LOS SERVICIOS</strong>
            <strong>PERICIALES EN EL ESTADO.</strong>
            <strong>P R E S E N T E.</strong>
            
            Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados
            Unidos Mexicanos; 52 y 67 fracción I de la Constitución Política Local; 2°, 127,130, 131 fracción,
            132, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables del Código Nacional de 
            Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del
            Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la
            Ley en cita, solicito a Usted designe perito en la materia a fin de que realice peritaje de avalúo de 
            daños que presenta la unidad MARCA {{$marc}}, LÍNEA {{$linea}}, MODELO {{$modelo}}, COLOR {{$color}},
            CON NÚMERO DE SERIE {{$numero_serie}}, MOTOR HECHO EN {{$lugar_fabricacion}}, CON PLACAS DE CIRCULACIÓN
            {{$placas}} PARTICULARES DEL ESTADO DE {{$estado}}, propiedad del C. {{$nombre}}, número de celular {{$telefono}},
            vehículo que se encuentra en SU DOMICILIO ubicado en la calle {{$calle}} {{$num_ext}}, LOCALIDAD {{$localidad}},
            C.P.{{$CP}}, {{$municipio}}, {{$estado}}; a efecto de que el perito designado, realice lo ya indicado.
            No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta Unidad de
            Atención Temprana, para la debida integración de la Carpeta de Investigación al rubro referida.
            
            <p style="text-align:center">Atentamente:</p>

            <p style="text-align:center">__________________________________________&nbsp;<br />
            <strong>LIC. </strong>{{$fiscal}}</p>',

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
            'contenido' =>  '<p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">C. DIRECTOR DE SERVICIOS PERICIALES </span></strong></span></span></p>
 
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Zona Centro Xalapa</span></em></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><em><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Presente</span></em></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro Light&quot;,sans-serif">Xalapa-Enríquez, Veracruz; a {{$fecha}}</span></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro Light&quot;,sans-serif">Oficio: UAT-XI/3,{{$id}}/2017</span></span></span></p>
            
            <p>&nbsp;</p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">CARPETA DE INVESTIGACION: UAT/D-XI/{{$idCarpeta}}/2018-6°</span></strong></span></span></p>
            
            <p><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">URGENTE</span></strong></span></span></p>
            
            <p>&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Para la debida integración de la carpeta de investigación al rubro señalada y con fundamento en lo dispuesto por los artículos 21 de la Constitución&nbsp; Política de los&nbsp; Estados Unidos Mexicanos, 259, 260, 261, 272, 273 y aplicables del Código Nacional de Procedimientos Penales Vigente; de la manera más atenta solicito a Usted, tenga a bien designar peritos en materia a fin de que realicen {{$narracion}}</span><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">, EN EL EQUIPO CELULAR MARCA {{$marca}}, CON NÚMERO DE IMEI-{{$imei}}, de la compañía {{$compania}} con número {{$telefono}}, proveniente del número {{$telefono_destino}}; lo anterior con <strong>las formalidades de ley, equipo que </strong>será puesto a la vista en esas oficinas a su digno cargo por el <strong>C.</strong> <strong>{{$nombre}}</strong>.</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">No omitiendo señalar, que el </span><strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Dictamen deberá ser rendir en un término de cuarenta y ocho horas,</span></strong><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif"> a fin de darle curso legal correspondiente a la carpeta de investigación al rubro indicada.</span></span></span></p>
            
            <p style="text-align:justify">&nbsp;</p>
            
            <p style="text-align:justify"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Sin más por el momento agradezco la atención que se sirva brindar al presente.</span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Atentamente.</span></span></span></p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center">&nbsp;</p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><strong><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">LIC. BRENDA XIOVARA MORENO ESCALANTE</span></span></strong></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Fiscal Sexta Orientadora de la Unidad de Atención Temprana</span></span></span></span></p>
            
            <p style="text-align:center"><span style="font-size:11pt"><span style="font-family:&quot;Calibri&quot;,sans-serif"><span style="font-size:10.0pt"><span style="font-family:&quot;Neo Sans Pro&quot;,sans-serif">Del XI Distrito Judicial en Xalapa, Veracruz</span></span></span></span></p>
            
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
        ]);

    }
}
