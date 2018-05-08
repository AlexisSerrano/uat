<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">    <title>Document</title>
    <style>
        *{
            font-family: "NeoSans";
        }
        body{
            background-color: #F0F0F0;
        }
        .editable{
            background-color: #ffffff;
            width: 80%;
            margin-left: auto;
            margin-right: auto;
            border: 2px solid #E3E3E3;
        }
        .editable td{
            padding: 10px;
        }
        .font16{
            font-size: 16px;
        }
        .font14{
            font-size: 14px;
        }
        .font13{
            font-size: 13px;
        }
        .font10{
            font-size: 10px;
        }
        .format1{
            font-weight: bold;
            font-style: italic;
        }
        .format2{
            font-weight: bold;
            text-align: center;
            display: block;
            margin-bottom: -15px;
        }
        .noeditable{
            font-weight: bold;
        }
        .justificado{
            margin-left: 50px;
            margin-right: 50px;
            text-align : justify;
        }
        .negritas{
            font-weight: bold;
        }
        .padding td{
            padding:20px;
        }
        #imprimir{
            text-align: center;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .impre{
            padding-left: 30px;
            padding-right: 30px;
        }
    @media print {
        .impre {display:none}
        .editable{
            border: none;
            width: 100%;
        }
        }
    @page 
    {
        size:  auto;   /* auto es el valor inicial */
    }
    </style>
</head>
<body>
    <table class="editable">
        <tr style="width:50%;" class="font16 padding">
            <td>
                <img src="{{asset('img/iconofge.png')}}" alt="" style="height:120px">
            </td>
            <td style="padding-top:90px; width:50%; text-align:right;">
                Unidad de Atención Temprana, Distrito XI Xalapa, Veracruz <br>
                <span class="format1">“Si lo platicamos, lo solucionamos”</span>
            </td>
        </tr>
        <tr class="font14">
            <td colspan="2" style="padding-bottom:10px; text-align:center;">
                ACTA DE HECHOS NÚMERO <span class="noeditable">UAT-XI/AH-{{$folio}}/2018</span>
            </td>
        </tr>
        <tr class="font14">
            <td colspan="2">
                <div class="justificado">
                    En la ciudad de Xalapa, Veracruz, siendo las <span class="noeditable">{{$hora}}</span> horas del día <span class="noeditable">{{$fecha}}</span>
                    , ante la presencia de la C. licenciada <span class="noeditable">{{$fiscal}}</span>, Fiscal Sexta Orientadora de la Unidad de Atención Temprana del 
                    XI Distrito Judicial de Xalapa, Veracruz, se presenta el C. <span class="noeditable">{{$nombre}}</span>, identificándose con <span class="noeditable">{{$identificacion}}</span> CON NÚMERO 
                    DE FOLIO <span class="noeditable">{{$numIdentificacion}}</span>, EXPEDIDA POR <span class="noeditable">{{$expedido}}</span>, a quien en este momento se le pone en conocimiento de las penas con 
                    que la ley castiga el declarar con falsedad ante la autoridad, como lo prevé el artículo 333 del Código Penal vigente 
                    para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad, 
                    bajo su única y exclusiva responsabilidad por sus generales dijo <span class="noeditable">{{$nombre}}</span>, de <span class="noeditable">{{$edad}}</span> años de edad, nació en fecha 
                    <span class="noeditable">{{$fechaNacimiento}}</span>, originario de <span class="noeditable">{{$localidad}}</span>, <span class="noeditable">{{$estado}}</span>, con domicilio en la calle <span class="noeditable">{{$calle}}</span> NÚMERO <span class="noeditable">{{$numExterno}}</span>
                    , COLONIA <span class="noeditable">{{$colonia}}</span>, C.P. <span class="noeditable">{{$cp}}</span>, en la ciudad de <span class="noeditable">{{$localidad}}</span>, <span class="noeditable">{{$estado}}</span>; ocupación <span class="noeditable">{{$ocupacion}}</span>, estado civil 
                    <span class="noeditable">{{$estadoCivil}}</span>, grado de escolaridad <span class="noeditable">{{$escolaridad}}</span>, con número de teléfono <span class="noeditable">{{$telefono}}</span>, identificado como corresponde, 
                    y considerando el motivo de su comparecencia hacer del conocimiento de esta representación social lo siguiente: "<span class="noeditable">{{$narracion}}</span>" 
                    lo cual, en uso de la voz, y bajo responsabilidad explica lo siguiente:  TODO ESTO LO MANIFIESTO POR EL MAL USO QUE SE 
                    LE PUDIERE DAR - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - Lo aquí manifestado es responsabilidad de 
                    quien comparece.- en términos de lo dispuesto en los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos, 
                    2, 3 Fracción XI, 5 y 15 Fracción XII de la ley orgánica de la fiscalía general del estado de Veracruz de Ignacio de la Llave, 
                    así como 201 y 207 del reglamento de la precitada ley y la Circular 01/2015, emitida por el Fiscal General del Estado esta 
                    representación social a mi cargo tiene a bien levantar la presente, misma que se firma por duplicado, otorgando un tanto 
                    al solicitante tal como lo requiere. - - - - - -
                </div>
            </td>
        </tr>
        <tr style="text-align: center;" class="font14">
            <td colspan="2">Firma del Compareciente:</td>  
        </tr>
        <tr style="text-align: center;" class="font14">
            <td colspan="2">
                ______________________________ <br>
                <span class="negritas">C.</span> <span class="noeditable">{{$nombre}}</span>
            </td>
        </tr>
        <tr style="text-align: center;" class="font14">
            <td colspan="2">
                __________________________________________ <br>
                <span class="negritas">LIC.</span> <span class="noeditable">{{$fiscal}}</span><br>
                Fiscal Sexta Orientadora de la Unidad de Atención Temprana <br>
                Del XI Distrito Judicial en Xalapa, Veracruz
            </td>
        </tr>
        <tr class="font10">
            <td colspan="2">
                <div class="justificado">
                    <span class="format2"> AVISO DE PRIVACIDAD SIMPLIFICADO</span> <br>
                    <span class="format2"> DEL EXPEDIENTE DE ATENCIÓN TEMPRANA</span> <br>
                    <span class="negritas">La Fiscalía General del Estado de Veracruz</span>, es la responsable del tratamiento de los datos personales que nos proporcione. <br>
                    Los datos personales que recabamos a Usted, los utilizaremos para las siguientes finalidades: <br>
                    •	Identificar al usuario y conocer su problemática a fin de poder orientar en su caso, respecto a la procedencia del asunto expuesto, iniciando de ser procedente la Carpeta de Investigación correspondiente o por el contrario la canalización del ciudadano a la Unidad Integral de Procuración de Justicia, o alguna otra instancia competente; <br>
                    •	Para iniciar el expediente de atención temprana, <br>
                    •	Para la recepción de las denuncias y querellas, <br>
                    •	Para la emisión de informes. <br>
                    De manera adicional, utilizaremos su información personal para la siguiente finalidad que nos permite y facilita brindarle una mejor atención: <br>
                    •	Generación de informes estadísticos. <br>
                    En caso de que no desee que sus datos personales sean tratados para las finalidades  adicionales, Usted puede manifestarlo al correo electrónico <a href="direcciondetransparencia@fiscaliaveracruz.gob.mx">direcciondetransparencia@fiscaliaveracruz.gob.mx</a>  <br>
                    Le informamos que sus datos personales <span class="negritas">NO</span> son compartidos con personas, empresas, organizaciones y autoridades distintas al sujeto obligado, salvo que sean necesarias para atender requerimientos de información de una autoridad competente, debidamente fundados y motivados. <br>
                    Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a través de la dirección electrónica: <a href="http://fiscaliaveracruz.gob.mx"> http://fiscaliaveracruz.gob.mx </a>  
                </div>
            </td>
        </tr>
        <tr class="font13">
            <td colspan="2">
                <div class="justificado">
                    Circuito Rafael Guízar y <br>
                    Valencia No. 147, <br>
                    Colonia Reserva Territorial, <br>
                    C.P. 91096 <br>
                    Teléfono: 01 (228) 8149428, <br>
                    Xalapa-Enríquez, Veracruz
                </div>
            </td>
        </tr>
    </table>
    <div id="imprimir">
        <input type="button" value="Imprimir" onclick="window.print()" class="impre btn btn-basic btn-outline-dark"> 
    </div>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
// Al hacer click se convierte en editable
$('.editable').click(function () {
    $(this).attr('contenteditable', 'true');
    $(".noeditable").attr('contenteditable', 'false');
});

// Al salir se elimina el atributo editable
$('.editable').focusout(function(){
    $(this).removeAttr('contenteditable');
});
</script>