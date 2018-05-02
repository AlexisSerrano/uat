<div class="row">
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('nombres', 'Nombre', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('nombres', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('primerAp', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido', 'data-validation'=>'required']) !!}
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
			{!! Form::label('rfc', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('rfc', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('fechaNacimiento', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
			<input type="date" id="fechaNacimiento" name=" persona fechaNacimiento" class="form-control form-control-sm", data-validation="birthdate">
			{{-- <div class="input-group date" id="fechanac" data-target-input="nearest">
                {!! Form::text('fechaNacimiento', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechanac', 'required', 'placeholder' => 'AAAA/MM/DD']) !!}
                <span class="input-group-addon" data-target="#fechanac" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
                </span>
            </div> --}}
		</div>
	</div>
	<div class="col-3">
		<div class="row">	
			<div class="col">
				<div class="form-group">
					{!! Form::label('sexo', 'Sexo', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('sexo', ['SIN INFORMACION' => 'SIN INFORMACION', 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione el sexo', 'required']) !!}
				</div>
			</div>
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('curp', 'C.U.R.P.', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('curp', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idNacionalidad', 'Nacionalidad', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idNacionalidad', $nacionalidades, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione la nacionalidad', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEtnia', 'Etnia', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEtnia', $etnias, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione la etnia', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idLengua', 'Lengua', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idLengua', $lenguas, null, ['class' => ' persona form-control form-control-sm', 'placeholder' => 'Seleccione la lengua', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEstadoOrigen', 'Entidad federativa de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoOrigen', $estados, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idMunicipioOrigen', 'Municipio de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idMunicipioOrigen', ['' => 'Seleccione un municipio'], null, ['class' => 'persona form-control form-control-sm', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefono', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('motivoEstancia', 'Motivo de estancia', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('motivoEstancia', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el motivo de estancia','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idOcupacion', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idOcupacion', $ocupaciones, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione la ocupación', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEstadoCivil', 'Estado civil', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoCivil', $estadoscivil, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione el estado civil', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idReligion', 'Religión', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idReligion', $religiones, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione la religión', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('idEscolaridad', 'Escolaridad', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEscolaridad', $escolaridades, null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione la escoalridad', 'required']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('docIdentificacion', 'Documento de identificación', ['class' => 'col-form-label-sm']) !!}
			{{-- {!! Form::select('docIdentificacion',$identificaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificacion', 'data-validation'=>'required']) !!} --}}
			{!! Form::text('docIdentificacion', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificacion','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numDocIdentificacion', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación', 'data-validation'=>'required']) !!}
		</div>
	</div>
</div>

{{--<div id="accordion" role="tablist">
	<div class="card">
		<div class="card-header" role="tab" id="headingGenerales">
			<h5 class="mb-0">
				<a data-toggle="collapse" href="#collapseGen" aria-expanded="true" aria-controls="collapseGen">
					Datos personales
				</a>
			</h5>
		</div>
		<div id="collapseGen" class="collapse show boxcollapse" role="tabpanel" aria-labelledby="headingGenerales" data-parent="#accordion">
			<div class="boxtwo">
				@include('fields.personales')
			</div>
		</div>
	</div>
</div>--}}