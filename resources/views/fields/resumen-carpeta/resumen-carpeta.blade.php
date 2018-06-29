@extends('template.form')
@section('title','Resumen de la carpeta')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <h5>Carpeta numero: {{$carpeta->numCarpeta}} </h5>
                        <div  class="col text-right">
                            <a href="{{ route("tabla.oficios",session('carpeta'))}}" title="Oficios para impresión" class="btn btn-secondary">Oficios <i class="fa fa-font"></i></a>
                        </div>
                    </div>
                </div>
                    
                <div class="card-body">
                    @include('fields.resumen-carpeta.datos-carpeta')
                    @yield('detalle')                           
                </div>
            </div>
        </div>
        
        @include('fields.resumen-carpeta.botonesResumen')
       
    </div>
</div>
@endsection
        
@push('scripts')
<script src="{{ asset('js/resumen-carpeta.js') }}"></script>
@endpush