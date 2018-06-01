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
                            <div class="card-header">
                                    <div class="row">
                                        <div class="col text-left"><h5>Denunciante</h5></div>
                                        <div class="col text-right">
                                            <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <card class="card-body">
                                    @include('tables.resumen-denunciado')
                                </card>
                            </div>
                           
                </div>
            </div>
        </div>
        
        <div class="col-2">
            <div class="card">
                <div class="card-header"><h6>Elementos de la carpeta</h1></div>
                    <div class="col-12"  >  
                        <div style="width: 215px; overflow: auto;">
                            <div class=" panel panel-default">
                                <div class="panel-body">
                                    <table class="table table-hover">
                                        <tbody>
                                            {{-- @forelse($oficios as $oficio) --}}
                                            <tr>
                                                <td class="" width="100%">Denunciado</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Denunciante</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Abogado</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Autoridad</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Delitos</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Acusaciones</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Defensa</td>
                                            </tr>
                                            <tr>
                                                <td class="" width="100%">Observaciones</td>
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
        </div>
           
            
            
@endsection
@push('scripts')
<script>

</script>
@endpush