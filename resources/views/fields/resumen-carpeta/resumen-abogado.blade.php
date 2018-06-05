@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
 
<div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Abogado</h5></div>
            <div class="col text-right">
                <a class="btn btn-secondary" >Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
    <div class="card-body">
<div class="row">
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
            {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
            {!!Form::label('primerAp',null ,['class'=> 'col-form-label-sm '])!!}
            {!!Form::label('segundoAp',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>  
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
            {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('SUBP940208Q15' ,null,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
    <div class="col-4">
            <div class="form-group">
                {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                {!!Form::label('02/02/02',null ,['class'=> 'col-form-label-sm '])!!}	
            </div>
        </div>
    <div class="col-4">
            <div class="form-group">
                {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                {!!Form::label('8413060',null ,['class'=> 'col-form-label-sm '])!!}
            </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('veracruz',null ,['class'=> 'col-form-label-sm '])!!}
            
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('municipio',null ,['class'=> 'col-form-label-sm '])!!}
            
        </div>
    </div>

    <div class="col-4">
        <div class="form-group">
            {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('localidad',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
            
    <!--Codigo Postal-->
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('cp', 'Código postal :', ['class' => 'col-form-label-sm detalle ']) !!}
            {!!Form::label('nombre',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>

        <!--colonia-->
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('colonia',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('calle',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            {!! Form::label('numExterno', 'Núm.: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('15',null,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
    <div class="col-2">
        <div class="form-group">
            {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
            {!!Form::label('12',null ,['class'=> 'col-form-label-sm '])!!}
        </div>
    </div>
<div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos del trabajo</p></h5></div>
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('lugarTrabajo', 'Lugar', ['class' => 'col-form-label-sm detalle']) !!}
            {!! Form::label('lugarTrabajo', null, ['class' => 'col-form-label-sm']) !!}
        </div>
    </div>
    
    <div class="col-4">
        <div class="form-group">
            {!! Form::label('telefonoTrabajo', 'Teléfono', ['class' => 'col-form-label-sm detalle']) !!}
            {!! Form::label('telefonoTrabajo', null, ['class' => 'col-form-label-sm']) !!}
        </div>
    </div>
    <div class="col-12">
            <div class="form-group">
                {!! Form::label('direccionTrabajo', 'Direccion del trabajo', ['class' => 'col-form-label-sm detalle']) !!}
                {!! Form::label('entidadFederativa', null, ['class' => 'col-form-label-sm']) !!}
                {!! Form::label('municipio',null , ['class' => 'col-form-label-sm ']) !!}
                {!! Form::label('localidad', null, ['class' => 'col-form-label-sm']) !!}
                {!! Form::label('colonia', null, ['class' => 'col-form-label-sm']) !!}

            </div>
        </div>
        <div class="col-4">
                <div class="form-group">
                    {!! Form::label('calle', 'Calle. ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
            <div class="col-2">
                    <div class="form-group">
                        {!! Form::label('cp', 'CP', ['class' => 'col-form-label-sm detalle']) !!}
                        {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                    </div>
                </div>
        <div class="col-2">
                <div class="form-group">
                    {!! Form::label('num.Ext', 'Núm.Ext. ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
            <div class="col-2">
                <div class="form-group">
                    {!! Form::label('num.Int', 'Núm.Int. ', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('12', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
        <div class="col-12" style="text-align:center;"><p><h5 class="detalle">Datos del abogado</p></h5></div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('tipo', 'Tipo', ['class' => 'col-form-label-sm detalle']) !!}  
                    {!! Form::label('tippo', null, ['class' => 'col-form-label-sm']) !!}
              </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('sector', 'Sector', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('sector', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('cedulaProf', 'Cédula profesional', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('cedulaProf', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('correo', 'Correo', ['class' => 'col-form-label-sm detalle']) !!}
                    {!! Form::label('correo', null, ['class' => 'col-form-label-sm']) !!}
                </div>
            </div>
</div>
</div>
                   

</div>
@endsection