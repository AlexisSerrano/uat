<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- bootstrap -->
        <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
        <!-- icons-fontawesome -->
        <link rel="stylesheet" href="{{asset('plugins/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">
        <!-- custom style -->
        <link rel="stylesheet" href="{{asset('errors/style.css')}}">
        <!-- tipografía oficial -->
        <link rel="stylesheet" href="{{asset('errors/css/font-neosans.css')}}">
        <title>Error 500</title>
    </head>
<body class="error-notf">
        <div>
                <div class="error-body text-center">
                    <h1 class="not-found">500</h1>
                    <h3 class="text-uppercase">Error interno en el servidor</h3>
                    <p class="text-uppercase text-muted">La pagina no esta disponible actualmente.</p>
                    <p class="text-uppercase text-muted">Por favor inténtelo más tarde.</p>
                    <a href="{{route('home')}}" class="btn btn-outline-dark btn-rounded waves-effect waves-light">Volver al Inicio</a> </div>
             </div>






    {{-- <script src="js/main.js"></script> <!-- to-top jQuery --> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>