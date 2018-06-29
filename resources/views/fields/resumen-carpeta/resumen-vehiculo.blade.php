@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
<div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Vehiculos involucrados</h5></div>
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
    
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            @foreach ($vehiculos as $vehiculo)
                <div class="tab-pane fade" id="vehiculo{{$vehiculo->idVehiculo}}" role="tabpanel" aria-labelledby="vehiculo{{$vehiculo->idVehiculo}}-tab">              
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('vehiculo', 'Involucrado en el delito:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('vehiculo', $vehiculo->delito." ".$vehiculo->agregacion1." ".$vehiculo->agregacion2, ['class' => ' col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('placas', 'Placas:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('placas',$vehiculo->placas, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('modelo', 'Modelo:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('SIN INFORMACION',$vehiculo->modelo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nrpv', 'NRPV:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('nrpv',$vehiculo->nrpv, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('permiso', 'Permiso:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('permiso',$vehiculo->permiso, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numSerie', 'Numero de serie:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('numSerie',$vehiculo->numSerie, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numMotor', 'Numero de motor:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('numMotor',$vehiculo->numMotor, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('estado', 'Entidad federativa:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('estado',$vehiculo->estado, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('aseguradoras', 'Aseguradora:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('aseguradoras',$vehiculo->aseguradoras, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('color', 'Color:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('color',$vehiculo->color, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('procedencia', 'Procedencia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('procedencia',$vehiculo->procedencia, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('marca', 'Marca:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('marca',$vehiculo->marca, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('submarcas', 'Sub-marca:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('submarcas',$vehiculo->submarcas, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('tipo_uso', 'Tipo de uso:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('tipo_uso',$vehiculo->tipo_uso, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>

                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('tipo_vehiculo', 'Tipo de vehiculo:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('tipo_vehiculo',$vehiculo->tipo_vehiculo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                                        
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
