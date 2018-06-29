@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Delitos</h5></div>
        </div>
    </div>
    {{-- inicio pruebas de taps con denuncuante --}}
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($delitos as $delito)
            <li class="nav-item">
                <a class="nav-link" id="delito{{$delito->idDelito}}-tab" data-toggle="tab" href="#delito{{$delito->idDelito}}" role="tab" aria-controls="delito{{$delito->idDelito}}" aria-selected="false">
                    {{$delito->delito." ".$delito->agregacion1." ".$delito->agregacion2}}
                </a>
            </li>
        @endforeach
    </ul>
    
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            @foreach ($delitos as $delito)
                <div class="tab-pane fade" id="delito{{$delito->idDelito}}" role="tabpanel" aria-labelledby="delito{{$delito->idDelito}}-tab">              
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('delito', 'Delito:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('delito', $delito->delito." ".$delito->agregacion1." ".$delito->agregacion2, ['class' => ' col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('formaComision', 'Forma de comisión:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('formaComision',$delito->formaComision, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('fecha', 'Fecha:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('fecha',$delito->fecha, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                            
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('hora', 'Hora(aproximada):', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('hora',$delito->hora, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Presento violencia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->conViolencia, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Entidad federativa:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->estado, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Municipio:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->municipio, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Localidad:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->localidad, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Colonia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->colonia, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Codigo postal:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->codigoPostal, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Calle:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->calle, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Numero externo:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->numExterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Numero interno:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->numInterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Entre calle:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->entreCalle, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Y calle:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->yCalle, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Calle trasera:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->calleTrasera, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Lugar:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->lugar, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Zona:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->zona, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('violencia', 'Punto de referencia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',$delito->puntoReferencia, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>                    
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection