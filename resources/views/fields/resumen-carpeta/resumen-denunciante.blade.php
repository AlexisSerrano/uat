@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Victima u ofendido</h5></div>
            <div class="col text-right">
                
            </div>
        </div>
    </div>
    {{-- inicio pruebas de taps con denuncuante --}}
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($denunciantes as $denunciante)
            <li class="nav-item">
                {{-- <div class="row">
                    <div class="col"> --}}
                        <a class="nav-link" id="denunciante{{$denunciante->denuncianteid}}-tab" data-toggle="tab" href="#denunciante{{$denunciante->denuncianteid}}" role="tab" aria-controls="denunciante{{$denunciante->denuncianteid}}" aria-selected="false">
                            {{$denunciante->pernombres." ".$denunciante->perprimerAp." ".$denunciante->persegundoAp}}
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
            @foreach ($denunciantes as $denunciante)
                <div class="tab-pane fade" id="denunciante{{$denunciante->denuncianteid}}" role="tabpanel" aria-labelledby="denunciante{{$denunciante->denuncianteid}}-tab">    
                    <div class="col-12" style="text-align:center">
                        <p>
                            <h5 class="detalle">Datos personales
                                <a class="btn btn-secondary float-right" href="{{route('narracion',$denunciante->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>

                            </h5>
                        </p>
                    </div>
                                        
                    @if ($denunciante->peresEmpresa==0)
                        <div id="personales-persona" class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                    {!!Form::label('nombre',$denunciante->pernombres ,['class'=> 'col-form-label-sm '])!!}
                                    {!!Form::label('primerAp',$denunciante->perprimerAp ,['class'=> 'col-form-label-sm '])!!}
                                    {!!Form::label('segundoAp',$denunciante->persegundoAp ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>  
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                                    {!!Form::label('sexo',$denunciante->persexo ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('rfc' ,$denunciante->perrfc,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('curp',$denunciante->percurp ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciante->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('nacionalidad',$denunciante->peridNacionalidad ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('Etnia',$denunciante->peridEtnia ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('Lengua',$denunciante->peridLengua ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('ocupacion',$denunciante->variaidOcupacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('casado',$denunciante->variaidEstadoCivil ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('religion', 'Religion: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('religion',$denunciante->variaidReligion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('escolaridad', 'Escolaridad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('escolaridad',$denunciante->variaidEscolaridad ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('telefono',$denunciante->variatelefono ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('nombre',$denunciante->variadocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!!Form::label('doc',$denunciante->varianumDocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                                </div>
                            </div>
                            
                        </div>    
                    @else
                        <div id="personales-empresa" class="row">
                            <div class="col-8">
                                <div class="form-group">
                                    {!! Form::label('nombres2', 'Nombre:', ['class' => 'detalle col-form-label-sm']) !!}
                                    {!! Form::label('nombres2', $denunciante->pernombres, ['class' => ' col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-8">
                                <div class="form-group">
                                    {!! Form::label('fechaAltaEmpresa', 'Fecha de alta de la empresa:', ['class' => 'detalle col-form-label-sm']) !!}
                                    {{-- <input type="date" id="fechaAltaEmpresa" value="{{fechaNac}}" name="fechaNacimiento" class="col-form-label-sm" data-validation="required"> --}}
                                    {!! Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciante->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!} 	
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('rfc2', 'R.F.C.:', ['class' => ' detalle col-form-label-sm']) !!}
                                    {!! Form::label('rfc2', $denunciante->perrfc, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('representanteLegal', 'Representante legal: ', ['class' => 'detalle col-form-label-sm']) !!}
                                    {!! Form::label('representanteLegal',  $denunciante->variarepresentanteLegal, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                        </div>
                    @endif
                    
                    
                    <div id="direccion" class="row">
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('veracruz',$denunciante->domicilioEstado ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('municipio',$denunciante->domicilioMunicipio ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('localidad',$denunciante->domicilioLocalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--Codigo Postal-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$denunciante->domicilioCp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--colonia-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('colonia',$denunciante->domicilioColonia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('calle',$denunciante->domicilioCalle ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('15',$denunciante->domicilioNumExterno,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('12',$denunciante->domicilioNumInterno ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                    </div>

                    @if ($denunciante->peresEmpresa==0)
                        <div id="trabajo" class="row">
                            
                            <div class="col-12" style="text-align:center">
                                <p>
                                    <h5 class="detalle">Datos del trabajo</h5>
                                </p>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('lugarTrabajo', 'Lugar de trabajo:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('lugarTrabajo', $denunciante->varialugarTrabajo, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('telefonoTrabajo', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('telefonoTrabajo', $denunciante->variatelefonoTrabajo, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-12">
                                <div class="form-group">
                                    {!! Form::label('direccionTrabajo', 'Direccion del trabajo: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('entidadFederativa', $denunciante->TrabajoEstado, ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('municipio',$denunciante->TrabajoMunicipio , ['class' => 'col-form-label-sm ']) !!}
                                    {!! Form::label('localidad', $denunciante->TrabajoLocalidad, ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::label('colonia', $denunciante->TrabajoColonia, ['class' => 'col-form-label-sm']) !!}
                                    
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciante->TrabajoCalle, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    {!! Form::label('cp', 'Codigo postal: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciante->TrabajoCp, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    {!! Form::label('num.Ext', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciante->TrabajoNumExterno, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-2">
                                <div class="form-group">
                                    {!! Form::label('num.Int', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('12', $denunciante->TrabajoNumInterno, ['class' => 'col-form-label-sm']) !!}
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
                                {!!Form::label('veracruz',$denunciante->notifiEstado ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('municipio',$denunciante->notifiMunicipio ,['class'=> 'col-form-label-sm '])!!}        
                            </div>
                        </div>
                        
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('localidad',$denunciante->notifiLocalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--Codigo Postal-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$denunciante->notifiCp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--colonia-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('colonia',$denunciante->notifiColonia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('calle',$denunciante->notifiCalle ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('15',$denunciante->notifiNumExterno,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('12',$denunciante->notifiNumInterno ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                    </div>
                    
                    <div id="denunciante" class="row">
                        
                        <div class="col-12" style="text-align:center">                                    
                            <p>
                                <h5 class="detalle">Datos de la victima u ofendido</h5>
                            </p>
                        </div>
                        @if (!is_null($denunciante->denunciantereguardarIdentidad))
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Identidad resguardada: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('respuesta', 'SI', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                            
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Alias:', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('Alias', $denunciante->denunciantereguardarIdentidad, ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>    
                        @else
                            <div class="col-4">
                                <div class="form-group">
                                    {!! Form::label('reguardarIdentidad', 'Identidad resguardada: ', ['class' => 'col-form-label-sm detalle']) !!}
                                    {!! Form::label('respuesta', 'NO', ['class' => 'col-form-label-sm']) !!}
                                </div>
                            </div>
                        @endif

                        @if ($denunciante->denunciantevictima==1)
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
                        @endif
                        

                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('narracion', 'Narración: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('narracion', $denunciante->denunciantenarracion, ['class' => 'col-form-label-sm']) !!}        
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</div>
@endsection

