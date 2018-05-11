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
            <td colspan="2" >
                C. DIRECTOR DE SERVICIOS PERICIALES</span>
            </td>
            <td colspan="2" >
                Presente</span>
            </td>
            <td colspan="2">
                    Xalapa-Enríquez, Veracruz;<span class="noeditable">{{$fecha}}</span>
                    Oficio: UAT-XI/2,<span class="noeditable">{{$folio}}/2018-6°</span>
                </td>
             
        </tr>
        <tr>
            <td colspan="2">
                    Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos;
                     52 y 67 fracción I de la Constitución Política Local; 2°, 127, 131, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables
                      del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del Estado 
                      de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted designe perito
                       en la materia a fin de que se sirva a efecto de que se sirva realizar valoración psicológica al ciudadana <span class="noeditable">{{$nombre}}</span> con número
                        de teléfono celular <span class="noeditable">{{$numero}}</span>, quien denunciara hechos en su agravio que pudieran constituir delito, debiendo determinar el estado emocional
                         y descripción de estado psicológico, precisando si presenta:                     


           
            </td>
        </tr>
        <tr>
                <td colspan="2">
                        a) Daño psicológico. 
                        b) Efecto atemorizante y/o estado zozobra. 
                        c) Determinar si dicha persona se encuentra afectada por los hechos denunciados. 
                        d) Cuantifique el costo de la recuperación de la agraviada en caso de que ésta presente daño (AMENAZAS).           
                </td>
            </tr>

            <tr>
                    <td colspan="2">
                            No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible
                             a esta Unidad de Atención Temprana para la debida integración de la Carpeta de Investigación al rubro referida.
                              Sin otro particular aprovecho la ocasión para enviarle un cordial saludo.
                    </td>
                </tr>
                <tr style="text-align: center;">
                        <td colspan="2">ATENTAMENTE.</td>  
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