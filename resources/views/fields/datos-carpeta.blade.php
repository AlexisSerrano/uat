<div class="row">

    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fecha2', 'Fecha de inicio de la carpeta', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="fechaCarpeta" data-target-input="nearest">
                {!! Form::date('fecha2', null , ['class' => 'form-control form-control-sm', 'data-target' => '#fechaCarpeta', 'required', 'placeholder' => 'DD/MM/AAAA', 'id'=>'fecha2']) !!}
				<span class="input-group-addon" data-target="#fechaCarpeta">
                    <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
				</span>
			</div>
		</div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('fiscalAtendio', 'Fiscal que atendió', ['class' => 'necesario col-form-label-sm']) !!}
            {!! Form::text('fiscalAtendio',null, ['class' => '  form-control form-control-sm ','data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
        </div>
    </div>
    <div class="col-4">
            <div class="form-group">
                {!! Form::label('unidadCarpeta', 'Unidad en la que se inició la carpeta', ['class' => 'necesario col-form-label-sm']) !!}
                {!! Form::text('unidadCarpeta',null, ['class' => '  form-control form-control-sm ','data-validation'=>'custom' ,'data-validation' =>'length','data-validation-length' =>'min2', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
            </div>
        </div>
    
</div>
    