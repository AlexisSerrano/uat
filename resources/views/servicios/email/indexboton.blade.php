<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=
    , initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
  
       <div class="row">
           <div class="col col-md-6 col-md-offset-3"   >
               <div class="panel panel-default">
                 <div class="panel-heading"><h3 class="panel-title">Formulario de contacto</h3></div>
                 <div class="panel-body">
                   {!! Form::open(['route' => 'correo', 'method' => 'post']) !!}
                   
                     <div class="form-group">
                         {!! Form::submit('Enviar', ['class' => 'btn btn-success ' ] ) !!}
                     </div>
                   {!! Form::close() !!}
                 </div>
               </div>
            </div>
       </div>
    </div>



</body>
</html>