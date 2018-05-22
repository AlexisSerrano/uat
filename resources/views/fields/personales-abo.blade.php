<div class="row">
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('nombres', 'Nombre', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('nombres', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre',  'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('primerAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('segundoAp', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('segundoAp', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido', 'data-validation'=>'required']) !!}
		</div>
	</div>
	
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('fechaNacimiento', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
			<input type="date" id="fechaNacimiento" name="fechaNacimiento" class="persona form-control form-control-sm", data-validation="birthdate">
				{{-- {!! Form::text('fechaNacimiento', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechanac', 'data-validation'=>'required', 'placeholder' => 'AAAA/MM/DD']) !!} --}}		
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('sexo', 'Sexo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('sexo', ['SIN INFORMACIÓN' => 'SIN INFORMACIÓN', 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione el sexo', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEstadoOrigen', 'Entidad federativa de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoOrigen', $estados, 30, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idMunicipioOrigen', 'Municipio de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idMunicipioOrigen', $municipios, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione un municipio', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
				<div class="row">
			<div class="col">
		{!! Form::label('rfc', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
		{!! Form::text('rfc', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
			</div>
		<div class="col">
				{!! Form::label('homo', 'Homo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('homo', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
		</div>
	</div>
</div>
</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEstadoCivil', 'Estado civil', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoCivil', $estadoscivil, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione el estado civil', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefono', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono del abogado', 'data-validation'=>'number']) !!}
		</div>
	</div>
</div>