<div class="form-group">
	<div class="form-row" >
		<!--nombre-->
		<div class="col-5">
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
	<!--Representante legal-->
	<div class="col-5">
			<div class="form-group">
				{!! Form::label('repLegal', 'Nombre representante legal: ', ['class' => 'col-form-label-sm hideLabels','valid-tooltip']) !!}
				{!!Form::label('nombre',$preregistro->representanteLegal ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputRepLegal">
					{!! Form::label('repLegal', 'Nombre representante legal: ', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
					{!! Form::text('repLegal', $preregistro->representanteLegal, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','required']) !!}					
				</div>
				<div class="help-block with-errors"></div> 
			</div>
		</div>

		<div class="col-4">
				<div class="form-group">
					{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm hideLabels']) !!}
					{!!Form::label('nombre',$preregistro->primerAp ,['class'=> 'col-form-label-sm hideLabels'])!!}
					<div class="input-group inputOculto" id="inputPrimerAp">
							{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm']) !!}
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

			<!--Fecha creación de la empresa-->
			<div class="col-3">
					<div class="form-group">
						{!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa: ', ['class' => 'col-form-label-sm hideLabels']) !!}
						{!!Form::label('nombre',$preregistro->fechaNac ,['class'=> 'col-form-label-sm hideLabels'])!!}
						<div class="input-group inputOculto" id="inputFechaNac">
							{!! Form::label('fechaAltaEmpresa', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm']) !!}							
							{!! Form::date('fechaAltaEmpresa', $preregistro->fechaNac, ['class' => 'form-control form-control-sm', 'data-target' => '#fechanac', 'required']) !!}					
						</div>
						<div class="help-block with-errors"></div>	
					</div>
				</div>

		<!--RFC-->
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$preregistro->rfc ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputRfc">
					{!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('rfc', $preregistro->rfc, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.', 'required']) !!}					
				</div>
				<div class="help-block with-errors"></div>
			</div>
		</div>
		
		<!--telefono-->
		<div class="col-2">
			<div class="form-group">
				{!! Form::label('telefono', 'Teléfono: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$preregistro->telefono ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputTelefono">
						{!! Form::label('telefono', 'Teléfono: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('telefono', $preregistro->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono', 'required']) !!}					
				</div>
				<div class="help-block with-errors"></div>
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
					{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm ']) !!}
					{!! Form::select('idMunicipio', $catMunicipios, $idMunicipioSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
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
					{!! Form::select('cp', $catCodigoPostal, $idCodigoPostalSelect, ['class' => 'form-control form-control-sm', 'required','disabled']) !!}
				</div>
			</div>
		</div>

			<!--colonia-->
		<div class="col-4">
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
					{!! Form::text('numInterno',$direccionTB[0]->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el número interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}					
				</div>
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
			</div>
		</div>
	</div>
</div>