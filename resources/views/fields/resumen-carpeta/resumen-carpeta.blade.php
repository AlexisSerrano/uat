@extends('template.form')
@section('title','Resumen de la carpeta')
@section('content')
    @include('fields.errores')
 <div class="col">
    <div class="row">
        <div class="col-10">
            <div class="card">
                 <div class="card-header"><h5>Carpeta numero: </h5></div>
                    <div class="card-body">
                        @include('fields.datos-carpeta')
                        <div class="card">
                            
                                @include('fields.resumen-carpeta.resumen-delitos')
                            </div>
                           
                </div>
            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
                <div class="card-header"><h6>Elementos de la carpeta</h1></div>
                        <div style="width: 215px; ">
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            {{-- @forelse($oficios as $oficio) --}}
                                            <tr>
                                                <td class="btn btn denunciado" width="70%" style="text-align:left;"><span class="badge badge-info left">2</span> Denunciado </td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn denunciante" width="70%" style="text-align:left;"><span class="badge badge-info right">1</span> Denunciante </td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn abogado" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Abogado</td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn autoridad" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Autoridad</td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn delitos" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Delitos</td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn acusaciones" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Acusaciones</td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn defensa" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Defensa</td>
                                            </tr>
                                            <tr>
                                                <td class="btn btn observaciones" width="70%" style="text-align:left;"><span class="badge badge-info right">0</span> Observaciones</td>
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
<script>
 $('.denunciado').click(function(){
     console.log('denunciado');
 });
 $('.denunciante').click(function(){
     console.log('denunciante');
 });
 $('.abogado').click(function(){
     console.log('abogado');
 });
 $('.autoridad').click(function(){
     console.log('autoridad');
 });
 $('.delitos').click(function(){
     console.log('delitos');
 });
 $('.acusaciones').click(function(){
     console.log('acusaciones');
 });
 $('.defensa').click(function(){
     console.log('defensa');
 });
 $('.observaciones').click(function(){
     console.log('observaciones');
 });
</script>
@endpush