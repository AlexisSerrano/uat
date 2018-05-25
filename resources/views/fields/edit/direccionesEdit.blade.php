
{{-- @if (isset($turnar)) --}}
	{{--  FORMULARIO PARA ALTERAR vvvvvvvvvvvv  --}}
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=>'required', 'id'=>"idEstado"]) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			
				{!! Form::select('idMunicipio', [], null,  ['class' => 'form-control form-control-sm','data-validation'=>'']) !!}
			
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				
				{!! Form::select('idLocalidad',[], null, ['class' => 'form-control form-control-sm','data-validation'=>'']) !!}
		
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
				
				{!! Form::select('cp', [], null, ['class' => 'form-control form-control-sm','data-validation'=>'']) !!}
				
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				
				{!! Form::select('idColonia',[], null,  ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
				
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('calle', '' , ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numExterno', '' , ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno', '' , ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div>
	</div>