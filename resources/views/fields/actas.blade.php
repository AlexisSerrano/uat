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
        {!! Form::text('segundoAp', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido','data-validation'=>'required']) !!}
    </div>
</div>
<div class="col-4">
    <div class="form-group">
        {!! Form::label('docIdentificacion', 'Documento de identificación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('docIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el docto. de identificación','data-validation'=>'required']) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-4">
    <div class="form-group">
        {!! Form::label('numDocIdentificacion', 'Núm. de documento de identificación', ['class' => 'col-form-label-sm']) !!}
        {!! Form::text('numDocIdentificacion', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el núm. del docto. de identificación','data-validation'=>'required' ]) !!}
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-4">
        <div class="form-group">
            {!! Form::label('fechaActas', 'Fecha de nacimiento', ['class' => 'col-form-label-sm']) !!}
                <div class="input-group date" id="fechaActas" data-target-input="nearest">
                         <input type="date" id="fechaActas" name="fechaActas" class="form-control form-control-sm", data-validation="birthdate">
                    </div>
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
        {!! Form::label('cp2', 'Código postal', ['class' => 'col-form-label-sm']) !!}
        @if(isset($form['catCodigoPostal'],$form['cp2']))
        {!! Form::select('cp2', $form['catCodigoPostal'], $form['cp2'], ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
        @else
        {!! Form::select('cp2', ['' => 'Seleccione CP'], null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
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
        {!! Form::text('numInterno2', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el n. Interior', 'data-validation'=>'required']) !!}
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
            
