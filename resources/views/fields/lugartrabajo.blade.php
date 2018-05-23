<div class="row">
	<div class="col-2">
			<div class="form-group">
				{!! Form::label('sinEmpleo', 'Sin empleo', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('sinEmpleo',array('SI' => 'SI', 
				'NO' => 'NO'), null, ['class' => 'form-control form-control-sm','placeholder' => 'SI/NO','data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-6">
		<div class="form-group">
			{!! Form::label('lugarTrabajo', 'Lugar de trabajo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('lugarTrabajo', null, ['class' => 'trabajo form-control form-control-sm', 'placeholder' => 'Ingrese el lugar de trabajo.','data-validation'=> 'required']) !!}
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('telefonoTrabajo', 'Teléfono del trabajo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefonoTrabajo', null, ['class' => 'trabajo form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono del trabajo', 'data-validation'=>'custom','data-validation-optional'=>'true','data-validation'=>'length', 'data-validation-length'=>'min7','data-validation'=>'number']) !!}
		</div>
	</div>
</div>
@include('fields.direccionestrab')