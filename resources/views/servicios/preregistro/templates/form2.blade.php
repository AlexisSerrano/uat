@extends('servicios.preregistro.templates.main2')

@section('csss')
{{-- estilos --}}
<link rel="stylesheet" href="{{asset ('css/estilosWeb.css')}}">
<link rel="stylesheet" href="{{asset ('css/cssfonts.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('css/tempusdominus-bootstrap-4.min.css') }}"> --}}
{{-- validator --}}
<link rel="stylesheet" href="{{ asset('css/theme-jquery-validation.min.css') }}">
@yield('css')
@endsection

@section('contenido')
<div class="row">
    <div class="col-md-12">
        @yield('content')
    </div>
</div>
    
@endsection
        
@section('pilaScripts')
    <script src="{{ asset('js/moment.min.js') }}"></script>
    <script src="{{asset('js/es.js')}}"></script>
    {{-- <script src="{{ asset('js/tempusdominus-bootstrap-4.min.js') }}"></script> --}}
    <script src="{{asset('js/semaforos.js')}}"></script>  
    <script src="{{asset('js/selectsDirecciones.js')}}"></script>  
    <script src="{{asset('js/funciones.js')}}"></script>
    <script>
        


        $(document).on('focus', '.select2', function (e) {
        if (e.originalEvent) {
            $(this).siblings('select').select2('open');
        }
    });

    $.validate({
        lang : 'es'
    });


    </script>

@stack('scripts')
@endsection