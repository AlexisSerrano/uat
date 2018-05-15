<div class="row" >
	<!--nombre-->
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('nombre1', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('nombre1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-ZÁÉÑÍÓÚ][\s]*){2,100}$', 'data-validation-error-msg'=>'Nombre debe contener al menos dos letras','required']) !!}
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	<div class="col-4">
			<div class="form-group">
				{!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa', ['class' => 'col-form-label-sm']) !!}
				<input type="date" id="fechaAltaEmpresa" name="fechaAltaEmpresa" class="form-control form-control-sm", data-validation="birthdate" required>
					{{-- {!! Form::text('fechaNacimiento', null, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechanac','data-validation'=>'birthdate', 'data-validation-format'=>'dd/mm/yyyy', 'data-validation'=>'required', 'placeholder' => 'DD/MM/AAAA']) !!} --}}
				<div class="help-block with-errors"></div>	
			</div>
		</div>
	
	<!--RFC-->
	<div class="col-4">
			<div class="form-group">
					<div class="row">
				<div class="col">
			{!! Form::label('rfc1', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('rfc1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
				</div>
			<div class="col">
					{!! Form::label('homo1', 'Homo', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('homo1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
			</div>
		</div>
	</div>
	</div>
	<!--Representante legal-->
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('repLegal', 'Representante legal', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('repLegal', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required','required']) !!}
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	{{--  telefono  --}}
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('telefono1', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('telefono1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'data-validation'=>'number']) !!}
			<div class="help-block with-errors"></div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required','required']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio']))
			{!! Form::select('idMunicipio', $form['catMunicipios'], $form['idMunicipio'], ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('idMunicipio', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad']))
			{!! Form::select('idLocalidad', $form['catLocalidades'], $form['idLocalidad'], ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catColonias'],$form['idColonia']))
			{!! Form::select('idColonia', $form['catColonias'], $form['idColonia'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('idColonia', ['' => 'Colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp']))
			{!! Form::select('cp', $form['catCodigoPostal'], $form['cp'], ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('cp', ['' => 'Seleccione un CP'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('calle1', 'Calle', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('calle1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required','required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno1', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numExterno1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior', 'data-validation'=>'required','required']) !!}
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno1', 'Número interior', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('numInterno1', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('correo', 'Correo:', ['class' => 'col-form-label-sm']) !!}
			{!! Form::email('correo', null, ['class' => 'form-control form-control-sm emailc', 'placeholder' => 'Si desea recibir su folio por email','data-validation'=>'custom','data-validation-optional'=>'true','data-validation'=>'email','data-validation-error-msg'=>'Proporcione un correo válido. Ejemplo: algo@gmail.com']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idRazon1', 'Razón:', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idRazon1', $razones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una razón', 'data-validation'=>'required','required']) !!}
		</div>
	</div>
		
	<!--solo si es solicitud de hechos-->
	{{--  <div  id="tipodeActa1">
		<div class="col-12"  >
			<div class="form-group" >
					{!! Form::label('tipoActa', 'Seleccione el tipo de acta de hechos que requiere:', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('tipoActa', array('PASAPORTE' => 'PASAPORTE', 
					'CREDENCIAL DE TRABAJO/GAFFETE' => 'CREDENCIAL DE TRABAJO/GAFFETE',
					'TARJETA DE CRÉDITO/DÉBITO' => 'TARJETA DE CRÉDITO/DÉBITO',
					'TELÉFONO CELULAR' => 'TELÉFONO CELULAR',
					'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)' => 'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',
					'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS' => 'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS',
					'FACTURA DE VEHICULO/MOTOCICLETA' => 'FACTURA DE VEHICULO/MOTOCICLETA',
					'TARJETA DE CIRCULACIÓN' => 'TARJETA DE CIRCULACIÓN',
					'PLACAS DE CIRCULACIÓN' => 'PLACAS DE CIRCULACIÓN',
					'LICENCIA DE CONDUCIR ESTATAL' => 'LICENCIA DE CONDUCIR ESTATAL',
					'LICENCIA DE CONDUCIR FEDERAL' => 'LICENCIA DE CONDUCIR FEDERAL',
					'DOCUMENTO/BIEN EXTRAVIADO O ROBADO' => 'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',
					'CERTIFICADO DE ALUMBRAMIENTO' => 'CERTIFICADO DE ALUMBRAMIENTO',
					'OTROS DOCUMENTOS' => 'OTROS DOCUMENTOS'), null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
			</div>
		</div>
		<div class="col-12 otros">
			<div class="form-group">
				{!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('otro', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
				<div class="help-block with-errors"></div>
			</div>
		</div>	
	</div>  --}}
</div>


