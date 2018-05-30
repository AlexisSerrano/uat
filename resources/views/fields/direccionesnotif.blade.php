{{-- @php
$form = oldFormNoti();
@endphp --}}
@if (isset($preregistro))
<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstado3', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstado3', $estados, $idEstadoSelect, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio3', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio3']))
			{!! Form::select('idMunicipio3', $form['catMunicipios'], $form['idMunicipio3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idMunicipio3', $municipios, $idMunicipioSelect, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un municipio','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidad3', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad3']))
			{!! Form::select('idLocalidad3', $form['catLocalidades'], $form['idLocalidad3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idLocalidad3', $localidades, $idLocalidadSelect, ['class' => 'form-control form-control-sm','data-validation'=> 'required','placeholder'=>'Seleccione una localidad']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColonia3', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColonia3']))
			{!! Form::select('idColonia3', $form['catColonias'], $form['idColonia3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idColonia3', $colonias, $idColoniaSelect, ['class' => 'form-control form-control-sm','data-validation'=> 'required','placeholder'=>'Seleccione una colonia']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp3', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp3']))
			{!! Form::select('cp3', $form['catCodigoPostal'], $form['cp3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('cp3', $codigoPostal, $idCodigoPostalSelect, ['class' => 'form-control form-control-sm','data-validation'=> 'required','placeholder'=>'Seleccione un código postal']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calle3', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calle3', $preregistro->calle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno3', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExterno3', $preregistro->numExterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno3', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInterno3', $preregistro->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
</div>
@else

<div class="row">
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstado3', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstado3', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio3', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio3']))
			{!! Form::select('idMunicipio3', $form['catMunicipios'], $form['idMunicipio3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idMunicipio3', $municipios, null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un municipio','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidad3', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad3']))
			{!! Form::select('idLocalidad3', $form['catLocalidades'], $form['idLocalidad3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idLocalidad3', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColonia3', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColonia3']))
			{!! Form::select('idColonia3', $form['catColonias'], $form['idColonia3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('idColonia3', ['' => 'Seleccione una colonia'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp3', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp3']))
			{!! Form::select('cp3', $form['catCodigoPostal'], $form['cp3'], ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@else
			{!! Form::select('cp3', ['' => 'Seleccione un código postal'], null, ['class' => 'form-control form-control-sm','data-validation'=> 'required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calle3', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calle3', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle','data-validation'=> 'required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno3', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExterno3', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno3', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInterno3', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
</div>
@endif