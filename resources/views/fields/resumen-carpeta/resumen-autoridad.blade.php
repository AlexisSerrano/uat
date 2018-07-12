@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col text-left"><h5>Autoridades</h5></div>
            <div class="col text-right">
                
            </div>
        </div>
    </div>
    {{-- inicio pruebas de taps con denuncuante --}}
    <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($autoridades as $autoridad)
            <li class="nav-item">
                <a class="nav-link" id="autoridad{{$autoridad->autoridadid}}-tab" data-toggle="tab" href="#autoridad{{$autoridad->autoridadid}}" role="tab" aria-controls="autoridad{{$autoridad->autoridadid}}" aria-selected="false">
                    {{$autoridad->pernombres." ".$autoridad->perprimerAp." ".$autoridad->persegundoAp}}
                </a>
            </li>
        @endforeach
    </ul>
    
    <div class="card-body">
        <div class="tab-content" id="myTabContent">
            @foreach ($autoridades as $autoridad)
                <div class="tab-pane fade" id="autoridad{{$autoridad->autoridadid}}" role="tabpanel" aria-labelledby="autoridad{{$autoridad->autoridadid}}-tab">    
                    <div class="col-12" style="text-align:center">
                        <p>
                            <h5 class="detalle">Datos personales
                                <a class="btn btn-secondary float-right" href="{{route('narracion',$autoridad->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a>

                            </h5>
                        </p>
                    </div>
                                        
                    <div id="personales-persona" class="row">
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nombres', 'Nombre: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$autoridad->pernombres ,['class'=> 'col-form-label-sm '])!!}
                                {!!Form::label('primerAp',$autoridad->perprimerAp ,['class'=> 'col-form-label-sm '])!!}
                                {!!Form::label('segundoAp',$autoridad->persegundoAp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>  
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('sexo', 'Sexo: ', ['class' => 'col-form-label-sm detalle'])!!}
                                {!!Form::label('sexo',$autoridad->persexo ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('rfc', 'R.F.C.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('rfc' ,$autoridad->perrfc,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('curp', 'C.U.R.P.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('curp',$autoridad->percurp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('fechaNacimiento', 'Fecha de nacimiento: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($autoridad->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('nacionalidad', 'nacionalidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('nacionalidad',$autoridad->peridNacionalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('etnia', 'Etnia:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('Etnia',$autoridad->peridEtnia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('lengua', 'Lengua:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('Lengua',$autoridad->peridLengua ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('ocupacion', 'Ocupacion:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('ocupacion',$autoridad->variaidOcupacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('estCivil', 'Estado civil:', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('casado',$autoridad->variaidEstadoCivil ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('religion', 'Religion: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('religion',$autoridad->variaidReligion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('escolaridad', 'Escolaridad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('escolaridad',$autoridad->variaidEscolaridad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('telefono1', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('telefono',$autoridad->variatelefono ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('docIdentificacion', 'Documento de identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('nombre',$autoridad->variadocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('numDocIdentificacion', 'Núm. identificación: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('doc',$autoridad->varianumDocIdentificacion ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                    </div>    

                    
                    <div id="direccion" class="row">
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idEstado', 'Entidad federativa: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('veracruz',$autoridad->domicilioEstado ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idMunicipio', 'Municipio: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('municipio',$autoridad->domicilioMunicipio ,['class'=> 'col-form-label-sm '])!!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idLocalidad', 'Localidad: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('localidad',$autoridad->domicilioLocalidad ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--Codigo Postal-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('cp', 'Código postal: ', ['class' => 'col-form-label-sm detalle ']) !!}
                                {!!Form::label('nombre',$autoridad->domicilioCp ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <!--colonia-->
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('idColonia', 'Colonia: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('colonia',$autoridad->domicilioColonia ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('calle',$autoridad->domicilioCalle ,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numExterno', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('15',$autoridad->domicilioNumExterno,['class'=> 'col-form-label-sm '])!!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('numInterno1', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!!Form::label('12',$autoridad->domicilioNumInterno ,['class'=> 'col-form-label-sm '])!!}
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
                                {!! Form::label('lugarTrabajo', $autoridad->varialugarTrabajo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('telefonoTrabajo', 'Teléfono: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('telefonoTrabajo', $autoridad->variatelefonoTrabajo, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-12">
                            <div class="form-group">
                                {!! Form::label('direccionTrabajo', 'Direccion del trabajo: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('entidadFederativa', $autoridad->TrabajoEstado, ['class' => 'col-form-label-sm']) !!}, 
                                {!! Form::label('municipio',$autoridad->TrabajoMunicipio , ['class' => 'col-form-label-sm ']) !!}, 
                                {!! Form::label('localidad', $autoridad->TrabajoLocalidad, ['class' => 'col-form-label-sm']) !!}, 
                                {!! Form::label('colonia', $autoridad->TrabajoColonia, ['class' => 'col-form-label-sm']) !!}
                                
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('calle', 'Calle: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $autoridad->TrabajoCalle, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('cp', 'Codigo postal: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $autoridad->TrabajoCp, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('num.Ext', 'Núm.Ext.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $autoridad->TrabajoNumExterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                        
                        <div class="col-2">
                            <div class="form-group">
                                {!! Form::label('num.Int', 'Núm.Int.: ', ['class' => 'col-form-label-sm detalle']) !!}
                                {!! Form::label('12', $autoridad->TrabajoNumInterno, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>
                    </div>
                    
                    <div id="autoridad" class="row">
                        
                        <div class="col-12" style="text-align:center">                                    
                            <p>
                                <h5 class="detalle">Datos de la autoridad</h5>
                            </p>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Antiguedad: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $autoridad->autoridadantiguedad, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Rango: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $autoridad->autoridadrango, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                        <div class="col-4">
                            <div class="form-group">
                                {!! Form::label('victima', 'Horario Laboral: ', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::label('victima', $autoridad->autoridadhorarioLaboral, ['class' => 'col-form-label-sm']) !!}
                            </div>
                        </div>    
                    
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</div>
@endsection

