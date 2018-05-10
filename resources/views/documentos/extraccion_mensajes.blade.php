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
    <table style="width:100%" class="editable">
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
            <td colspan="2" style="padding-bottom:10px; text-align:left;">
                C. DIRECTOR DE SERVICIOS PERICIALES</span>
             <p>  Zona Centro Xalapa
                OFICIO:<span class="noeditable">UAT-XI/3-{{$folio}}/2018</span>
            </td>
            <td colspan="2">
               
            </td>
                     <td colspan="2" style="padding-bottom:10px; text-align:left;">
                        CARPETA DE INVESTIGACION:UAT/D-XI<span class="noeditable">{{$folio2}}/2018-6° </span>
                    </td>
                    <td colspan="2" style="padding-bottom:10px; text-align:left;">
                            URGENTE
                        </td>
        </tr>
        <tr>
            <td colspan="2">
                     Para la debida integración de la carpeta de investigación al rubro señalada y con fundamento en lo dispuesto por los artículos 21 de la Constitución 
                     Política de los  Estados Unidos Mexicanos, 259, 260, 261, 272, 273 y aplicables del Código Nacional de Procedimientos Penales Vigente; de la manera más
                      atenta solicito a Usted, tenga a bien designar peritos en materia a fin de que realicen <span class="noeditable">{{$narracion}}</span>, 
                       EN EL EQUIPO CELULAR MARCA <span class="noeditable">{{$marca}}</span>, CON NÚMERO DE IMEI-<span class="noeditable">{{$imei}}</span>, de la compañía 
                       <span class="noeditable">{{$compania}}</span> con número <span class="noeditable">{{$numero}}</span>, proveniente del número <span class="noeditable">{{$numero2}}</span>; lo anterior con las formalidades de ley,
                        equipo que será puesto a la vista en esas oficinas a su digno cargo por el <span class="noeditable">{{$nombre}}</span>.




           
            </td>
        </tr>
        <tr>
                <td colspan="2">
                        No omitiendo señalar, que el Dictamen deberá ser rendir en un término de cuarenta y ocho horas,
                         a fin de darle curso legal correspondiente a la carpeta de investigación al rubro indicada.   
               
                </td>
            </tr>
       
        <tr style="text-align: center;">
            <td colspan="2">
                __________________________________________ <br>
                LIC. <span class="noeditable">{{$fiscal}}</span>
                Fiscal Sexta Orientadora de la Unidad de Atención Temprana <br>
                Del XI Distrito Judicial en Xalapa, Veracruz
            </td>
        </tr>
        
        <tr>
            <td colspan="2">
                Circuito Rafael Guízar y <br>
                Valencia No. 147, <br>
                Colonia Reserva Territorial, <br>
                C.P. 91096 <br>
                Teléfono: 01 (228) 8149428, <br>
                Xalapa-Enríquez, Veracruz
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
    $(".noeditable").attr('contenteditable', 'false');
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