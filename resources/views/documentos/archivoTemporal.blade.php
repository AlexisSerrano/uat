<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{asset ('css/app.css')}}">
    <title>Document</title>
</head>
<body>
    <div id="app">
        <oficio tipo="NOTIFICACIÓN DE ARCHIVO TEMPORAL" url="{{url("impresion-archivoTemporal")}}" id="{{$id}}"></oficio>
    </div>
</body>
</html>
<script src="{{asset ('js/jquery-3.2.1.min.js')}}">  </script>
<script src="{{asset ('js/app.js')}}">  </script>