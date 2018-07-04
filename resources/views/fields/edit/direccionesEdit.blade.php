
{{-- @if (isset($turnar)) --}}
	{{--  FORMULARIO PARA ALTERAR vvvvvvvvvvvv  --}}
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstadoD', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstadoD', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=> 'required', 'readonly']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipioD', 'Municipio', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catMunicipios'], $form['idMunicipioD']))
				{!! Form::select('idMunicipioD', $form['catMunicipios'], $form['idMunicipio'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idMunicipioD',  $municipios,null, ['class' => 'form-control form-control-sm','placeholder' => 'Seleccione un municipio','data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidadD', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catLocalidades'],$form['idLocalidadD']))
				{!! Form::select('idLocalidadD', $form['catLocalidades'], $form['idLocalidad'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idLocalidadD', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColoniaD', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catColonias'],$form['idColoniaD']))
				{!! Form::select('idColoniaD', $form['catColonias'], $form['idColonia'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
				@else
				{!! Form::select('idColoniaD', ['' => 'Colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cpD', 'Código postal', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catCodigoPostal'],$form['cpD']))
				{!! Form::select('cpD', $form['catCodigoPostal'], $form['cp'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('cpD', ['' => 'Seleccione un CP'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@endif
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
				{!! Form::text('numExterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			</div>
		</div>
	</div>