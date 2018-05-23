<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('entreCalle', 'Entre calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('entreCalle',  $TipifDelito->entreCalle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese una calle perpendicular','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('yCalle', 'Y calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('yCalle', $TipifDelito->yCalle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese otra calle perpendicular','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calleTrasera', 'Calle trasera', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calleTrasera', $TipifDelito->calleTrasera, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle trasera','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idZona', 'Zona de ubicación', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idZona', $zonas, $TipifDelito->idZona, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una zona de ubicación','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLugar', 'Lugar', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idLugar', $lugares, $TipifDelito->idLugar, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un lugar','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('puntoReferencia', 'Punto de referencia', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('puntoReferencia', $TipifDelito->puntoReferencia, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese un punto de referencia', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
</div>