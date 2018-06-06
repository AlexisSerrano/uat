<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
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

    <table  class="editable">
        <tr style="width:50%;" class="font16 padding">
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
                C. DIRECTOR DE SERVICIOS PERICIALES
                <br>  Zona Centro Xalapa
                <p> Presente </p>
                
                <p>Xalapa-Enriquez, Veracruz;<span class="noeditable">{{$fecha}}
                <br> OFICIO:<span class="noeditable">UAT-XI/3-{{$folio}}/2018</span>
            </td>
        </tr>
        <tr>
                     <td colspan="2" style="padding-bottom:10px; text-align:left;">
                        <p>CARPETA DE INVESTIGACION:UAT/D-XI<span class="noeditable">{{$folio2}}/2018-6° </span>
                        <br>URGENTE
                    </td>
                
                    </tr>
        <tr>
            <td colspan="2" class="justificado">
                     Para la debida integración de la carpeta de investigación al rubro señalada y con fundamento en lo dispuesto por los artículos 21 de la Constitución 
                     Política de los  Estados Unidos Mexicanos, 259, 260, 261, 272, 273 y aplicables del Código Nacional de Procedimientos Penales Vigente; de la manera más
                      atenta solicito a Usted, tenga a bien designar peritos en materia a fin de que realicen <span class="noeditable">{{$narracion}}</span>, 
                       EN EL EQUIPO CELULAR MARCA <span class="noeditable">{{$marca}}</span>, CON NÚMERO DE IMEI-<span class="noeditable">{{$imei}}</span>, de la compañía 
                       <span class="noeditable">{{$compania}}</span> con número <span class="noeditable">{{$numero}}</span>, proveniente del número <span class="noeditable">{{$numero2}}</span>; lo anterior con las formalidades de ley,
                        equipo que será puesto a la vista en esas oficinas a su digno cargo por el <span class="noeditable">{{$nombre}}</span> <span class="noeditable">{{$primerAp}}</span> <span class="noeditable">{{$segundoAp}}</span>.



                </div>
           
            </td>
        </tr>
        <tr>
                <td colspan="2">
                        No omitiendo señalar, que el Dictamen deberá ser rendir en un término de cuarenta y ocho horas,
                         a fin de darle curso legal correspondiente a la carpeta de investigación al rubro indicada. <br><br><br><br><br> 
               
                </td>
            </tr>
       
        <tr style="text-align: center;" class="font14">
            <td colspan="2">
                __________________________________________ <br>
                LIC. <span class="noeditable">{{$fiscal}}</span>
                Fiscal Sexta Orientadora de la Unidad de Atención Temprana <br>
                Del XI Distrito Judicial en Xalapa, Veracruz
            </td>
        </tr>
        
        <tr class="font13">
            <td>
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
    <div ID="imprimir">
    <input type="button" value="Imprime esta pagina" onclick="window.print()" class="impre"> 
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