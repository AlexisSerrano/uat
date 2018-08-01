<div class="form-group">
	<div class="form-row" >
		<!--nombre-->
		<div class="col-6">
			<div class="form-group">
				{!! Form::label('nombres2', 'Nombre: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombres2',$preregistro->nombre ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputNombre">
						{!! Form::label('nombres2', 'Nombre: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::text('nombres2', $preregistro->nombre, ['class' => 'form-control  form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}					
				</div>
				<div class="help-block with-errors"></div> 
			</div>
		</div>
	<!--Representante legal-->
	<div class="col-3">
			<div class="form-group">
				{!! Form::label('repLegal', 'Nombre representante legal: ', ['class' => 'col-form-label-sm hideLabels','valid-tooltip']) !!}
				{!!Form::label('nombre',$preregistro->representanteLegal ,['class'=> 'col-form-label-sm hideLabels'])!!}
			<div class="input-group inputOculto" id="inputRepLegal">
					{!! Form::label('repLegal', 'Nombre representante legal: ', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
					{!! Form::text('repLegal', $preregistro->representanteLegal, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}					
				</div>
				<div class="help-block with-errors"></div> 
			</div>
		</div>

		<div class="col-3">
				<div class="form-group">
					{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm hideLabels']) !!}
					{!!Form::label('nombre',$preregistro->primerAp ,['class'=> 'col-form-label-sm hideLabels'])!!}
					<div class="input-group inputOculto" id="inputPrimerAp">
							{!! Form::label('primerAp', 'Primer apellido: ', ['class' => 'col-form-label-sm']) !!}
						{!! Form::text('primerAp',$preregistro->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation'=>'required']) !!}						
					</div>
					<div class="help-block with-errors"></div>
				</div>
			</div>
			
			<div class="col-3">
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
							{!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa: ', ['class' => 'col-form-label-sm']) !!}							
							{!! Form::date('fechaAltaEmpresa', $preregistro->fechaNac, ['class' => 'form-control form-control-sm', 'data-target' => '#fechanac', 'required']) !!}					
						</div>
						<div class="help-block with-errors"></div>	
					</div>
				</div>

		<!--RFC-->

		<div class="col-4">
			<div class="form-group">
				<div class="row">
					<div class="col">
						{!!	Form::label('rfc2', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}						
						{!!	Form::label('rfc2',substr($preregistro->rfc,0,9), ['class' => 'col-form-label-sm hideLabels']) !!}
						{!!	Form::text('rfc2', substr($preregistro->rfc,0,9), ['class' => 'form-control form-control-sm inputOculto', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
					</div>					
					<div class="col">
						{!! Form::label('homo2', 'Homoclave', ['class' => 'col-form-label-sm']) !!}
						{!! Form::label('homo2', substr($preregistro->rfc,9,3), ['class' => 'col-form-label-sm hideLabels']) !!}
						{!! Form::text('homo2', substr($preregistro->rfc,9,3), ['class' => 'form-control form-control-sm inputOculto', 'placeholder' => 'Ingrese homoclave','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'Homoclave inválida' ,'required']) !!}
					</div>
				</div>
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

		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$nombreEstado ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputDireccionEstado">
					{!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idEstado', $estados, $idEstadoSelect, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa', 'required']) !!}
				</div>
			</div>
		</div>
		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$nombreMunicipio ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputDireccionMunicipio">
					{!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm ']) !!}
					{!! Form::select('idMunicipio', $catMunicipios, $idMunicipioSelect, ['class' => 'form-control form-control-sm', 'required']) !!}
				</div>
			</div>
		</div>

		<div class="col-4">
			<div class="form-group">
				{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$nombreLocalidad ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputDireccionLocalidad">
						{!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('idLocalidad', $catLocalidades, $idLocalidadSelect, ['class' => 'form-control form-control-sm', 'required']) !!}
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
					{!! Form::select('idColonia', $catColonias, $idColoniaSelect, ['class' => 'form-control form-control-sm', 'required']) !!}					
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
					{!! Form::select('cp', $catCodigoPostal, $idCodigoPostalSelect, ['class' => 'form-control form-control-sm', 'required']) !!}
				</div>
			</div>
		</div>
		{{--  A A A A A  --}}
		{{--  ---------  --}}

		<!--CALLE-->
		<div class="col-8">
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
				{!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!!Form::label('nombre',$docIdent ,['class'=> 'col-form-label-sm hideLabels'])!!}
				<div class="input-group inputOculto" id="inputDoc">
					{!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('docIdentificacion',$identificaciones,$preregistro->docIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','required']) !!}				
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
					{!! Form::text('numDocIdentificacion', $preregistro->numDocIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','required']) !!}				
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
			</div>
		</div>


		
		@if( ($tipoActa) && ($preregistro->idRazon==4))
			<div class="col-6">
				{!! Form::label('tipoAct', 'Constancia de extravio:', ['class' => 'col-form-label-sm hideLabels']) !!}
				{!! Form::label('nombre', $tipoActa, ['class' => 'col-form-label-sm hideLabels']) !!}
			</div>
			@if($tipoActa=='OTROS DOCUMENTOS')
				<div class="col-6">
					{!! Form::label('otr', 'Especifique : ', ['class' => 'col-form-label-sm hideLabels']) !!}
					{!! Form::label('otr', $preregistro->tipoActa, ['class' => 'col-form-label-sm hideLabels']) !!}
				</div>												
			@endif
		@endif


		<div class="input-group inputOculto tipodeActa1 col-6">
			{!! Form::label('tipoActa11', 'Seleccione el tipo de constancia de extravío que requiere', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('tipoActa1', array('PASAPORTE' => 'PASAPORTE', 
			'CREDENCIAL DE TRABAJO/GAFFETE' => 'CREDENCIAL DE TRABAJO/GAFFETE',
			'TARJETA DE CREDITO/DEBITO' => 'TARJETA DE CREDITO/DEBITO',
			'TELEFONO CELULAR' => 'TELEFONO CELULAR',
			'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)' => 'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',
			'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS' => 'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS',
			'FACTURA DE VEHICULO/MOTOCICLETA' => 'FACTURA DE VEHICULO/MOTOCICLETA',
			'TARJETA DE CIRCULACION' => 'TARJETA DE CIRCULACION',
			'PLACAS DE CIRCULACION' => 'PLACAS DE CIRCULACION',
			'LICENCIA DE CONDUCIR ESTATAL' => 'LICENCIA DE CONDUCIR ESTATAL',
			'LICENCIA DE CONDUCIR FEDERAL' => 'LICENCIA DE CONDUCIR FEDERAL',
			'DOCUMENTO/BIEN EXTRAVIADO O ROBADO' => 'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',
			'CERTIFICADO DE ALUMBRAMIENTO' => 'CERTIFICADO DE ALUMBRAMIENTO',
			'OTROS DOCUMENTOS' => 'OTROS DOCUMENTOS'), $tipoActa, ['class' => 'form-control form-control-sm','data-validation'=>'required', 'id'=>'otroDoc']) !!}
		</div>

		<div class="input-group inputOculto tipodeActa col-6" id="inputRazon1">
			{!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('otro', $preregistro->tipoActa, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
			<div class="help-block with-errors"></div>
		</div>

	</div>
</div>