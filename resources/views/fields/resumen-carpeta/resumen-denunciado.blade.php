@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Investigados</h5></div>
            <div class="col text-right">
                
            </div>
        </div>
    </div>
    {{-- inicio pruebas de taps con denuncuante --}}
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($denunciados as $denunciado)
            <li class="nav-item">
                {{-- <div class="row">
                    <div class="col"> --}}
                        <a class="nav-link" id="denunciado{{$denunciado->denunciadoid}}-tab" data-toggle="tab" href="#denunciado{{$denunciado->denunciadoid}}" role="tab" aria-controls="denunciado{{$denunciado->denunciadoid}}" aria-selected="false">
                            {{$denunciado->pernombres." ".$denunciado->perprimerAp." ".$denunciado->persegundoAp}}
                        </a>

                    {{-- </div> --}}
                    {{-- <div class="col"> --}}

                    {{-- </div>
                </div> --}}
            </li>
        @endforeach
        
    </ul>
    
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            @foreach ($denunciados as $denunciado)

                
                <div class="tab-pane fade" id="denunciado{{$denunciado->denunciadoid}}" role="tabpanel" aria-labelledby="denunciado{{$denunciado->denunciadoid}}-tab">    
                    @if ($denunciado->pernombres=='QUIEN O QUIENES RESULTEN RESPONSABLES')
                        <div class="col-12" style="text-align:center">
                            <p>
                                <h5 class="detalle">Se desconoce la información del implicado ó implicados
                                </h5>
                            </p>
                        </div>
                    @else
                        <div class="col-12" style="text-align:center">
                            <p>
                                <h5 class="detalle">Datos personales
                                    @if (!is_null($denunciado->pernombres)&&!is_null($denunciado->perprimerAp)&&!is_null($denunciado->persegundoAp)&&$denunciado->peresEmpresa==0||$denunciado->peresEmpresa==1)
                                        <a class="btn btn-secondary float-right" href="{{route('narracion',$denunciado->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>
                                    @endif
                                </h5>
                            </p>
                        </div>
                        @if ($denunciado->peresEmpresa==0)
                            <div id="personales-persona" class="row">
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                        {!!Form::label('nombre',$denunciado->pernombres ,['class'=> 'col-form-label-sm '])!!}
                                        @if ($denunciado->perprimerAp===null||$denunciado->perprimerAp=='SIN INFORMACION')@else{!!Form::label('primerAp',$denunciado->perprimerAp ,['class'=> 'col-form-label-sm '])!!}@endif
                                        @if ($denunciado->persegundoAp===null||$denunciado->persegundoAp=='SIN INFORMACION')@else{!!Form::label('segundoAp',$denunciado->persegundoAp ,['class'=> 'col-form-label-sm '])!!}@endif
                                    </div>
                                </div>  
                                
                                @if ($denunciado->persexo===null||$denunciado->persexo=='SIN INFORMACION')@else
                                    <div class="col-4">
                                        <div class="form-group">
                                            {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                                            {!!Form::label('sexo',$denunciado->persexo ,['class'=> 'col-form-label-sm '])!!}
                                        </div>
                                    </div>
                                @endif    
                                
                                @if ($denunciado->perrfc===null||$denunciado->perrfc=='SIN INFORMACION')@else
                                    <div class="col-4">
                                        <div class="form-group">
                                            {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!!Form::label('rfc' ,$denunciado->perrfc,['class'=> 'col-form-label-sm '])!!}
                                        </div>
                                    </div>
                                @endif
                                
                                @if ($denunciado->percurp===null||$denunciado->percurp=='SIN INFORMACION')@else
                                    <div class="col-4">
                                        <div class="form-group">
                                            {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!!Form::label('curp',$denunciado->percurp ,['class'=> 'col-form-label-sm '])!!}
                                        </div>
                                    </div>
                                @endif
                                {{-- {{$denunciado->perfechaNacimiento}} --}}
                                @if ($denunciado->perfechaNacimiento==='1900-01-01 00:00:00')@else
                                    <div class="col-4">
                                        <div class="form-group">
                                            {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	
                                        </div>
                                    </div>
                                @endif

                                @if ($denunciado->peridNacionalidad===null||$denunciado->peridNacionalidad=='SIN INFORMACION')@else
                                    <div class="col-4">
                                        <div class="form-group">
                                            {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                            {!!Form::label('nacionalidad',$denunciado->peridNacionalidad ,['class'=> 'col-form-label-sm '])!!}
                                        </div>
                                    </div>
                                @endif
                                
                                @if ($denunciado->peridEtnia===null||$denunciado->peridEtnia=='SIN INFORMACION')@else
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('Etnia',$denunciado->peridEtnia ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->peridLengua===null||$denunciado->peridLengua=='SIN INFORMACION')@else
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('Lengua',$denunciado->peridLengua ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variaidOcupacion===null||$denunciado->variaidOcupacion=='SIN INFORMACION')@else
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('ocupacion',$denunciado->variaidOcupacion ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variaidEstadoCivil===null||$denunciado->variaidEstadoCivil=='SIN INFORMACION')@else
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('casado',$denunciado->variaidEstadoCivil ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variaidReligion===null||$denunciado->variaidReligion=='SIN INFORMACION')@else
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('religion', 'Religion: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('religion',$denunciado->variaidReligion ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variaidEscolaridad===null||$denunciado->variaidEscolaridad=='SIN INFORMACION')@else                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('escolaridad', 'Escolaridad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('escolaridad',$denunciado->variaidEscolaridad ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variatelefono===null||$denunciado->variatelefono=='SIN INFORMACION')@else                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('telefono',$denunciado->variatelefono ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif

                                @if ($denunciado->variadocIdentificacion===null||$denunciado->variadocIdentificacion=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('nombre',$denunciado->variadocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                                
                                @if ($denunciado->variadocIdentificacion===null||$denunciado->variadocIdentificacion=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('doc',$denunciado->varianumDocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                @endif
                            </div>    
                        @else
                            <div id="personales-empresa" class="row">
                                <div class="col-8">
                                    <div class="form-group">
                                        {!! Form::label('nombres2', 'Nombre:', ['class' => 'detalle col-form-label-sm']) !!}
                                        {!! Form::label('nombres2', $denunciado->pernombres, ['class' => ' col-form-label-sm']) !!}
                                    </div>
                                </div>
                                
                                <div class="col-8">
                                    <div class="form-group">
                                        {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa:', ['class' => 'detalle col-form-label-sm']) !!}
                                        {{-- <input type="date" id="fechaAltaEmpresa" value="{{fechaNac}}" name="fechaNacimiento" class="col-form-label-sm" data-validation="required"> --}}
                                        {!! Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!} 	
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('rfc2', 'R.F.C.:', ['class' => ' detalle col-form-label-sm']) !!}
                                        {!! Form::label('rfc2', $denunciado->perrfc, ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>

                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('representanteLegal', 'Representante legal: ', ['class' => 'detalle col-form-label-sm']) !!}
                                        {!! Form::label('representanteLegal',  $denunciado->variarepresentanteLegal, ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            </div>
                        @endif
                        
                        
                        <div id="direccion" class="row">
                            
                            @if ($denunciado->domicilioEstado===null||$denunciado->domicilioEstado=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('veracruz',$denunciado->domicilioEstado ,['class'=> 'col-form-label-sm '])!!}
                                    
                                </div>
                            </div>
                            @endif

                            @if ($denunciado->domicilioMunicipio===null||$denunciado->domicilioMunicipio=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('municipio',$denunciado->domicilioMunicipio ,['class'=> 'col-form-label-sm '])!!}
                                    
                                </div>
                            </div>
                            @endif
                            
                            @if ($denunciado->domicilioLocalidad===null||$denunciado->domicilioLocalidad=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('localidad',$denunciado->domicilioLocalidad ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            @endif
                            
                            <!--Codigo Postal-->
                            @if ($denunciado->domicilioCp===null||$denunciado->domicilioCp=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                    {!!Form::label('nombre',$denunciado->domicilioCp ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            @endif
                            
                            <!--colonia-->
                            @if ($denunciado->domicilioColonia===null||$denunciado->domicilioColonia=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('colonia',$denunciado->domicilioColonia ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            @endif
                            
                            @if ($denunciado->domicilioCalle===null||$denunciado->domicilioCalle=='SIN INFORMACION')@else                                                                
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('calle',$denunciado->domicilioCalle ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            @endif
                            
                            @if ($denunciado->domicilioNumExterno===null||$denunciado->domicilioNumExterno=='SIN INFORMACION')@else                                                                
                            <div class="col-2">
                                <div class="form-group">
                                    {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('15',$denunciado->domicilioNumExterno,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            @endif
                            
                            @if ($denunciado->domicilioNumInterno===null||$denunciado->domicilioNumInterno=='SIN INFORMACION')@else                                                                
                                <div class="col-2">
                                    <div class="form-group">
                                        {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('',$denunciado->domicilioNumInterno ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                            @endif

                        </div>

                        @if ($denunciado->peresEmpresa==0)
                            @if (!is_null($denunciado->pernombres)&&!is_null($denunciado->perprimerAp)&&!is_null($denunciado->persegundoAp))                                                                
                                
                                @if ($denunciado->varialugarTrabajo=='SIN INFORMACION'&&$denunciado->variatelefonoTrabajo=='SIN INFORMACION'&&$denunciado->TrabajoCalle=='SIN INFORMACION')@else                                                                
                                    <div id="trabajo" class="row">
                                        
                                        <div class="col-12" style="text-align:center">
                                            <p>
                                                <h5 class="detalle">Datos del trabajo</h5>
                                            </p>
                                        </div>
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('lugarTrabajo', 'Lugar de trabajo:', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('lugarTrabajo', $denunciado->varialugarTrabajo, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('telefonoTrabajo', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('telefonoTrabajo', $denunciado->variatelefonoTrabajo, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-12">
                                            <div class="form-group">
                                                {!! Form::label('direccionTrabajo', 'Direccion del trabajo: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('entidadFederativa', $denunciado->TrabajoEstado, ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::label('',$denunciado->TrabajoMunicipio , ['class' => 'col-form-label-sm ']) !!}
                                                {!! Form::label('', $denunciado->TrabajoLocalidad, ['class' => 'col-form-label-sm']) !!}
                                                {!! Form::label('', $denunciado->TrabajoColonia, ['class' => 'col-form-label-sm']) !!}
                                                
                                            </div>
                                        </div>
                                        
                                        <div class="col-4">
                                            <div class="form-group">
                                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('SIN INFORMACION', $denunciado->TrabajoCalle, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('cp', 'Codigo postal: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('SIN INFORMACION', $denunciado->TrabajoCp, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('num.Ext', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('12', $denunciado->TrabajoNumExterno, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                        
                                        <div class="col-2">
                                            <div class="form-group">
                                                {!! Form::label('num.Int', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                                {!! Form::label('12', $denunciado->TrabajoNumInterno, ['class' => 'col-form-label-sm']) !!}
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endif
                        
                        @if (!is_null($denunciado->pernombres)&&!is_null($denunciado->perprimerAp)&&!is_null($denunciado->persegundoAp))
                            <div id="notificaciones" class="row">
                                
                                <div class="col-12" style="text-align:center">
                                    <p>
                                        <h5 class="detalle">Domicilio para notificaciones</h5>
                                    </p>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('veracruz',$denunciado->notifiEstado ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('municipio',$denunciado->notifiMunicipio ,['class'=> 'col-form-label-sm '])!!}        
                                    </div>
                                </div>
                                
                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('localidad',$denunciado->notifiLocalidad ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                
                                <!--Codigo Postal-->
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                        {!!Form::label('nombre',$denunciado->notifiCp ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                
                                <!--colonia-->
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('colonia',$denunciado->notifiColonia ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('calle',$denunciado->notifiCalle ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('15',$denunciado->notifiNumExterno,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                        {!!Form::label('12',$denunciado->notifiNumInterno ,['class'=> 'col-form-label-sm '])!!}
                                    </div>
                                </div>
                            </div>
                        @endif                        
                        
                        <div id="denunciado" class="row">
                            
                            <div class="col-12" style="text-align:center">                                    
                                <p>
                                    <h5 class="detalle">Datos del denunciado</h5>
                                </p>
                            </div>
                            
                            @if ($denunciado->denunciadoalias===null||$denunciado->denunciadoalias=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('Alias', 'Alias: '.$denunciado->denunciadoalias , ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            @if ($denunciado->denunciadoingreso===null||$denunciado->denunciadoingreso=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('ingreso', 'Ingreso: '.$denunciado->denunciadoingreso , ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            @if ($denunciado->denunciadoperiodoIngreso===null||$denunciado->denunciadoperiodoIngreso=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('periodoIngreso', 'Periodo de ingreso: '.$denunciado->denunciadoperiodoIngreso , ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            @if ($denunciado->denunciadoresidenciaAnterior===null||$denunciado->denunciadoresidenciaAnterior=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('residenciaAnterior', 'Residencia anterior: '.$denunciado->denunciadoresidenciaAnterior , ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            @if ($denunciado->denunciadovestimenta===null||$denunciado->denunciadovestimenta=='SIN INFORMACION')@else                                                                
                                <div class="col-4">
                                    <div class="form-group">
                                        {!! Form::label('vestimenta', 'Vestimenta: '.$denunciado->denunciadovestimenta , ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>
                            @endif
                            
                            @if ($denunciado->denunciadoalias===null||$denunciado->denunciadoalias=='SIN INFORMACION')@else                                                                
                                <div class="col-12">
                                    <div class="form-group">
                                        {!! Form::label('senasPartic', 'Señas particulares: '.$denunciado->denunciadosenasPartic, ['class' => 'col-form-label-sm']) !!}
                                    </div>
                                </div>    
                            @endif
                                
                            @if ($denunciado->denunciadonarracion===null||$denunciado->denunciadonarracion=='SIN INFORMACION')@else                                                                

                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('narracion', 'Narración: ', ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('narracion', $denunciado->denunciadonarracion, ['class' => 'col-form-label-sm']) !!}        
                                </div>
                            </div>
                            @endif
                        </div>
                    @endif

                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection