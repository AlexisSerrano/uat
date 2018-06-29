<div class="row">
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fecha2', 'Fecha de inicio de la carpeta:', ['class' => 'col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('fecha', Jenssegers\Date\Date::parse($carpeta->fechaInicio)->format('l j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!}
            </p>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fiscalAtendio', 'Fiscal que atendió:', ['class' => 'necesario col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('fiscalAtendio',$carpeta->fiscalAtendio, ['class' => '  col-form-label-sm ']) !!}
            </p>
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('unidadCarpeta', 'Unidad en la que se inició la carpeta:', ['class' => 'necesario col-form-label-sm detalle']) !!}
            <p>
                {!! Form::label('unidadCarpeta',$carpeta->descripcion, ['class' => 'col-form-label-sm']) !!}
            </p>
        </div>
    </div>
    @if (Request::is('resumen'))
        <div class="col-12">
            <div class="form-group">
                {!! Form::label('unidadCarpeta', 'Observaciones por parte del fiscal:', ['class' => 'necesario col-form-label-sm detalle']) !!}
                <p>
                    {!! Form::label('unidadCarpeta',$carpeta->descripcionHechos, ['class' => 'col-form-label-sm']) !!}
                </p>
            </div>
        </div>
    @endif
    
</div>
    