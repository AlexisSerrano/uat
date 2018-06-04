@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
<div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Delitos</h5></div>
            <div class="col text-right">
                <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                        {!! Form::label('idDelito', 'Delito', ['class' => 'col-form-label-sm detalle']) !!}
                        {!! Form::label('delito', null, ['class' => ' col-form-label-sm']) !!}
                    </div>
                </div>
            
                <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('idAgrupacion1', ' Primera desagregación', ['class' => 'col-form-label-sm detalle']) !!}
                            {!! Form::label('agrupacion', null, ['class' => 'col-form-label-sm']) !!}
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="form-group">
                            {!! Form::label('idAgrupacion2', ' Segunda desagregación', ['class' => 'col-form-label-sm detalle']) !!}
                            {!! Form::label('idAgrupacion2',null, ['class' => 'col-form-label-sm']) !!}
                        </div>
                    </div>
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('formaComision', 'Forma de comisión', ['class' => 'col-form-label-sm detalle']) !!}
                        {!! Form::label('formaComision',null, ['class' => 'col-form-label-sm']) !!}
                    </div>
                </div>
            
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('fecha', 'Fecha', ['class' => 'col-form-label-sm detalle']) !!}
                        {!! Form::label('fecha',null, ['class' => 'col-form-label-sm']) !!}
                            
                        </div>
                </div>
                
                <div class="col-4">
                    <div class="form-group">
                        {!! Form::label('hora', 'Hora', ['class' => 'col-form-label-sm detalle']) !!}
                        {!! Form::label('hora',null, ['class' => 'col-form-label-sm']) !!}
                    </div>
                </div>
                <div class="col-4">
                        <div class="form-group">
                                {!! Form::label('violencia', 'Violencia', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('si/no',null, ['class' => 'col-form-label-sm']) !!}
                            </div>
                </div>
        
        </div>
    </div>
</div>
@endsection