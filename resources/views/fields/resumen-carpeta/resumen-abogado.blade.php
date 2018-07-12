@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Abogados</h5></div>
            <div class="col text-right">
                
            </div>
        </div>
    </div>
    {{-- inicio pruebas de taps con denuncuante --}}
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($abogados as $abogado)
            <li class="nav-item">
                <a class="nav-link" id="abogado{{$abogado->abogadoid}}-tab" data-toggle="tab" href="#abogado{{$abogado->abogadoid}}" role="tab" aria-controls="abogado{{$abogado->abogadoid}}" aria-selected="false">
                    {{$abogado->pernombres." ".$abogado->perprimerAp." ".$abogado->persegundoAp}}
                </a>
            </li>
        @endforeach
    </ul>
    
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            @foreach ($abogados as $abogado)
                <div class="tab-pane fade" id="abogado{{$abogado->abogadoid}}" role="tabpanel" aria-labelledby="abogado{{$abogado->abogadoid}}-tab">    
                    <div class="col-12" style="text-align:center">
                        <p>
                            <h5 class="detalle">Datos personales

                            </h5>
                        </p>
                    </div>
                                        
                    <div id="personales-persona" class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$abogado->pernombres ,['class'=> 'col-form-label-sm '])!!}
                                {!!Form::label('primerAp',$abogado->perprimerAp ,['class'=> 'col-form-label-sm '])!!}
                                {!!Form::label('segundoAp',$abogado->persegundoAp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>  
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                                {!!Form::label('sexo',$abogado->persexo ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('rfc' ,$abogado->perrfc,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('curp',$abogado->percurp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($abogado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('nacionalidad',$abogado->peridNacionalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('Etnia',$abogado->peridEtnia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('Lengua',$abogado->peridLengua ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('ocupacion',$abogado->variaidOcupacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('casado',$abogado->variaidEstadoCivil ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('religion', 'Religion: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('religion',$abogado->variaidReligion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('escolaridad', 'Escolaridad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('escolaridad',$abogado->variaidEscolaridad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('telefono',$abogado->variatelefono ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('nombre',$abogado->variadocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('doc',$abogado->varianumDocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                    </div>    

                    
                    <div id="direccion" class="row">
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('veracruz',$abogado->domicilioEstado ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('municipio',$abogado->domicilioMunicipio ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('localidad',$abogado->domicilioLocalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--Codigo Postal-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('SIN INFORMACION',$abogado->domicilioCp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--colonia-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('colonia',$abogado->domicilioColonia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('calle',$abogado->domicilioCalle ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('15',$abogado->domicilioNumExterno,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('12',$abogado->domicilioNumInterno ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                    </div>

                    <div id="trabajo" class="row">
                        
                        <div class="col-12" style="text-align:center">
                            <p>
                                <h5 class="detalle">Datos del trabajo</h5>
                            </p>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('lugarTrabajo', 'Lugar de trabajo:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('lugarTrabajo', $abogado->varialugarTrabajo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('telefonoTrabajo', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('telefonoTrabajo', $abogado->variatelefonoTrabajo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('direccionTrabajo', 'Direccion del trabajo: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('entidadFederativa', $abogado->TrabajoEstado, ['class' => 'col-form-label-sm']) !!},
                                {!! Form::label('municipio',$abogado->TrabajoMunicipio , ['class' => 'col-form-label-sm ']) !!},
                                {!! Form::label('localidad', $abogado->TrabajoLocalidad, ['class' => 'col-form-label-sm']) !!},
                                {!! Form::label('colonia', $abogado->TrabajoColonia, ['class' => 'col-form-label-sm']) !!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $abogado->TrabajoCalle, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('cp', 'Codigo postal: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $abogado->TrabajoCp, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('num.Ext', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $abogado->TrabajoNumExterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('num.Int', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $abogado->TrabajoNumInterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <div id="abogado" class="row">
                        
                        <div class="col-12" style="text-align:center">                                    
                            <p>
                                <h5 class="detalle">Datos de la abogado</h5>
                            </p>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Cedula profecional: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $abogado->abogadocedulaProf, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Sector: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $abogado->abogadosector, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Tipo: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $abogado->abogadotipo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Correo: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $abogado->abogadocorreo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                    
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</div>
@endsection

