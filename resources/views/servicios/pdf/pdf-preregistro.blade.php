<!doctype html>
    <html>
        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">

            <title>Registro</title>
            <link rel="icon" href="{{ asset('img/FGE-icon3.png') }}">

            <style> 
            label {
            font-size: 11px;

            }
            .item {
            display:block;

            width: 350px;
            height:300px;
            margin-left: 175px;
             margin-bottom: 10px;
            }
            .izquierda{
            margin-top: 15px;
            margin-left: 75px;
            font-size: 14px;
            }

            .nombre{
                margin-top: 15px;
        background: #767676; color: #ffffff; margin-top: 18px; width: 730px; height:40px;
            font-size: 14px;
            }

            .folio{
            text-align: center;
            font-size: 14px;
            margin-top: 12px;
            }
            
              .nom{
                float: left;
              margin-top: -36px;   
           
            font-size: 14px;
           color: white;
            }

            .nota{
            text-align:left;
            font-size: 8px;
            margin-left: 560px;

            }
            </style>
    </head>
         <body>

            <div class="row">    
                <div class="col-sm-1"><img src="{{ url('/img/FGE-icon.png') }}"  class="item" alt="">
                </div>
            </div>  
           

            <div>
                {{ Form::label('etiqueta', 'Circuito Rafael Guízar y Valencia No. 707, Colonia Reserva Territorial C.P. 91096
                Xalapa, Veracruz. ', array('class' => 'izquierda')) }}
            </div>  


    <table class = "nombre" >
         <tr >
            <div class ="nom">{{ $DatosRegistros[0]->nombre.' '.$DatosRegistros[0]->primerAp.' '.$DatosRegistros[0]->segundoAp }}</div>
         </tr>
    </table>

         
    <table class = "folio" >
         <tr >
            <h1>Folio: {{ $DatosRegistros[0]->folio}}</h1>
         </tr>
    </table>





    <table >
        <tr class="nota">
        <div id="nota">
            {{ Form::label('etiqueta', 'Este Folio deverá ser presentado en la audiencia', array('class' => 'nota')) }}
        </div>  
        </tr>
    </table>
 </div> 
</body>
</html>


