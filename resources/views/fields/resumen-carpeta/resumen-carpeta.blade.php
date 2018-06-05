@extends('template.form')
@section('title','Resumen de la carpeta')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-10">
            <div class="card">
                 <div class="card-header"><h5>Carpeta numero: {{$carpeta->numCarpeta}} </h5></div>
                    <div class="card-body">
                        @include('fields.datos-carpeta')
                        @yield('detalle')                           
                </div>
            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
                <div class="card-header"><h6>Elementos de la carpeta</h1></div>
                        <div>
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table">
                                        <tbody>
                                            {{-- @forelse($oficios as $oficio) --}}
                                            <tr>
                                                <td style="padding:0; text-align:left;">
                                                    <a style="width:100%;text-align:left;" class="btn btn-default denunciado" href="{{route('resumen.denunciado')}}">
                                                    <span class="badge badge-info left">2</span> Denunciado </a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default denunciante" href="{{route('resumen.denunciante')}}">
                                                    <span class="badge badge-info right">1</span> Denunciante </td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default abogado" href="{{route('resumen.abogado')}}">
                                                            <span class="badge badge-info right">0</span> Abogado </a></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default autoridad" href="{{route('resumen.autoridad')}}"><span class="badge badge-info right">0</span> Autoridad </a></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default delitos" href="{{route('resumen.delito')}}"><span class="badge badge-info right">0</span> Delitos</a></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default acusaciones" href="{{route('resumen.acusaciones')}}"><span class="badge badge-info right">0</span> Acusaciones</a></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default defensa" href="{{route('resumen.defensa')}}"><span class="badge badge-info right">0</span> Defensa</a></td>
                                            </tr>
                                            <tr>
                                                <td style="padding:0;text-align:left;">
                                                        <a style="width:100%;text-align:left;" class="btn btn-default observaciones" href="{{route('resumen.observaciones')}}"><span class="badge badge-info right">0</span> Observaciones</a></td>
                                            </tr>
                                            {{-- @empty --}}
                                            
                                            {{-- @endforelse --}}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>  
                    </div>
                </div>
         </div>
           
            
            
@endsection
@push('scripts')
<script src="{{ asset('js/resumen-carpeta.js') }}"></script>
<script>
 
</script>
@endpush