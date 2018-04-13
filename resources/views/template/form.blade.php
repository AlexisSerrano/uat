@extends('template.main')

@section('csss')
<link rel="stylesheet" href="{{asset ('css/cssfonts.css')}}">
<link rel="stylesheet" href="{{asset ('css/estilos.css')}}">
<link rel="stylesheet" href="{{ asset('plugins/fileinput/css/fileinput.min.css') }}">
{{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">   --}}
<link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
{{-- <link rel="stylesheet" href="https://rawcdn.githack.com/Romaincks/assets/master/dist/css/bootstrap.css"><!---bootstrap modificado--> --}}
@yield('css')
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="container">
                {{-- <div class="container"> --}}
                    @yield('content')
                {{-- </div> --}}
            </div>
        </div>
    </div>
</div>
{{-- 
@if(isset($acusaciones))
@else
    @isset($idCarpeta)
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title text-center">@yield('titulo-tabla')</h5>
                    </div>
                    @yield('tabla')
                </div>
            </div>
        </div>
    @endif
@endif
 --}}

@endsection

@section('pilaScripts')
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>  --}}
    <script src="{{ asset('js/es.js') }}"></script>
    <script src="{{ asset('js/jquery.form-validator.min.js')}}" ></script>
    <script src="{{ asset('plugins/fileinput/js/fileinput.min.js')}}" ></script>
    <script src="{{ asset('plugins/fileinput/themes/fa/theme.min.js')}}" ></script>
    <script src="{{ asset('plugins/fileinput/js/locales/es.js')}}" ></script>
    <script src="{{asset('js/semaforos.js')}}"></script>  
    {{-- <script src="{{asset('js/selectsDirecciones.js')}}"></script>   --}}
    <script src="{{asset('js/selects.js')}}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    <script src="{{asset('js/funciones.js')}}"></script>

    
    <script>
    $.validate({
            lang : 'es'
        });
        
    </script>

    @stack('scripts')
@endsection