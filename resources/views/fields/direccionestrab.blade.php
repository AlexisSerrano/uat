{{-- @php
$form = oldFormTrabajo();
@endphp --}}
<div class="row">
	<div class="col-4">
		<div class="form-group custom">
			{!! Form::label('idEstado2', 'Entidad federativa', ['class' => ' idEstado2 col-form-label-sm']) !!}
			{!! Form::select('idEstado2', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio2', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio2']))
			{!! Form::select('idMunicipio2', $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm', 'required']) !!}
			@else
			{!! Form::select('idMunicipio2', $municipios, null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un municipio', 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidad2', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad2']))
			{!! Form::select('idLocalidad2',$form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idLocalidad2', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColonia2', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColonia2']))
			{!! Form::select('idColonia2',  $form['catColonias'], $form['idColonia2'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idColonia2', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp2']))
			{!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('cp2', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calle2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno2', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior']) !!}
		</div>
	</div>
</div>