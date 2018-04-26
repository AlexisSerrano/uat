<div class="row">
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm labelCambioNombre']) !!}
			{!!Form::label('nombre',$preregistro->nombre ,['class'=> 'col-form-label-sm labelCambioNombre'])!!}
			<div class="input-group inputOculto" id="inputNombre">
				{!! Form::text('nombres', $preregistro->nombre, ['class' => 'form-control  form-control-sm', 'placeholder' => 'Ingrese el nombre','required']) !!}
				<input type="button" id="botonCambioNombre" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm labelCambioPrimerAp']) !!}
			{!!Form::label('nombre',$preregistro->primerAp ,['class'=> 'col-form-label-sm labelCambioPrimerAp'])!!}
			<div class="input-group inputOculto" id="inputPrimerAp">
				{!! Form::text('primerAp',$preregistro->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','required']) !!}
				<input type="button" id="botonCambioPrimerAp" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('segundoAp', 'Segundo apellido: ', ['class' => 'col-form-label-sm labelCambioSegundoAp']) !!}
			{!!Form::label('nombre',$preregistro->segundoAp ,['class'=> 'col-form-label-sm labelCambioSegundoAp'])!!}
			<div class="input-group inputOculto" id="inputSegundoAp">
				{!! Form::text('segundoAp', $preregistro->segundoAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido']) !!}
				<input type="button" id="botonCambioSegundoAp" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm labelCambioRfc']) !!}
			{!!Form::label('nombre',$preregistro->rfc ,['class'=> 'col-form-label-sm labelCambioRfc'])!!}
			<div class="input-group inputOculto" id="inputRfc">
				{!! Form::text('rfc', $preregistro->rfc, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'required']) !!}
				<input type="button" id="botonCambioRfc" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm labelCambioFechaNac']) !!}
			{!!Form::label('nombre',$preregistro->fechaNac ,['class'=> 'col-form-label-sm labelCambioFechaNac'])!!}
			<div class="input-group inputOculto" id="inputFechaNac">
				<div class="input-group date" id="fechanac" data-target-input="nearest">
					{!! Form::text('fechaNacimiento', $preregistro->fechaNac, ['class' => 'form-control form-control-sm datetimepicker-input', 'data-target' => '#fechanac', 'required']) !!}
					<div class="input-group-append" data-target="#fechanac" data-toggle="datetimepicker">
						<div class="input-group-text"><i class="fa fa-calendar"></i></div>
					</div>
					
				</div>
			</div>
			<div class="help-block with-errors"></div>	
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('edad', 'Edad: ', ['class' => 'col-form-label-sm labelCambioEdad']) !!}
			{!!Form::label('nombre',$preregistro->edad ,['class'=> 'col-form-label-sm labelCambioEdad'])!!}
			<div class="input-group inputOculto" id="inputEdad">
				{!! Form::number('edad', $preregistro->edad, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la edad', 'min' => 0, 'max' => 150, 'required']) !!}
				<input type="button" id="botonCambioEdad" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
		
	</div>
	
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm labelCambioSexo']) !!}
			{!!Form::label('nombre',$preregistro->sexo ,['class'=> 'col-form-label-sm labelCambioSexo'])!!}
			<div class="input-group inputOculto" id="inputSexo">
				{!! Form::select('sexo', ['SIN INFORMACION' => 'SIN INFORMACION', 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], $preregistro->sexo, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione el sexo', 'required']) !!}
				<input type="button" id="botonCambioSexo" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<!--telefono-->
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm labelCambioTelefono']) !!}
			{!!Form::label('nombre',$preregistro->telefono ,['class'=> 'col-form-label-sm labelCambioTelefono'])!!}
			<div class="input-group inputOculto" id="inputTelefono">
				{!! Form::text('telefono', $preregistro->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'required']) !!}
				<input type="button" id="botonCambioTelefono" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm labelCambioCurp']) !!}
			{!!Form::label('nombre',$preregistro->curp ,['class'=> 'col-form-label-sm labelCambioCurp'])!!}
			<div class="input-group inputOculto" id="inputCurp">
				{!! Form::text('curp', $preregistro->curp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.']) !!}
				<input type="button" id="botonCambioCurp" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>


	{{--  direccion  --}}
	{{--  V V V V V  --}}

	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
			{!!Form::label('nombre',$nombreEstado ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
			<div class="input-group inputOculto" id="inputDireccionEstado">
				{!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required','disabled']) !!}
			</div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
			{!!Form::label('nombre',$nombreMunicipio ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
			<div class="input-group inputOculto" id="inputDireccionMunicipio">
				{!! Form::select('idMunicipio', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div>
		</div>
	</div>

	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
			{!!Form::label('nombre',$nombreLocalidad ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
			<div class="input-group inputOculto" id="inputDireccionLocalidad">
				{!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div>
		</div>
	</div>
			
	<!--Codigo Postal-->
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
			{!!Form::label('nombre',$nombreCP ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
			<div class="input-group inputOculto" id="inputDireccionCp">
				{!! Form::select('cp', ['' => 'Seleccione un CP'], null, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div>
		</div>
	</div>

		<!--colonia-->
	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
			{!!Form::label('nombre',$nombreColonia ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
			<div class="input-group inputOculto" id="inputDireccionColonia">
				{!! Form::select('idColonia', ['' => 'Colonia'], null, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
				<input type="button" id="botonCambioDireccion" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>
	{{--  A A A A A  --}}
	{{--  ---------  --}}

		<!--CALLE-->
	<div class="col-7">
		<div class="form-group">
			{!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm labelCambioCalle']) !!}
			{!!Form::label('nombre',$direccionTB[0]->calle ,['class'=> 'col-form-label-sm labelCambioCalle'])!!}
			<div class="input-group inputOculto" id="inputCalle">
				{!! Form::text('calle',$direccionTB[0]->calle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'required']) !!}
				<input type="button" id="botonCambioCalle" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>
		<!--Numero exterior-->
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno', 'Número exterior: ', ['class' => 'col-form-label-sm labelCambioNumExterno']) !!}
			{!!Form::label('nombre',$direccionTB[0]->numExterno ,['class'=> 'col-form-label-sm labelCambioNumExterno'])!!}
			<div class="input-group inputOculto" id="inputNumExterno">
				{!! Form::text('numExterno', $direccionTB[0]->numExterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior', 'required']) !!}
				<input type="button" id="botonCambioNumExterno" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno1', 'Número interior: ', ['class' => 'col-form-label-sm labelCambioNumInterno']) !!}
			{!!Form::label('nombre',$direccionTB[0]->numInterno ,['class'=> 'col-form-label-sm labelCambioNumInterno'])!!}
			<div class="input-group inputOculto" id="inputNumInterno">
				{!! Form::text('numInterno',$direccionTB[0]->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'required']) !!}
				<input type="button" id="botonCambioNumInterno" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm labelCambioDoc']) !!}
			{!!Form::label('nombre',$docIdent ,['class'=> 'col-form-label-sm labelCambioDoc'])!!}
			<div class="input-group inputOculto" id="inputDoc">
				{!! Form::select('docIdentificacion',$identificaciones,null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','required']) !!}
				<input type="button" id="botonCambioDoc" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación: ', ['class' => 'col-form-label-sm labelCambioDocIden']) !!}
			{!!Form::label('nombre',$preregistro->numDocIdentificacion ,['class'=> 'col-form-label-sm labelCambioDocIden'])!!}
			<div class="input-group inputOculto" id="inputDocIden">
				{!! Form::text('numDocIdentificacion', $preregistro->numDocIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación']) !!}
				<input type="button" id="botonCambioDocIden" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('idRazon', 'Razón:', ['class' => 'col-form-label-sm labelCambioRazon']) !!}
			{!!Form::label('nombre',$razon ,['class'=> 'col-form-label-sm labelCambioRazon'])!!}
			<div class="input-group inputOculto" id="inputRazon">
				{!! Form::select('idRazon', $razones, $preregistro->idRazon, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una razón', 'data-validation'=> 'required']) !!}
				<input type="button" id="botonCambioRazon" value="Cancelar" class="btn btn-sm btn-danger">
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
</div>