@extends('template.form')
@section('title','Resumen de la carpeta')
@section('content')
    @include('fields.errores')
<div class="col-12">
    <div class="row">
        {{-- <div class="col-10"> --}}
        {{-- <div class="col-10 card"> --}}
                {{-- @include('fields.resumen-carpeta.datos-carpeta') --}}
                @yield('detalle') 
        {{-- </div> --}}
    {{-- </div> --}}
        <div class="col-2">
        
        @include('fields.resumen-carpeta.botonesResumen')

    </div>
    </div>
 </div>

 @endsection
 @push('scripts')
<script src="{{ asset('js/resumen-carpeta.js') }}"></script>
@endpush
