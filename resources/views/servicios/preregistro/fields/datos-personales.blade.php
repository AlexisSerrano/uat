<div class="row">
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('nombre2', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
			{!! Form::text('nombre2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'data-validation' =>'length','data-validation-length' =>'min2','required']) !!}
			<div class="help-block with-errors"></div> 
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('primerAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation' =>'length','data-validation-length' =>'min2','required']) !!}
			<div class="help-block with-errors"></div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('segundoAp', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('segundoAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
		</div>
	</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('fechaNacimiento', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
			{{-- <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control form-control-sm"> --}}
			{!! Form::date('fechaNacimiento', null, ['class' => 'form-control form-control-sm', 'data-target' => '#fechanac','data-validation-format'=>'dd/mm/yyyy', 'placeholder' => 'DD/MM/AAAA']) !!}
			<div class="help-block with-errors"></div>	
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('sexo', 'Sexo', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('sexo', [ 'HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione el sexo', 'data-validation'=>'required','required']) !!}
			<div class="help-block with-errors"></div>
		</div>
	</div>	
		
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstadoOrigen', 'Estado de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstadoOrigen', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required','required']) !!}
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idMunicipioOrigen', 'Municipio de origen', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idMunicipioOrigen', $municipios, null, ['class' => 'form-control form-control-sm','data-validation'=>'required','placeholder'=>'Seleccione un municipio' ,'required']) !!}
		</div>
	</div>

	<div class="col-4">
		<div class="form-group">
			{!! Form::label('curp', 'C.U.R.P.', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('curp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$','data-validation-error-msg'=>'CURP inválido','required']) !!}
		</div>
	</div>

	
	<div class="col-4">
			<div class="form-group">
					<div class="row">
				<div class="col">
			{!! Form::label('rfc2', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
			{!! Form::text('rfc2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
				</div>
			<div class="col">
					{!! Form::label('homo2', 'Homo', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('homo2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
			</div>
		</div>
	</div>
	</div>
	{{-- 
		<div class="form-group">
			
			<div class="help-block with-errors"></div>
		</div>
	</div> --}}

	<div class="col-4">
		<div class="form-group">
			{!! Form::label('idEstado2', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idEstado2', $estados, 30, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required','required']) !!}
		</div>
	</div>
	
	<div class="col-4">
        <div class="form-group">
			{!! Form::label('idMunicipio2', 'Municipio', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catMunicipios'], $form['idMunicipio2']))
            {!! Form::select('idMunicipio2',  $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm','placeholder' => 'Seleccione un municipio','data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('idMunicipio2', $municipios, null, ['class' => 'form-control form-control-sm','data-validation'=>'required','required','placeholder' => 'Seleccione un municipio']) !!}
			@endif
		</div>
    </div>
    <div class="col-4">
        <div class="form-group">
			{!! Form::label('idLocalidad2', 'Localidad', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catLocalidades'],$form['idLocalidad2']))
            {!! Form::select('idLocalidad2',  $form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('idLocalidad2', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>
	<div class="col-4">
			<div class="form-group">
				{!! Form::label('idColonia2', 'Colonia', ['class' => 'col-form-label-sm']) !!}
				@if(isset($form['catColonias'],$form['idColonia2']))
				{!! Form::select('idColonia2', $form['catColonias'], $form['idColonia2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
				@else
				{!! Form::select('idColonia2', ['' => 'colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
				@endif
			</div>
		</div>
    <div class="col-2">
        <div class="form-group">
			{!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
			@if(isset($form['catCodigoPostal'],$form['cp2']))
            {!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@else
			{!! Form::select('cp2', ['' => 'Seleccione CP'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required','required']) !!}
			@endif
		</div>
	</div>

	<div class="col-2">
			<div class="form-group">
				{!! Form::label('telefono2', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
				{!! Form::text('telefono2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'number','data-validation'=>'number, length', 'data-validation-length'=>'7-10','data-validation'=>'required', 'required']) !!}
				<div class="help-block with-errors"></div>
			</div>
		</div>
    
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('calle2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required','required']) !!}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            {!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('numExterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior', 'data-validation'=>'required','required']) !!}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            {!! Form::label('numInterno2', 'Número interior', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('numInterno2', 'S/N', ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
        </div>
	</div>
	<div class="col-4">
			<div class="form-group" >
					{!! Form::label('estadoCivil', 'Estado Civil', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('estadoCivil', $estadocivil, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione su estado civil','data-validation'=>'required' ,'required']) !!}
			</div>
		</div>		
		
		<div class="col-4">
			<div class="form-group" >
					{!! Form::label('escolaridad', 'Escolaridad (Nivel de estudios)', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('escolaridad', $escolaridades, 1, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione su escolaridad','data-validation'=>'required','required']) !!}
			</div>
		</div>
	
		<div class="col-4">
			<div class="form-group" >
					{!! Form::label('ocupacion', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('ocupacion', $ocupaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una ocupación','data-validation'=>'required','required']) !!}
			</div>
		</div>

    <div class="col-4">
        <div class="form-group">
            {!! Form::label('docIdentificacion', 'Documento de identificación', ['class' => 'col-form-label-sm']) !!}
            {!! Form::select('docIdentificacion',$identificaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','data-validation'=>'required']) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
            {!! Form::text('numDocIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación', 'data-validation'=>'required']) !!}
            <div class="help-block with-errors"></div>
        </div>
    </div>
    
	<div class="col-4">
		<div class="form-group">
			 {!! Form::label('correo2', 'Correo', ['class' => 'col-form-label-sm']) !!}
			 {!! Form::email('correo2', null, ['class' => 'form-control form-control-sm emailc', 'placeholder' => 'Si desea recibir su folio por email','data-validation'=>'custom','data-validation-optional'=>'true','data-validation'=>'email','data-validation-error-msg'=>'Proporcione un correo válido. Ejemplo: nombre@gmail.com' ]) !!}
		 </div>
	</div>
	<div class="col-4">
		<div class="form-group">
				{!! Form::label('idRazon2', 'Razón', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idRazon2', $razones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una razón','data-validation'=>'required','required']) !!}
		</div>
	</div>
	<!--solo si es solicitud de hechos-->
	<div id="tipodeActa">
		<div class="col-12"  >
			<div class="form-group" >
					{!! Form::label('tipoActa', 'Seleccione el tipo de constancia de extravío que requiere', ['class' => 'col-form-label-sm']) !!}
					{!! Form::select('tipoActa', array('PASAPORTE' => 'PASAPORTE', 
					'CREDENCIAL DE TRABAJO/GAFFETE' => 'CREDENCIAL DE TRABAJO/GAFFETE',
					'TARJETA DE CREDITO/DEBITO' => 'TARJETA DE CRÉDITO/DÉBITO',
					'TELEFONO CELULAR' => 'TELÉFONO CELULAR',
					'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)' => 'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',
					'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS' => 'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS',
					'FACTURA DE VEHICULO/MOTOCICLETA' => 'FACTURA DE VEHICULO/MOTOCICLETA',
					'TARJETA DE CIRCULACION' => 'TARJETA DE CIRCULACIÓN',
					'PLACAS DE CIRCULACION' => 'PLACAS DE CIRCULACIÓN',
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
	</div>

</div>
