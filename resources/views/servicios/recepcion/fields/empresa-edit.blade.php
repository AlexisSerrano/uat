<div class="form-group">
	<div class="form-row" >
		<!--nombre-->
		<div class="col-5">
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
	<!--Representante legal-->
	<div class="col-5">
			<div class="form-group">
				{!! Form::label('repLegal', 'Nombre representante legal: ', ['class' => 'col-form-label-sm labelCambioRepLegal','valid-tooltip']) !!}
				{!!Form::label('nombre',$preregistro->representanteLegal ,['class'=> 'col-form-label-sm labelCambioRepLegal'])!!}
			<div class="input-group inputOculto" id="inputRepLegal">
					{!! Form::text('repLegal', $preregistro->representanteLegal, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','required']) !!}
					<input type="button" id="botonCambioRepLegal" value="Cancelar" class="btn btn-sm btn-danger">
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
						{!! Form::text('segundoAp', $preregistro->segundoAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
						<input type="button" id="botonCambioSegundoAp" value="Cancelar" class="btn btn-sm btn-danger">
					</div>
				</div>
			</div>

		<!--RFC-->
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
		
		<!--telefono-->
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('telefono', 'Teléfono: ', ['class' => 'col-form-label-sm labelCambioTelefono']) !!}
				{!!Form::label('nombre',$preregistro->telefono ,['class'=> 'col-form-label-sm labelCambioTelefono'])!!}
				<div class="input-group inputOculto" id="inputTelefono">
					{!! Form::text('telefono', $preregistro->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'required']) !!}
					<input type="button" id="botonCambioTelefono" value="Cancelar" class="btn btn-sm btn-danger">
				</div>
				<div class="help-block with-errors"></div>
			</div>
		</div>

		{{--  direccion  --}}
		{{--  V V V V V  --}}

		<div class="col-5">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
				{!!Form::label('nombre',$nombreEstado ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
				<div class="input-group inputOculto" id="inputDireccionEstado">
					{!! Form::select('idEstado', $estados, $idEstadoSelect, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required','disabled']) !!}
				</div>
			</div>
		</div>
		<div class="col-5">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
				{!!Form::label('nombre',$nombreMunicipio ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
				<div class="input-group inputOculto" id="inputDireccionMunicipio">
					{!! Form::select('idMunicipio', $catMunicipios, $idMunicipioSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
				</div>
			</div>
		</div>

		<div class="col-5">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
				{!!Form::label('nombre',$nombreLocalidad ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
				<div class="input-group inputOculto" id="inputDireccionLocalidad">
					{!! Form::select('idLocalidad', $catLocalidades, $idLocalidadSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
				</div>
			</div>
		</div>
				
		<!--Codigo Postal-->
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
				{!!Form::label('nombre',$nombreCP ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
				<div class="input-group inputOculto" id="inputDireccionCp">
					{!! Form::select('cp', $catCodigoPostal, $idCodigoPostalSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
				</div>
			</div>
		</div>

			<!--colonia-->
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm labelCambioDireccion']) !!}
				{!!Form::label('nombre',$nombreColonia ,['class'=> 'col-form-label-sm labelCambioDireccion'])!!}
				<div class="input-group inputOculto" id="inputDireccionColonia">
					{!! Form::select('idColonia', $catColonias, $idColoniaSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
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
					{!! Form::text('numInterno',$direccionTB[0]->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
					<input type="button" id="botonCambioNumInterno" value="Cancelar" class="btn btn-sm btn-danger">
				</div>
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
			</div>
		</div>
	</div>
</div>