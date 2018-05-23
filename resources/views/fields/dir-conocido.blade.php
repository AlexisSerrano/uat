@php
$form = oldFormConocido();
@endphp
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstadoC', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoC', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipioC', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipioC']))
			{!! Form::select('idMunicipioC', $form['catMunicipios'], $form['idMunicipioC'], ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idMunicipioC', $municipios, null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un municipio', 'data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidadC', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidadC']))
			{!! Form::select('idLocalidadC', $form['catLocalidades'], $form['idLocalidadC'], ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idLocalidadC', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColoniaC', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColoniaC']))
			{!! Form::select('idColoniaC',  $form['catColonias'], $form['idColoniaC'], ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idColoniaC', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cpC', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cpC']))
			{!! Form::select('cpC', $form['catCodigoPostal'], $form['cpC'], ['class' => 'form-control form-control-sm','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			@else
			{!! Form::select('cpC', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calleC', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calleC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExternoC', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExternoC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInternoC', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInternoC', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
</div>