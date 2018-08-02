@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Delitos</h5></div>
            </div>
        </div>
    </div> 
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($delitos as $delito)
            <li class="nav-item">
                <a class="btn btn-secondary nav-link" style="color:aliceblue" id="delito{{$delito->idDelito}}-tab" data-toggle="tab" href="#delito{{$delito->idDelito}}" role="tab" aria-controls="delito{{$delito->idDelito}}" aria-selected="false">
                    {{$delito->delito." ".$delito->agregacion1." ".$delito->agregacion2}}
                </a>
            </li>
        @endforeach
    </ul>
        
    <div class="card">
        <div class="tab-content" id="myTabContent">
            @foreach ($delitos as $delito)
                <div class="tab-pane fade" id="delito{{$delito->idDelito}}" role="tabpanel" aria-labelledby="delito{{$delito->idDelito}}-tab">              
                    <table class=" table table-hover">
                        <thead class="table-secondary">
                            <th>Delito</th>
                            <th>Forma de comisión</th>
                            <th>Fecha</th>
                            <th>Hora(aproximada)</th>
                            <th>Entidad federativa</th>
                            <th>Municipio</th>
                        </thead>
                        <tr>
                            <td>{{$delito->delito}} {{$delito->agregacion1}} {{$delito->agregacion2}}</td>
                            <td>{{$delito->formaComision}}</td>
                            <td>{{$delito->fecha}}</td>
                            <td>{{$delito->hora}}</td>
                            <td>{{$delito->estado}}</td>
                            <td>{{$delito->municipio}}</td>
                        </tr>
                        <tr class="table-active">
                            <th>Localidad</th>
                            <th>Colonia</th>
                            <th>Codigo postal</th>
                            <th>Calle</th>
                            <th>Numero externo</th>
                            <th>Numero interno</th> 
                        </tr>
                        <tr>
                            <td>{{$delito->localidad}}</td>
                            <td>{{$delito->colonia}}</td>
                            <td>{{$delito->codigoPostal}}</td>
                            <td>{{$delito->calle}}</td>
                            <td>{{$delito->numExterno}}</td>
                            <td>{{$delito->numInterno}}</td>
                        </tr>
                        <tr class="table-active">
                            <th>Entre calle</th>
                            <th>Y calle</th>
                            <th>Calle trasera</th>
                            <th>Lugar</th>
                            <th>Zona</th>
                            <th>Punto de referencia</th>
                        </tr>
                        <tr>
                            <td>{{$delito->numInterno}}</td>
                            <td>{{$delito->entreCalle}}</td>
                            <td>{{$delito->yCalle}}</td>
                            <td>{{$delito->lugar}}</td>
                            <td>{{$delito->zona}}</td>
                            <td>{{$delito->puntoReferencia}}</td>
                        </tr>
                    </table> 
                </div>
            @endforeach
        </div>
    </div>
</div>
    
@endsection
