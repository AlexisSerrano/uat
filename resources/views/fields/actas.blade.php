
<div class="col-12">
    {{-- para actas de persona --}}
    <div id="actaPersona" class="row">
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('nombres', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
                {!! Form::text('nombres', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
                <div class="help-block with-errors"></div> 
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('primerAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation'=>'required']) !!}
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
            {!! Form::label('fecha_nac', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['fecha_nac']))
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{ $form['fechaNacimiento'] }}" class="form-control form-control-sm">
                @else
                <input type="date" id="fechaNacimiento" name="fechaNacimiento" class="form-control form-control-sm">
                @endif
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
                {!! Form::select('idMunicipioOrigen', $municipios, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un municipio','data-validation'=>'required','required']) !!}
            </div>
        </div>

            
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('sexo', 'Sexo', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('sexo', ['HOMBRE' => 'HOMBRE', 'MUJER' => 'MUJER'], null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Seleccione el sexo','data-validation'=>'required']) !!}
            </div>
        </div>
  
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('curp', 'C.U.R.P.', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('curp', null, ['class' => 'persona form-control form-control-sm', 'placeholder' => 'Ingrese el C.U.R.P.','data-validation'=>'custom' ,'data-validation-regexp'=>'^([A-Z][AEIOUX][A-Z]{2}\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])[HM](?:AS|B[CS]|C[CLMSH]|D[FG]|G[TR]|HG|JC|M[CNS]|N[ETL]|OC|PL|Q[TR]|S[PLR]|T[CSL]|VZ|YN|ZS)[B-DF-HJ-NP-TV-Z]{3}[A-Z\d])(\d)$','data-validation-error-msg'=>'CURP inválido','required']) !!}
            </div>
        </div>
  
        <div class="col-4">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {!! Form::label('rfc', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('rfc', null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
                    </div>
                    <div class="col">
                            {!! Form::label('homo', 'Homo', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('homo',null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
                    </div>
                </div>
            </div>
        </div>
            
        <div class="col-4">
            <div class="form-group" >
                {!! Form::label('estadoCivilActa1', 'Estado Civil', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('estadoCivilActa1',$estadocivil,null ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione su estado civil','data-validation'=>'required']) !!}
            </div>
        </div>		

        <div class="col-4">
            <div class="form-group" >
                {!! Form::label('escActa1', 'Escolaridad', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('escActa1', $escolaridades,1,['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group" >
                {!! Form::label('ocupActa1', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('ocupActa1',$ocupaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una ocupación','data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('telefono', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>
        
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idEstado2', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('idEstado2', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
            </div>
        </div>
        
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idMunicipio2', 'Municipio', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catMunicipios'], $form['idMunicipio2']))
                {!! Form::select('idMunicipio2',  $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
                @else
                {!! Form::select('idMunicipio2', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
                @endif
            </div>
        </div>
        
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idLocalidad2', 'Localidad', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catLocalidades'],$form['idLocalidad2']))
                {!! Form::select('idLocalidad2',  $form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('idLocalidad2', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>
        
        <div class="col-2">
            <div class="form-group">
                {!! Form::label('idColonia2', 'Colonia', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catColonias'],$form['idColonia2']))
                {!! Form::select('idColonia2', $form['catColonias'], $form['idColonia2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('idColonia2', ['' => 'colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>
        
        <div class="col-2">
            <div class="form-group">
                {!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catCodigoPostal'],$form['cp2']))
                {!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('cp2', ['' => 'Seleccione CP'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>
         
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('calle', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
            </div>
        </div>
        
        <div class="col-2">
            <div class="form-group">
                {!! Form::label('numExterno', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numExterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>
        
        <div class="col-2">
            <div class="form-group">
                {!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numInterno', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>
          
        <div class="col-4">
            <div class="form-group" >
                {!! Form::label('docIdentificacion', 'Seleccione el documento de identificación:', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('docIdentificacion', array('CREDENCIAL PARA VOTAR' => 'CREDENCIAL PARA VOTAR', 
                'PASAPORTE' => 'PASAPORTE',
                'CEDULA PROFESIONAL' => 'CÉDULA PROFESIONAL',
                'CARTILLA DEL SERVICIO MILITAR NACIONAL' => 'CARTILLA DEL SERVICIO MILITAR NACIONAL',
                'TARJETA UNICA DE IDENTIDAD MILITAR' => 'TARJETA ÚNICA DE IDENTIDAD MILITAR',
                'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES' => 'TARJETA DE AFILIACIÓN AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES',
                'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL' => 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL',
                'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR' => 'CREDENCIALES DE EDUCACIÓN MEDIA SUPERIOR Y SUPERIOR',
                'LICENCIA DE CONDUCIR' => 'LICENCIA DE CONDUCIR',
                'CERTIFICADO DE MATRICULA CONSULAR' => 'CERTIFICADO DE MATRÍCULA CONSULAR',
                'ACTA DE NACIMIENTO' => 'ACTA DE NACIMIENTO',
                'CURP' => 'CURP',
                'CONSTANCIA DE RESIDENCIA' => 'CONSTANCIA DE RESIDENCIA',
                'CREDENCIAL DE TRABAJO' => 'CREDENCIAL DE TRABAJO',
                ), null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione el documento de identificación','data-validation'=>'required']) !!}
            </div>
        </div>
        
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numDocIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','data-validation'=>'required' ]) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>
        
        <div id="ocultar" class="col">
            <div class="form-group">
                {!! Form::label('expedido', 'Expedido por', ['class' => 'col-form-label-sm expedido']) !!}
                {!! Form::text('expedido', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Expedido por']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-4"  >
            <div class="form-group" >
                {!! Form::label('tipoActa', 'Seleccione el tipo de acta de hechos que requiere:', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('tipoActa', array('PASAPORTE' => 'PASAPORTE', 
                'CREDENCIAL DE TRABAJO/GAFFETE' => 'CREDENCIAL DE TRABAJO/GAFFETE',
                'TARJETA DE CREDITO/DEBITO' => 'TARJETA DE CRÉDITO/DÉBITO',
                'TELEFONO CELULAR' => 'TELÉFONO CELULAR',
                'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)' => 'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',
                'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS' => 'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS',
                'FACTURA DE VEHICULO/MOTOCICLETA' => 'FACTURA DE VEHÍCULO/MOTOCICLETA',
                'TARJETA DE CIRCULACION' => 'TARJETA DE CIRCULACIÓN',
                'PLACAS DE CIRCULACION' => 'PLACAS DE CIRCULACIÓN',
                'LICENCIA DE CONDUCIR ESTATAL' => 'LICENCIA DE CONDUCIR ESTATAL',
                'LICENCIA DE CONDUCIR FEDERAL' => 'LICENCIA DE CONDUCIR FEDERAL',
                'DOCUMENTO/BIEN EXTRAVIADO O ROBADO' => 'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',
                'CERTIFICADO DE ALUMBRAMIENTO' => 'CERTIFICADO DE ALUMBRAMIENTO',
                'OTROS DOCUMENTOS' => 'OTROS DOCUMENTOS'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un tipo de acta','data-validation'=>'required']) !!}
            </div>
        </div>

        {{-- <div class="col-4 otros">
            <div class="form-group">
                {!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('otro', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>	 --}}

    </div>




    {{-- para actas de empresa --}}
    <div id="actaEmpresa" class="row">
        <div class="col-8">
            <div class="form-group">
                {!! Form::label('nombres2', 'Nombre de la empresa', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('nombres2',null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
            </div>
        </div>
    
        <div class="col-4">
            <div class="form-group">
                {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa', ['class' => 'col-form-label-sm']) !!}
                <input type="date" id="fechaAltaEmpresa" value="" name="fechaAltaEmpresa" class="turnoempresa form-control form-control-sm" data-validation="required">
                <div class="help-block with-errors"></div>	
            </div>
        </div>
            
        <div class="col-4">
            <div class="form-group">
                <div class="row">
                    <div class="col">
                        {!! Form::label('rfc2', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('rfc2', null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
                    </div>
                    <div class="col">
                            {!! Form::label('homo2', 'Homo', ['class' => 'col-form-label-sm']) !!}
                        {!! Form::text('homo2',null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
                    </div>
                </div>
            </div>
        </div>
    
        <div class="col-8">
            <div class="form-group">
                {!! Form::label('representanteLegal', 'Representante legal', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('representanteLegal2', null, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el nombre del representante legal','data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('telefono2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('idEstado', $estados, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catMunicipios'], $form['idMunicipio']))
                {!! Form::select('idMunicipio',  $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
                @else
                {!! Form::select('idMunicipio', [''=>'Seleccione un municipio'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
                @endif
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catLocalidades'],$form['idLocalidad']))
                {!! Form::select('idLocalidad',  $form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('idLocalidad', [ '' => 'Seleccione una localidad'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                {!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catColonias'],$form['idColonia']))
                {!! Form::select('idColonia', $form['catColonias'], $form['idColonia'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('idColonia', ['' => 'colonia'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                {!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
                @if(isset($form['catCodigoPostal'],$form['cp']))
                {!! Form::select('cp', $form['catCodigoPostal'], $form['cp'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @else
                {!! Form::select('cp', ['' => 'Seleccione CP'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                @endif
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('calle2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                {!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numExterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>

        <div class="col-2">
            <div class="form-group">
                {!! Form::label('numInterno2', 'Número interior', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numInterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group" >
                {!! Form::label('docIdentificacion', 'Seleccione el documento de identificación:', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('docIdentificacion2', array('CREDENCIAL PARA VOTAR' => 'CREDENCIAL PARA VOTAR', 
                'PASAPORTE' => 'PASAPORTE',
                'CEDULA PROFESIONAL' => 'CÉDULA PROFESIONAL',
                'CARTILLA DEL SERVICIO MILITAR NACIONAL' => 'CARTILLA DEL SERVICIO MILITAR NACIONAL',
                'TARJETA UNICA DE IDENTIDAD MILITAR' => 'TARJETA ÚNICA DE IDENTIDAD MILITAR',
                'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES' => 'TARJETA DE AFILIACIÓN AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES',
                'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL' => 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL',
                'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR' => 'CREDENCIALES DE EDUCACIÓN MEDIA SUPERIOR Y SUPERIOR',
                'LICENCIA DE CONDUCIR' => 'LICENCIA DE CONDUCIR',
                'CERTIFICADO DE MATRICULA CONSULAR' => 'CERTIFICADO DE MATRÍCULA CONSULAR',
                'ACTA DE NACIMIENTO' => 'ACTA DE NACIMIENTO',
                'CURP' => 'CURP',
                'CONSTANCIA DE RESIDENCIA' => 'CONSTANCIA DE RESIDENCIA',
                'CREDENCIAL DE TRABAJO' => 'CREDENCIAL DE TRABAJO',
                ), null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione el documento de identificación','data-validation'=>'required']) !!}
            </div>
        </div>

        <div class="col-4">
            <div class="form-group">
                {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('numDocIdentificacion2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','data-validation'=>'required' ]) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>

        <div class="col-4"  >
            <div class="form-group" >
                {!! Form::label('tipoActa', 'Seleccione el tipo de acta de hechos que requiere:', ['class' => 'col-form-label-sm']) !!}
                {!! Form::select('tipoActa2', array('PASAPORTE' => 'PASAPORTE', 
                'CREDENCIAL DE TRABAJO/GAFFETE' => 'CREDENCIAL DE TRABAJO/GAFFETE',
                'TARJETA DE CREDITO/DEBITO' => 'TARJETA DE CRÉDITO/DÉBITO',
                'TELEFONO CELULAR' => 'TELÉFONO CELULAR',
                'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)' => 'EQUIPO DE TRABAJO(CELULARES,RADIOS,ETC)',
                'PERMISO DE TRANSITO PARA EMPLACAMIENTO DE TAXIS' => 'PERMISO DE TRÁNSITO PARA EMPLACAMIENTO DE TAXIS',
                'FACTURA DE VEHICULO/MOTOCICLETA' => 'FACTURA DE VEHÍCULO/MOTOCICLETA',
                'TARJETA DE CIRCULACION' => 'TARJETA DE CIRCULACIÓN',
                'PLACAS DE CIRCULACION' => 'PLACAS DE CIRCULACIÓN',
                'LICENCIA DE CONDUCIR ESTATAL' => 'LICENCIA DE CONDUCIR ESTATAL',
                'LICENCIA DE CONDUCIR FEDERAL' => 'LICENCIA DE CONDUCIR FEDERAL',
                'DOCUMENTO/BIEN EXTRAVIADO O ROBADO' => 'DOCUMENTO/BIEN EXTRAVIADO O ROBADO',
                'CERTIFICADO DE ALUMBRAMIENTO' => 'CERTIFICADO DE ALUMBRAMIENTO',
                'OTROS DOCUMENTOS' => 'OTROS DOCUMENTOS'), null, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un tipo de acta','data-validation'=>'required']) !!}
            </div>
        </div>

        {{-- <div class="col-4 otros">
            <div class="form-group">
                {!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('otro2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
                <div class="help-block with-errors"></div>
            </div>
        </div>	 --}}

    </div>

    <div class="row">
        <div class="col">
            <div class="form-group">        
                <label for="narracion" class="col-form-label-sm">Descripción de hechos</label>
                @if(isset($form['narracion']))
                {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
                @else
                {{ Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
                @endif
                
            </div>
            
        </div>
    </div> 

</div> 
@push('scripts')
<script>

 $(document).ready(function(){   
    $(".expedido").hide();
    $("#expedido").hide();
    $("#ocultar").hide();
    
    MostrarInput();

 });

 

function MostrarInput(){

$("#docIdentificacion").change(function(){
    valor = $(this).val();
    if(valor == 'CREDENCIAL DE TRABAJO'){
        $("#expedido").show();
        $(".expedido").show();
        $("#ocultar").show();
    }

    else{
              $("#expedido").hide();
              $(".expedido").hide();
              $("#ocultar").hide();

              
    }
});
}

</script>
@endpush 