@if (isset($turnar))
	{{--  FORMULARIO PARA ALTERAR vvvvvvvvvvvv  --}}
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'MuniciLLpio', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idMunicipio', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('cp', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idColonia', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('calle', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numExterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'data-validation'=>'required']) !!}
			</div>
		</div>
	</div>
	{{--  formulario para alterar AAAAAAAAAAAAAAAA  --}}
@else
{{--  Formulario en blanco no tocar  --}}

	<div class="row">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=> 'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idMunicipio', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código Postal', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('cp', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idColonia', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('calle', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numExterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior']) !!}
			</div>
		</div>
	</div>
@endif