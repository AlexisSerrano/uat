@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Denunciante</h5></div>
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
                    <div class="col-12" style="text-align:center">
                        <p>
                            <h5 class="detalle">Datos personales
                                <a class="btn btn-secondary float-right" href="{{route('narracion',$denunciado->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>

                            </h5>
                        </p>
                    </div>
                                        
                    @if ($denunciado->peresEmpresa==0)
                        <div id="personales-persona" class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                    {!!Form::label('nombre',$denunciado->pernombres ,['class'=> 'col-form-label-sm '])!!}
                                    {!!Form::label('primerAp',$denunciado->perprimerAp ,['class'=> 'col-form-label-sm '])!!}
                                    {!!Form::label('segundoAp',$denunciado->persegundoAp ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>  
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                                    {!!Form::label('sexo',$denunciado->persexo ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('rfc' ,$denunciado->perrfc,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('curp',$denunciado->percurp ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('nacionalidad',$denunciado->peridNacionalidad ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('Etnia',$denunciado->peridEtnia ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('Lengua',$denunciado->peridLengua ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('ocupacion',$denunciado->variaidOcupacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('casado',$denunciado->variaidEstadoCivil ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('religion', 'Religion: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('religion',$denunciado->variaidReligion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('escolaridad', 'Escolaridad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('escolaridad',$denunciado->variaidEscolaridad ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('telefono',$denunciado->variatelefono ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('nombre',$denunciado->variadocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('doc',$denunciado->varianumDocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
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
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('veracruz',$denunciado->domicilioEstado ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('municipio',$denunciado->domicilioMunicipio ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('localidad',$denunciado->domicilioLocalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--Codigo Postal-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$denunciado->domicilioCp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--colonia-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('colonia',$denunciado->domicilioColonia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('calle',$denunciado->domicilioCalle ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('15',$denunciado->domicilioNumExterno,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('12',$denunciado->domicilioNumInterno ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                    </div>

                    @if ($denunciado->peresEmpresa==0)
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
                                    {!! Form::label('municipio',$denunciado->TrabajoMunicipio , ['class' => 'col-form-label-sm ']) !!}
                                    {!! Form::label('localidad', $denunciado->TrabajoLocalidad, ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('colonia', $denunciado->TrabajoColonia, ['class' => 'col-form-label-sm']) !!}
                                    
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciado->TrabajoCalle, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    {!! Form::label('cp', 'Codigo postal: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciado->TrabajoCp, ['class' => 'col-form-label-sm']) !!}
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
                    
                    <div id="denunciado" class="row">
                        
                        <div class="col-12" style="text-align:center">                                    
                            <p>
                                <h5 class="detalle">Datos del denunciado</h5>
                            </p>
                        </div>
                        {{-- @if (!is_null($denunciado->denunciadoreguardarIdentidad))
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Identidad resguardada: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('respuesta', 'SI', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Alias:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('Alias', $denunciado->denunciadoreguardarIdentidad, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>    
                        @else
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Identidad resguardada: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('respuesta', 'NO', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                        @endif --}}

                        {{-- @if ($denunciado->denunciadovictima==1)
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('victima', 'Tipo de solicitante: ', ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('victima', 'VICTIMA', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                        @else
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('victima', 'Tipo de solicitante: ', ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('victima', 'OFENDIDO', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>    
                        @endif --}}
                        

                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('narracion', 'Narración: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('narracion', $denunciado->denunciadonarracion, ['class' => 'col-form-label-sm']) !!}        
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection