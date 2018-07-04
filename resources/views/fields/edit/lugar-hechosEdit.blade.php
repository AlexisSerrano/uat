<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('entreCalleD', null,  ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('entreCalleD', null , ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle perpendicular','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('yCalleD', 'Y calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('yCalleD', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese otra calle perpendicular','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calleTraseraD', 'Calle trasera', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calleTraseraD', null , ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle trasera','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
			<div class="form-group">
				{!! Form::label('idZonaD', 'Zona de ubicación', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idZonaD', $zonas, null, ['class' => ' lugarH form-control form-control-sm', 'placeholder' => 'Seleccione una zona de ubicación','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLugarD', 'Lugar', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idLugarD', $lugares, null, ['class' => 'lugarH form-control form-control-sm', 'placeholder' => 'Seleccione un lugar','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('puntoReferenciaD', 'Punto de referencia', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('puntoReferenciaD', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese un punto de referencia', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
</div>