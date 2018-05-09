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
      
            <td colspan="2">
                    ACUERDO.- EN LA CIUDAD DE XALAPA, VERACRUZ, SIENDO <span class="noeditable">{{$fecha}}</span>.- - - - - - - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - - - - - - - -  VISTO: Que se encuentra presente la ciudadano <span class="noeditable">{{$denunciante}}</span>, quien pone en conocimiento de esta autoridad hechos constitutivos del delito de <span class="noeditable">{{$delito}}</span>, en contra de <span class="noeditable">{{$denuciado}}</span>, por lo que con fundamento en lo dispuesto por los artículos 21 de la Constitución Política de los Estados Unidos Mexicanos;
                     54 de la Constitución Política Local;  1°,16, 108, 109, 110, 113, 115, 127, 128, 131, 132,  211, 212, 213, 214, 215, 216, 217, 221 y demás relativos y aplicables del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial; 5 párrafo primero, 6 fracción I y IV, 7 fracción III, IV, V y VI de la Ley Orgánica de la Fiscalía General del Estado de Veracruz de Ignacio de la Llave; 34 Apartado A fracción I, Apartado B fracción I y Apartado C fracciones I: II; III y IV del Reglamento de la citada Ley, por lo que se:
                      - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - A C U E R D A - - - - - - - - -  - - - - - - - - - - - - - - - - - -    PRIMERO.- Dese inicio a la carpeta de investigación  que se impone, debiéndose registrar bajo el número que le corresponde en el libro de Gobierno que tiene la Unidad de Atención Temprana Número 1 del Distrito Decimo Primero, debiendo dar aviso de su inicio a la superioridad.- - - - - - - SEGUNDO.-
                       Entrevístese al Denunciante y/o querellante en relación a los hechos que pone en conocimiento de esta Autoridad, lo anterior con el claro objetivo de investigar la veracidad de dicha denuncia y/o querella, debiéndosele notificar al denunciante los derechos que en su favor consagra el articulo 20 apartado C, de la Constitución General de la Republica en relación con el artículo 109 del Código Nacional de Procedimientos Penales vigente en este Distrito Judicial, debiendo dejar constancia de la misma. - - - - - - - - - - - - - - -
                        -- - - - - - - - - -- - - - - - - -  TERCERO.-Practíquense todas aquellas diligencias urgentes e inaplazables para el esclarecimiento de los hechos, así como de las situaciones relevantes para la aplicación de la ley penal, de los autores y partícipes, así como de las circunstancias que sirvan para verificar en su oportunidad el grado de responsabilidad de los mismos, lo anterior en estricto cumplimiento a lo señalado por la ley bajo las premisas de la carga de la prueba y de presunción de inocencia, con el objeto de que esta
                         Fiscalía reúna datos de prueba indiciaria para el esclarecimiento de los hechos que se denuncian, y en su caso, para sustentar el ejercicio o no de la acción penal que podría llegar a ejercitarse. - - - -- - - - - - - - - -- - - - - - - - - -- - - - - - - - - - - - - - - - - - - - CUARTO.- Hágasele saber al denunciante el número de Carpeta de Investigación Ministerial que le corresponde y realícense las diligencias necesarias de conformidad con el artículo 201 fracción II y IV 207 Fracción I del Reglamento de la Ley Orgánica 
                         de la Fiscalía General del Estado.- CÚMPLASE.- - - - - - - - - - - - - - - - -- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -- - - - - - - - -   
           
            </td>
        </tr>
      
       
    <tr style="text-align: center;">
        <td colspan="2">
          
            LIC. <span class="noeditable">{{$fiscal}}</span>
            FISCAL SEXTA ORIENTADORA <br>
            EN LA UNIDAD DE ATENCION TEMPRANA
        </td>
    </tr>
    <tr>
            <td colspan="2">
                    CONSTANCIA.- En la misma fecha la presente Carpeta de Investigación queda registrada bajo el número  UAT/D-XI/<span class="noeditable">{{$folio}}</span>/2018-6°. - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -  
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