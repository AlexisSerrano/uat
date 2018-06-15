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
        <title>Error login</title>
    </head>
<body class="error-notf">
        <div class="conteiner">
            <div class="error-body text-center">
                <h1 class="not-found">ERROR</h1>
                <h3 class="text-uppercase">FALTA DE DATOS</h3>
                <div class="col">

                    <p class="text-uppercase text-muted">No te puedes loguear porque no tienes un número de fiscal asignado o no estas asignado a una unidad, favor de verificar su información con recursos humanos para que se refleje en el sistema o comunicarse con soporte técnico del centro de información de la fiscalía.</p>
                    <p class="text-uppercase text-muted">Por favor inténtelo más tarde, gracias.</p>
                    
                    <a href="{{route('login')}}" class="btn btn-outline-dark btn-rounded waves-effect waves-light">Volver al Inicio</a>
                    {{-- <a class="btn btn-outline-dark btn-rounded waves-effect waves-light" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();" >
                    Volver al Inicio
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form> --}}
                </div>
            </div>
        </div>

    {{-- <script src="{{asset('errors/js/main.js')}}"></script> <!-- to-top jQuery --> --}}
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>