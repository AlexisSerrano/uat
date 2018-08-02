@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Vehiculos involucrados</h5></div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($vehiculos as $vehiculo)
            <li class="nav-item">
                <a class="nav-link" id="vehiculo{{$vehiculo->idVehiculo}}-tab" data-toggle="tab" href="#vehiculo{{$vehiculo->idVehiculo}}" role="tab" aria-controls="vehiculo{{$vehiculo->idVehiculo}}" aria-selected="false">
                    {{$vehiculo->delito." ".$vehiculo->agregacion1." ".$vehiculo->agregacion2}}
                </a>
            </li>
        @endforeach
    </ul>
                
    <div class="card">
        <div class="tab-content" id="myTabContent">
            @foreach ($vehiculos as $vehiculo)
                <div class="tab-pane fade" id="vehiculo{{$vehiculo->idVehiculo}}" role="tabpanel" aria-labelledby="vehiculo{{$vehiculo->idVehiculo}}-tab">              
                    <table class="table table-hover">
                        <thead class="table-secondary">
                            <th colspan="2">Involucrado en el delito</th>
                            <th>Placas</th>
                            <th>Modelo</th>
                            <th>NRPV</th>
                            <TH>Permiso</TH>
                            <th>Número de serie</th>
                            <th>Número de motor</th>
                        </thead>
                        <tr>
                        <td>{{$vehiculo->delito}} {{$vehiculo->agregacion1}} {{$vehiculo->agregacion2}}</td>
                        <td>{{$vehiculo->placas}}</td>
                        <td>{{$vehiculo->modelo}}</td>
                        <td>{{$vehiculo->nrpv}}</td>
                        <td>{{$vehiculo->permiso}}</td>
                        <td>{{$vehiculo->numSerie}}</td>
                        <td>{{$vehiculo->numMotor}}</td>
                        </tr>
                        <tr class="table-active">
                            <th>Entidad federativa</th>
                            <th>Aseguradora</th>
                            <th>Color</th>
                            <th>Procedencia</th>
                            <TH>Marca</TH>
                            <th>Sub-marca</th>
                            <th>Tipo de uso</th>
                            <th>Tipo de vehiculo</th>
                        </tr>
                        <tr>
                            <td>{{$vehiculo->estado}}</td>
                            <td>{{$vehiculo->aseguradoras}}</td>
                            <td>{{$vehiculo->color}}</td>
                            <td>{{$vehiculo->procedencia}}</td>
                            <td>{{$vehiculo->marca}}</td>
                            <td>{{$vehiculo->submarcas}}</td>
                            <td>{{$vehiculo->tipo_vehiculo}}</td>
                        </tr>
                    </table>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection