@php
$form = oldFormActas();
@endphp
<div class="col-8">
    <div class="form-group">
        {!! Form::label('nombres2', 'Nombre de la empresa', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('nombres2',$acta->nombre, ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
    </div>
</div>
<input type="hidden" name="idPreregistro" id="idPreregistro" value="{{$acta->id}}">

<input type="hidden" name="esEmpresa" id="esEmpresa" value="{{$acta->esEmpresa}}">
<div class="col-4">
    <div class="form-group">
        {!! Form::label('nombre2', 'Nombre del representante', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
        {!! Form::text('nombre2', $acta->representanteLegal, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div> 
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('primerAp2', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('primerAp2', $acta->primerAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido','data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('segundoAp2', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('segundoAp2', $acta->segundoAp, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa', ['class' => 'col-form-label-sm']) !!}
        <input type="date" id="fechaAltaEmpresa" value="{{$acta->fechaNac}}" name="fechaAltaEmpresa" class="turnoempresa form-control form-control-sm" data-validation="required">
        <div class="help-block with-errors"></div>	
    </div>
</div>
{{-- {{dd($acta->fechaNac)}} --}}
    
<div class="col-4">
    <div class="form-group">
        <div class="row">
            <div class="col">
                {!! Form::label('rfc2', 'R.F.C.', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('rfc2', substr($acta->rfc,0,9), ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
            </div>
            <div class="col">
                    {!! Form::label('homo2', 'Homo', ['class' => 'col-form-label-sm']) !!}
                {!! Form::text('homo2',substr($acta->rfc,9,3), ['class' => 'turnoempresa form-control form-control-sm', 'placeholder' => 'Ingrese el R.F.C.','data-validation'=>'required' ,'data-validation-length'=>'8','data-validation-error-msg'=>'RFC inválido' ,'required']) !!}
            </div>
        </div>
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('telefono2', $acta->telefono, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idEstado', 'Entidad federativa', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('idEstado', $estados, $acta->idEstado, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una entidad federativa','data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idMunicipio', 'Municipio', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catMunicipios'], $form['idMunicipio']))
        {!! Form::select('idMunicipio',  $form['catMunicipios'], $form['idMunicipio'], ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
        @else
        {!! Form::select('idMunicipio', $catMunicipios, $acta->idMunicipio, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('idLocalidad', 'Localidad', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catLocalidades'],$form['idLocalidad']))
        {!! Form::select('idLocalidad',  $form['catLocalidades'], $form['idLocalidad'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('idLocalidad', $catLocalidades, $acta->idLocalidad, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('idColonia', 'Colonia', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catColonias'],$form['idColonia']))
        {!! Form::select('idColonia', $form['catColonias'], $form['idColonia'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('idColonia', $catColonias, $acta->idColonia, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('cp', 'Código postal', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catCodigoPostal'],$form['cp']))
        {!! Form::select('cp', $form['catCodigoPostal'], $form['cp'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('cp', $catCodigoPostal, $acta->codigoPostal, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @endif
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('calle2',$acta->calle, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numExterno2', $acta->numExterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior','data-validation'=>'custom','data-validation-optional'=>'true']) !!}
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('numInterno2', 'Número interior', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numInterno2', $acta->numInterno, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'custom','data-validation-optional'=>'true']) !!}
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
        ), $acta->docIdentificacion, ['class' => 'form-control form-control-sm','placeholder'=>'Seleccione el documento de identificación','data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numDocIdentificacion2', $acta->numDocIdentificacion, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','data-validation'=>'required' ]) !!}
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


<input type="hidden" name="idPreregistro" id="idPreregistro" value="{{$acta->id}}">




{{-- -------------------------------------------------- --}}

        
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