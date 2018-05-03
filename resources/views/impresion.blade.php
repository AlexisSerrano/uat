<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
    <style>
    @media print {
        .impre {display:none}
        }
    @page 
    {
        size:  auto;   /* auto es el valor inicial */
    }
    </style>
</head>
<body>
    <table style="width:100%">
        <tr style="width:50%;">
            <td>
                <img src="{{asset('img/iconofge.png')}}" alt="" style="height:100px">
            </td>
            <td style="padding-top:52px; width:50%; text-align:right;">
                Unidad de Atención Temprana, Distrito XI Xalapa, Veracruz <br>
                “Si lo platicamos, lo solucionamos”
            </td>
        </tr>
        <tr>
            <td colspan="2" style="padding-bottom:10px; text-align:center;">
                ACTA DE HECHOS NÚMERO UAT-XI/AH-730/2018
            </td>
        </tr>
        <tr>
            <td colspan="2">
            <span class="editable">
            En la ciudad de Xalapa, Veracruz, siendo las 
            </span>
            {{$hora}} 
            <span class="editable">
            horas del día
            </span>
            {{$fecha}}
            <span class="editable">
            , ante la presencia de la C. licenciada 
            </span>
            {{$fiscal}}
            <span class="editable">
            , Fiscal Sexta Orientadora de la Unidad de Atención Temprana del XI Distrito Judicial de Xalapa, Veracruz, se presenta el C. 
            </span>
            {{$nombre}}
            <span class="editable">
            , identificándose con 
            </span>
            {{$identificacion}}
            <span class="editable">
             CON NÚMERO DE FOLIO 
            </span>
             {{$numIdentificacion}}
             <span class="editable">
            , EXPEDIDA POR 
             </span>
             {{$expedido}}
             <span class="editable">
            , a quien en este momento se le pone en conocimiento de las penas con 
            que la ley castiga el declarar con falsedad ante la autoridad, como lo prevé el artículo 333 del Código Penal vigente 
            para el estado de Veracruz, al cual se le da lectura, y previa la protesta que otorga de decir la verdad, 
            bajo su única y exclusiva responsabilidad por sus generales dijo 
             </span>
            {{$nombre}}
            <span class="editable">
            , de 
            </span>
            {{$edad}}
            <span class="editable">
             años de edad, nació en fecha 
            </span>
             {{$fechaNacimiento}}
             <span class="editable">
            , originario de 
             </span>
             {{$localidad}}, {{$estado}}
             <span class="editable">
            , con domicilio en la calle 
             </span>
             {{$calle}}
             <span class="editable">
              NÚMERO 
             </span>
              {{$numExterno}}
              <span class="editable">
            , COLONIA 
              </span>
              {{$colonia}}
              <span class="editable">
            , C.P.
              </span>
              {{$cp}}
              <span class="editable">
            , en la ciudad de 
              </span>
              {{$localidad}}, {{$estado}}
              <span class="editable">
            ; ocupación 
              </span>
            {{$ocupacion}}
            <span class="editable">
            , estado civil 
            </span>
            {{$estadoCivil}}
            <span class="editable">
            , grado de escolaridad 
            </span>
            {{$escolaridad}}
            <span class="editable">
            , con número de teléfono 
            </span>
            {{$telefono}}
            <span class="editable">
            , identificado como corresponde, y considerando el motivo de su comparecencia hacer del conocimiento de esta representación social lo siguiente:
            </span>
            "{{$narracion}}"
            <span class="editable"> lo cual, en uso de la voz, y bajo responsabilidad explica lo 
            siguiente:  TODO ESTO LO MANIFIESTO POR EL MAL USO QUE SE LE PUDIERE DAR - - - - - - - - - - - - - - - - - - - - - - - - - - 
            - - - - - - Lo aquí manifestado es responsabilidad de quien comparece.- en términos de lo dispuesto en los artículos 
            21 de la Constitución Política de los Estados Unidos Mexicanos, 2, 3 Fracción XI, 5 y 15 Fracción XII de la ley orgánica 
            de la fiscalía general del estado de Veracruz de Ignacio de la Llave, así como 201 y 207 del reglamento de la precitada ley 
            y la Circular 01/2015, emitida por el Fiscal General del Estado esta representación social a mi cargo tiene a bien levantar 
            la presente, misma que se firma por duplicado, otorgando un tanto al solicitante tal como lo requiere. - - - - - -
            </span>
            </td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="2"><span class="editable">Firma del Compareciente:</span></td>  
        </tr>
        <tr style="text-align: center;">
            <td colspan="2">
                ______________________________ <br>
                C. {{$nombre}}
            </td>
        </tr>
        <tr style="text-align: center;">
            <td colspan="2">
                __________________________________________ <br>
                LIC. {{$fiscal}}
                <div class="editable">
                    Fiscal Sexta Orientadora de la Unidad de Atención Temprana <br>
                    Del XI Distrito Judicial en Xalapa, Veracruz
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="editable">
                AVISO DE PRIVACIDAD SIMPLIFICADO <br>
                DEL EXPEDIENTE DE ATENCIÓN TEMPRANA <br>
                La Fiscalía General del Estado de Veracruz, es la responsable del tratamiento de los datos personales que nos proporcione. <br>
                Los datos personales que recabamos a Usted, los utilizaremos para las siguientes finalidades: <br>
                •	Identificar al usuario y conocer su problemática a fin de poder orientar en su caso, respecto a la procedencia del asunto expuesto, iniciando de ser procedente la Carpeta de Investigación correspondiente o por el contrario la canalización del ciudadano a la Unidad Integral de Procuración de Justicia, o alguna otra instancia competente; <br>
                •	Para iniciar el expediente de atención temprana, <br>
                •	Para la recepción de las denuncias y querellas, <br>
                •	Para la emisión de informes. <br>
                De manera adicional, utilizaremos su información personal para la siguiente finalidad que nos permite y facilita brindarle una mejor atención: <br>
                •	Generación de informes estadísticos. <br>
                En caso de que no desee que sus datos personales sean tratados para las finalidades  adicionales, Usted puede manifestarlo al correo electrónico direcciondetransparencia@fiscaliaveracruz.gob.mx <br>
                Le informamos que sus datos personales  NO son compartidos con personas, empresas, organizaciones y autoridades distintas al sujeto obligado, salvo que sean necesarias para atender requerimientos de información de una autoridad competente, debidamente fundados y motivados. <br>
                Para mayor información acerca del tratamiento y de los derechos que puede hacer valer, usted puede acceder al aviso de privacidad integral a través de la dirección electrónica: http://fiscaliaveracruz.gob.mx/
                </div>
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <div class="editable">
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
    <input type="button" value="Imprime esta pagina" onclick="window.print()" class="impre"> 
</body>
</html>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script>
// Al hacer click se convierte en editable
$('.editable').click(function () {
    $(this).attr('contenteditable', 'true');
});

// Al salir se elimina el atributo editable
$('.editable').focusout(function(){
    $(this).removeAttr('contenteditable');
});
</script>
{{-- <style>
/* Propiedades .editable */
.editable {
    width:500px;
    height:50px;
    border:1px #ccc solid;
    padding:5px;
}

/* Cambiar style de objetos con contenteditable=true */
[contenteditable="true"]{box-shadow:0px 0px 5px #3cF;}

/* Quitar linea naranja onFocus (Chrome) */
*:focus {outline: none;}
</style> --}}