{{-- @php
$form = oldFormDelitos();
@endphp --}}
@if (isset($preregistro))
	{{--  FORMULARIO PARA ALTERAR vvvvvvvvvvvv  --}}
	<div class="row">
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstado', $estados, $idEstadoSelect, ['class' => ' form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catMunicipios'], $form['idMunicipio']))
				{!! Form::select('idMunicipio', $form['catMunicipios'], $form['idMunicipio'], ['class' => ' form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idMunicipio',$municipios , $idMunicipioSelect, ['class' => ' form-control form-control-sm','data-validation'=>'required','placeholder'=>'Seleccione un municipio']) !!}
				@endif
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catLocalidades'],$form['idLocalidad']))
				{!! Form::select('idLocalidad', $form['catLocalidades'], $form['idLocalidad'], ['class' => ' form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idLocalidad', $localidades, $idLocalidadSelect, ['class' => ' form-control form-control-sm','data-validation'=>'required','placeholder'=>'Seleccione una localidad']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catColonias'],$form['idColonia']))
				{!! Form::select('idColonia', $form['catColonias'], $form['idColonia'], ['class' => ' form-control form-control-sm', 'data-validation'=>'required']) !!}
				@else
				{!! Form::select('idColonia', $colonias, $idColoniaSelect, ['class' => ' form-control form-control-sm', 'data-validation'=>'required','placeholder'=>'Seleccione una colonia']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catCodigoPostal'],$form['cp']))
				{!! Form::select('cp', $form['catCodigoPostal'], $form['cp'], ['class' => ' form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('cp', $codigoPostal, $idCodigoPostalSelect, ['class' => ' form-control form-control-sm','data-validation'=>'required','placeholder'=>'Seleccione un código postal']) !!}
				@endif
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('calle', $preregistro->calle, ['class' => ' form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numExterno', $preregistro->numExterno, ['class' => ' form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno', $preregistro->numInterno, ['class' => 'dom form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
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
				{!! Form::select('idEstado', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'data-validation'=> 'required']) !!}
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catMunicipios'], $form['idMunicipio']))
				{!! Form::select('idMunicipio', $form['catMunicipios'], $form['idMunicipio'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idMunicipio', $municipios, null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un municipio','data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catLocalidades'],$form['idLocalidad']))
				{!! Form::select('idLocalidad', $form['catLocalidades'], $form['idLocalidad'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catColonias'],$form['idColonia']))
				{!! Form::select('idColonia', $form['catColonias'], $form['idColonia'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
				@else
				{!! Form::select('idColonia', ['' => 'Colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
				@endif
			</div>
		</div>
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catCodigoPostal'],$form['cp']))
				{!! Form::select('cp', $form['catCodigoPostal'], $form['cp'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				@else
				{!! Form::select('cp', ['' => 'Seleccione un CP'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
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