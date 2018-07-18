<div class="row">
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->nombre ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputNombre">
				{!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('nombres', $preregistro->nombre, ['class' => 'form-control  form-control-sm', 'placeholder' => 'Ingrese el nombre','required']) !!}				
			</div>
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->primerAp ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputPrimerAp">
				{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm ']) !!}
				{!! Form::text('primerAp',$preregistro->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','required']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('segundoAp', 'Segundo apellido: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->segundoAp ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputSegundoAp">
				{!! Form::label('segundoAp', 'Segundo apellido: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('segundoAp', $preregistro->segundoAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'custom','data-validation-optional'=>'true']) !!}				
			</div>
		</div>
	</div>
	
	<!--RFC CON HOMOCLAVE-->
	<div class="col-4">
		<div class="form-group">
			<div class="row">
				<div class="col">
					{!! Form::label('rfc2', 'R.F.C. :', ['class' => 'col-form-label-sm ']) !!}
					{!!Form::label('rfc2',substr($preregistro->rfc,0,10) ,['class'=> 'col-form-label-sm hideLabels'])!!}
					{!! Form::text('rfc2', substr($preregistro->rfc,0,10), ['class' => 'form-control form-control-sm inputOculto', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
				</div>
				<div class="col">
					{!! Form::label('homo2', 'Homoclave :', ['class' => 'col-form-label-sm ']) !!}
					{!!Form::label('homo2',substr($preregistro->rfc,10,3) ,['class'=> 'col-form-label-sm hideLabels'])!!}
					{!! Form::text('homo2', substr($preregistro->rfc,10,3), ['class' => 'form-control form-control-sm inputOculto', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
				</div>
			</div>
		</div>
	</div>
<!--FIN RFC CON  HOMOCLAVE-->
	
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->fechaNac ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputFechaNac">
				{!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm']) !!}				
				{!! Form::date('fechaNacimiento', $preregistro->fechaNac, ['class' => 'form-control form-control-sm', 'data-target' => '#fechanac', 'required']) !!}					
			</div>
			<div class="help-block with-errors"></div>	
		</div>
	</div>
	{{-- <div class="col-2">
		<div class="form-group">
			{!! Form::label('edad', 'Edad: ', ['class' => 'col-form-label-sm labelCambioEdad']) !!}
			{!!Form::label('nombre',$preregistro->edad ,['class'=> 'col-form-label-sm labelCambioEdad'])!!}
			<div class="input-group inputOculto" id="inputEdad">
				{!! Form::number('edad', $preregistro->edad, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la edad', 'min' => 0, 'max' => 150, 'required']) !!}
			</div>
			<div class="help-block with-errors"></div>
		</div>
		
	</div>
	 --}}
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->sexo ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputSexo">
				{!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('sexo', ['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], $preregistro->sexo, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione el sexo', 'required']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>


	<!--EstadoOrigen-->
	<div class="col-4">
			<div class="form-group">			
				{!! Form::label('idEstadoOrigen', 'Estado de origen: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!! Form::label('nombre', $estadoOrigen->nombre, ['class' => 'col-form-label-sm hideLabels']) !!}			
				<div class="input-group inputOculto" id="inputEstadoOrigen">
					{!! Form::label('idEstadoOrigen', 'Estado de origen', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEstadoOrigen', $estados, $MunicipioOrigen->idEstado, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required','required']) !!}	
				</div>			
			</div>
		</div>
	<!--Municipio Origen-->
	<div class="col-5">
			<div class="form-group">
				{!! Form::label('idMunicipioOrigen', 'Municipio origen: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$MunicipioOrigen->nombre ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputMunicipioOrigen">
					{!! Form::label('idMunicipioOrigen', 'Municipio de origen: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idMunicipioOrigen', $catMunicipios, $preregistro->idMunicipioOrigen, ['class' => 'form-control form-control-sm', 'required']) !!}					
				</div>
			</div>
		</div>


		 
	<!--telefono-->
	<div class="col-3">
		<div class="form-group">
			{!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->telefono ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputTelefono">
				{!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm']) !!}				
				{!! Form::text('telefono', $preregistro->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'required']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->curp ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputCurp">
				{!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('curp', $preregistro->curp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.']) !!}				
			</div>
		</div>
	</div>


	{{--  direccion  --}}
	{{--  V V V V V  --}}

	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$nombreEstado ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDireccionEstado">
				{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idEstado', $estados, $idEstadoSelect, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required','disabled']) !!}
			</div>
		</div>
	</div>
	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$nombreMunicipio ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDireccionMunicipio">
				{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idMunicipio', $catMunicipios, $idMunicipioSelect , ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div>
		</div>
	</div>

	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$nombreLocalidad ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDireccionLocalidad">
				{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idLocalidad', $catLocalidades, $idLocalidadSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div> 
		</div>
	</div>
			
	<!--Codigo Postal-->
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$nombreCP ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDireccionCp">
				{!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('cp',  $catCodigoPostal, $idCodigoPostalSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
			</div>
		</div>
	</div>

		<!--colonia-->
	<div class="col-5">
		<div class="form-group">
			{!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$nombreColonia ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDireccionColonia">
				{!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idColonia', $catColonias, $idColoniaSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}				
			</div>
		</div>
	</div>
	{{--  A A A A A  --}}
	{{--  ---------  --}}

		<!--CALLE-->
	<div class="col-7">
		<div class="form-group">
			{!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$direccionTB[0]->calle ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputCalle">
				{!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('calle',$direccionTB[0]->calle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'required']) !!}
			</div>
		</div>
	</div>
		<!--Numero exterior-->
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numExterno', 'Número exterior: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$direccionTB[0]->numExterno ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputNumExterno">
				{!! Form::label('numExterno', 'Número exterior: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numExterno', $direccionTB[0]->numExterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número exterior', 'required']) !!}				
			</div>
		</div>
	</div>
	<div class="col-2">
		<div class="form-group">
			{!! Form::label('numInterno1', 'Número interior: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$direccionTB[0]->numInterno ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputNumInterno">
				{!! Form::label('numInterno1', 'Número interior: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numInterno',$direccionTB[0]->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior', 'required']) !!}				
			</div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$docIdent ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDoc">
				{!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('docIdentificacion',$identificaciones,null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','required']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación: ', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$preregistro->numDocIdentificacion ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputDocIden">
				{!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación: ', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('numDocIdentificacion', $preregistro->numDocIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>

	<div class="col-6">
		<div class="form-group">
			{!! Form::label('idRazon', 'Razón:', ['class' => 'col-form-label-sm hideLabels']) !!}
			{!!Form::label('nombre',$razon ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputRazon">
				{!! Form::label('idRazon', 'Razón:', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idRazon', $razones, $preregistro->idRazon, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una razón', 'data-validation'=> 'required']) !!}				
			</div>
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
</div>