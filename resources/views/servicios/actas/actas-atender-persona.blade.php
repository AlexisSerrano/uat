@php
$form = oldFormActas();
@endphp
<div class="col-4">
    <div class="form-group">
        {!! Form::label('nombres', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
        {!! Form::text('nombres', $acta->nombre, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required',]) !!}
        <div class="help-block with-errors"></div> 
    </div>
</div>

<input type="hidden" name="idPreregistro" id="idPreregistro" value="{{$acta->id}}">

<div class="col-4">
    <div class="form-group">
        {!! Form::label('primerAp', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('primerAp', $acta->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation'=>'required',]) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('segundoAp', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('segundoAp', $acta->segundoAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
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
        ), $acta->docIdentificacion, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione el documento de identificación','data-validation'=>'required']) !!}
    </div>
</div>

{{-- 
<div class="col-4">
    <div class="form-group">
        {!! Form::label('docIdentificacion', 'Documento de identificación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('docIdentificacion', $acta->docIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div> --}}

<div class="col-4">
    <div class="form-group">
        {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numDocIdentificacion', $acta->numDocIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','data-validation'=>'required' ]) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>
@if ($acta->docIdentificacion=='CREDENCIAL DE TRABAJO')
<div class="col-4">
    <div class="form-group">
        {!! Form::label('expedido', 'Expedido por', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('expedido', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Expedido por']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>
@endif

<div class="col-4">
    <div class="form-group">
    {!! Form::label('fecha_nac', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
        <div class="input-group date" id="fecha_nac" data-target-input="nearest">
            @if(isset($form['fecha_nac']))
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{ $form['fechaNacimiento'] }}" class="form-control form-control-sm", "required">
            @else
            <input type="date" id="fechaNacimiento" name="fechaNacimiento" value="{{$acta->fechaNac}}" class="form-control form-control-sm","required">
            @endif
        </div>
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idEstadoOrigen', 'Estado de origen', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('idEstadoOrigen', $estados, $acta->idEstadoOrigen, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required','required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idMunicipioOrigen', 'Municipio de origen', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('idMunicipioOrigen', $catMunicipioOrigen, $acta->idMunicipioOrigen, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un municipio','data-validation'=>'required','required']) !!}
    </div>
</div>


<div class="col-4">
    <div class="form-group">
        {!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('telefono', $acta->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idEstado2', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('idEstado2', $estados, $acta->idEstado, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idMunicipio2', 'Municipio', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catMunicipios'], $form['idMunicipio2']))
        {!! Form::select('idMunicipio2',  $form['catMunicipios'], $form['idMunicipio2'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
        @else
        {!! Form::select('idMunicipio2', $catMunicipios, $acta->idMunicipio, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idLocalidad2', 'Localidad', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catLocalidades'],$form['idLocalidad2']))
        {!! Form::select('idLocalidad2',  $form['catLocalidades'], $form['idLocalidad2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('idLocalidad2', $catLocalidades, $acta->idLocalidad, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('idColonia2', 'Colonia', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catColonias'],$form['idColonia2']))
        {!! Form::select('idColonia2', $form['catColonias'], $form['idColonia2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('idColonia2', $catColonias, $acta->idColonia, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catCodigoPostal'],$form['cp2']))
        {!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('cp2', $catCodigoPostal, $acta->codigoPostal, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>


<div class="col-4">
    <div class="form-group">
        {!! Form::label('calle', 'Calle', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('calle', $acta->calle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('erno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numExterno', $acta->numExterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('numInterno', 'Número interior', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numInterno', $acta->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('estadoCivilActa1', 'Estado Civil', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('estadoCivilActa1',$estadocivil,$acta->idEstadoCivil ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione su estado civil','data-validation'=>'required']) !!}
    </div>
</div>		

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('escActa1', 'Escolaridad', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('escActa1', $escolaridades,$acta->idEscolaridad,['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('ocupActa1', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('ocupActa1',$ocupaciones, $acta->idOcupacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una ocupación','data-validation'=>'required']) !!}
    </div>
</div>
<div class="col-6">
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
            'OTROS DOCUMENTOS' => 'OTROS DOCUMENTOS'), $acta->tipoActa, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione un tipo de acta','data-validation'=>'required']) !!}
    </div>
</div>
<div class="col-6 otros">
    <div class="form-group">
        {!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('otro', $acta->otro, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>	

        
<div class="col-12">
    <div class="form-group">        
        <label for="narracion" class="col-form-label-sm">Descripción de hechos</label>
        @if(isset($form['narracion']))
        {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
        @else
        {{ Form::textarea('narracion', $acta->narracion, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
        @endif
        {{-- <textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=>
            @if(isset($form['narracion']))
            {{$form['narracion']}}
            @endif
        </textarea> --}}
    </div>
</div>