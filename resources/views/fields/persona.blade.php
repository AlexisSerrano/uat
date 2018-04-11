<div class="row">
	<div class="col-12" >
		<div class="row">
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('nombres', 'Nombre', ['class' => 'necesario col-form-label-sm']) !!}
					{!! Form::text('nombres',$preregistro->nombre, ['class' => ' necesario form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
				</div>
			</div>
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('primerAp', $preregistro->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation'=>'required']) !!}
				</div>
			</div>
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('segundoAp', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('segundoAp', $preregistro->segundoAp,['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'required']) !!}
				</div>
			</div>
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('rfc', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('rfc',  $preregistro->rfc,  ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'data-validation'=>'required']) !!}
				</div>
			</div>
	
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('fechaNacimiento', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
					<div class="input-group date" id="fechanac" data-target-input="nearest">
		                {!! Form::text('fechaNacimiento',  $preregistro->fechaNac, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechanac', 'placeholder' => 'DD/MM/AAAA', 'data-validation'=>'required']) !!}
		                <span class="input-group-addon" data-target="#fechanac" data-toggle="datetimepicker">
		                    <i class="fa fa-calendar" aria-hidden="true"></i>
		                </span>
		            </div>
				</div>
			</div>
			<div class="col-1">
				<div class="form-group">
					{!! Form::label('edad', 'Edad', ['class' => 'col-form-label-sm']) !!}
					{!! Form::number('edad', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la edad', 'min' => 18, 'max' => 150, 'data-validation'=>'required']) !!}
				</div>
			</div>
				
			<div class="col-2">
				<div class="form-group">
					{!! Form::label('sexo', 'Sexo', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('sexo', ['SIN INFORMACION' => 'SIN INFORMACION', 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione el sexo','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('curp', 'C.U.R.P.', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('curp',  $preregistro->curp,['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idNacionalidad', 'Nacionalidad', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idNacionalidad', $nacionalidades, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la nacionalidad']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idEtnia', 'Etnia', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEtnia', $etnias, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la etnia']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idLengua', 'Lengua', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idLengua', $lenguas, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la lengua']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idEstadoOrigen', 'Entidad federativa de origen', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEstadoOrigen', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idMunicipioOrigen', 'Municipio de origen', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idMunicipioOrigen', ['' => 'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('telefono',$preregistro->telefono,['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('motivoEstancia', 'Motivo de estancia', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('motivoEstancia', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el motivo de estancia']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idOcupacion', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idOcupacion', $ocupaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la ocupación','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idEstadoCivil', 'Estado civil', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEstadoCivil', $estadoscivil, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione el estado civil','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idReligion', 'Religión', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idReligion', $religiones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la religión']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('idEscolaridad', 'Escolaridad', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEscolaridad', $escolaridades, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione la escoalridad','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('docIdentificacion', 'Documento de identificación', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('docIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificacion','data-validation'=>'required']) !!}
				</div>
			</div>
			
			<div class="col-3">
				<div class="form-group">
					{!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('numDocIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación']) !!}
				</div>
			</div>
		</div>
	</div>
</div>