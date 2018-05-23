<div class="col-4">
    <div class="form-group">
        {!! Form::label('nombre2', 'Nombre', ['class' => 'col-form-label-sm','valid-tooltip']) !!}
        {!! Form::text('nombre2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre','data-validation'=>'required']) !!}
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
        <div class="input-group date" id="fecha_nac" data-target-input="nearest">
            @if(isset($form['fecha_nac']))
            <input type="date" id="fecha_nac" name="fecha_nac" value="{{ $form['fecha_nac'] }}" class="form-control form-control-sm">
            @else
            <input type="date" id="fecha_nac" name="fecha_nac" class="form-control form-control-sm">
            @endif
        </div>
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        {!! Form::label('telefono', 'Teléfono', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('telefono', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el teléfono','data-validation'=>'required']) !!}
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
        {!! Form::label('calle2', 'Calle', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('calle2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese la calle', 'data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-2">
    <div class="form-group">
        {!! Form::label('numExterno2', 'Número exterior', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numExterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Exterior', 'data-validation'=>'required']) !!}
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
        {!! Form::label('estadoCivilActa1', 'Estado Civil', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('estadoCivilActa1',$estadocivil,null ,['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione su estado civil','data-validation'=>'required']) !!}
    </div>
</div>		

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('escActa1', 'Escolaridad', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('escActa1', $escolaridades,null,['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
    </div>
</div>

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('ocupActa1', 'Ocupación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('ocupActa1',$ocupaciones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una ocupación','data-validation'=>'required']) !!}
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
<div class="col-6 otros">
    <div class="form-group">
        {!! Form::label('otro', 'Especifique', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('otro', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Especifique', 'data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>	

<div class="col-4">
    <div class="form-group" >
        {!! Form::label('docIdentificacion', 'Seleccione el documento de identificación:', ['class' => 'col-form-label-sm']) !!}
        {!! Form::select('docIdentificacion', array('CREDENCIAL PARA VOTAR' => 'CREDENCIAL PARA VOTAR', 
        'PASAPORTE' => 'PASAPORTE',
        'CEDULA PROFESIONAL' => 'CEDULA PROFESIONAL',
        'CARTILLA DEL SERVICIO MILITAR NACIONAL' => 'CARTILLA DEL SERVICIO MILITAR NACIONAL',
        'TARJETA UNICA DE IDENTIDAD MILITAR' => 'TARJETA UNICA DE IDENTIDAD MILITAR',
        'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES' => 'TARJETA DE AFILIACION AL INSTITUTO NACIONAL DE PERSONAS ADULTAS MAYORES',
        'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL' => 'CREDENCIAL DE SALUD EXPEDIDO POR EL INSTITUTO MEXICANO DEL SEGURO SOCIAL',
        'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR' => 'CREDENCIALES DE EDUCACION MEDIA SUPERIOR Y SUPERIOR',
        'LICENCIA DE CONDUCIR' => 'LICENCIA DE CONDUCIR',
        'CERTIFICADO DE MATRICULA CONSULAR' => 'CERTIFICADO DE MATRICULA CONSULAR',
        'ACTA DE NACIMIENTO' => 'ACTA DE NACIMIENTO',
        'CURP' => 'CURP',
        'CONSTANCIA DE RESIDENCIA' => 'CONSTANCIA DE RESIDENCIA',
        'CREDENCIAL DE TRABAJO' => 'CREDENCIAL DE TRABAJO',
        ), null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
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









<div class="col-12">
    <div class="form-group">        
        <label for="narracion" class="col-form-label-sm">Narración</label>
        @if(isset($form['narracion']))
        {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
        @else
        {{ Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'required']) }}
        @endif
        {{-- <textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=>
            @if(isset($form['narracion']))
            {{$form['narracion']}}
            @endif
        </textarea> --}}
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