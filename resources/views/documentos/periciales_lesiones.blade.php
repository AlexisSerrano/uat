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
             <td colspan="2">
              C. DIRECTOR DE SERVICIOS PERICIALES DEL ESTADO
              Presente
              </td>   
              <td colspan="2">
              Xalapa-Enríquez, Veracruz; <span class="noeditable">{{$fecha}}</span>
              Oficio: UAT-XI/2,<span class="noeditable">{{$folio}}</span>/2018-6°
              </td>          
        </tr>
        <tr>
            <td colspan="2">
                    Con fundamento en lo dispuesto por los artículos 14, 16 y 21 de la Constitución Política de los Estados Unidos Mexicanos;
                     52 y 67 fracción I de la Constitución Política Local; 2°, 127, 131, 212, 214, 272, 273, 368, 369 y demás relativos y aplicables
                      del Código Nacional de Procedimientos Penales en vigor; 2, 5, 6, 7, 39, 40 y 43 de la Ley Orgánica de la Fiscalía General del
                       Estado de Veracruz de Ignacio de la Llave, 1, 4, 34, 126, 128, 150, 195 y 201 del Reglamento de la Ley en cita, solicito a Usted
                        designe perito en la materia a fin de que se sirva examinar clínicamente a la C. <span class="noeditable">{{$folio}}</span>,
                         y se determine lo siguiente:
                    1. Su orden de esfera neurológico.
                    2. Si presenta huellas de lesiones, su naturaleza, ubicación y clasificación.
                    3. Tiempo de evolución de la lesión.
                    Asimismo, deberá cuantificar el monto de la reparación del daño consistente en las medicinas, las consultas médicas, la prótesis, la rehabilitación y todo aquello que sea necesario al caso para la total recuperación de las lesiones sufridas, en base al conocimiento y los datos que se tenga al momento, siempre en el entendido de que, si posteriormente se cuenta con mayor evolución de las mismas, se realizarán las adecuaciones pertinentes.
                    Debiendo rendir el dictamen solicitado a la mayor brevedad, toda vez que resulta necesario para lograr la debida integración del expediente al rubro citado. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo y afectuoso.
                    

           
            </td>
        </tr>
        <tr>
                <td colspan="2">
                        No omitiendo señalar, que el dictamen respectivo deberá ser rendido a la mayor brevedad posible a esta Unidad de Atención Temprana, para la debida integración de la Carpeta de Investigación al rubro referida. Sin otro particular aprovecho la ocasión para enviarle un cordial saludo.
                    
  
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