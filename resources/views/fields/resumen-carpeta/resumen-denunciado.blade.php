@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Investigados</h5></div>
            </div>
        </div>
    </div>
    <div class="card">
        <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
            @foreach ($denunciados as $denunciado)
                <li class="nav-item">
                    <a class="nav-link" id="denunciado{{$denunciado->denunciadoid}}-tab" data-toggle="tab" href="#denunciado{{$denunciado->denunciadoid}}" role="tab" aria-controls="denunciado{{$denunciado->denunciadoid}}" aria-selected="false">
                        {{$denunciado->pernombres." ".$denunciado->perprimerAp." ".$denunciado->persegundoAp}}
                    </a>
                </li>
            @endforeach    
        </ul>
        
        <div class="tab-content" id="myTabContent">
            @foreach ($denunciados as $denunciado)
                <div class="tab-pane fade" id="denunciado{{$denunciado->denunciadoid}}" role="tabpanel" aria-labelledby="denunciado{{$denunciado->denunciadoid}}-tab">    
                    @if ($denunciado->pernombres=='QUIEN RESULTE RESPONSABLE')
                        <div class="col-12" style="text-align:center">
                            <p><h5 class="detalle">Se desconoce la información del implicado ó implicados</h5></p>
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
                                <table class="table table-striped">
                                    <thead class="table-secondary">
                                        <th colspan="2">Nombre</th>
                                        <th>Sexo</th>
                                        <th>R.F.C.</th>
                                        <th>CURP</th>
                                        <TH>Fecha de nacimiento</TH>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            @if ($denunciado->perprimerAp===null||$denunciado->perprimerAp=='SIN INFORMACION')
                                            @endif
                                            <td colspan="2">{{$denunciado->pernombres}} {{$denunciado->perprimerAp}} {{$denunciado->persegundoAp}}</td>
                                            <td>{{$denunciado->persexo}}</td>
                                            @if ($denunciado->perrfc===null||$denunciado->perrfc==='')
                                                <td>SIN INFORMACIÓN</td>
                                            @else
                                            <td>{{$denunciado->perrfc}}</td>
                                            @endif
                                            @if ($denunciado->percurp===null||$denunciado->percurp==='')
                                                <td>SIN INFORMACIÓN</td>
                                            @else
                                            <td>{{$denunciado->percurp}}</td>
                                            @endif
                                            @if ($denunciado->perfechaNacimiento===null)
                                            <td>SIN INFORMACIÓN</td>
                                            @else
                                            <td>{!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y'))!!}</td>
                                            @endif
                                        </tr>
                                        <tr class="table-active">
                                            <th>Nacionalidad</th>
                                            <th>Etnia</th>
                                            <th>Lengua</th>
                                            <th colspan="2">Ocupacion</th>
                                            <th>Estado Civil</th>
                                        </tr>
                                        <tr>
                                            <td>{{$denunciado->peridNacionalidad}}</td>
                                            <td>{{$denunciado->peridEtnia}}</td>
                                            <td>{{$denunciado->peridLengua}}</td>
                                            <td colspan="2">{{$denunciado->variaidOcupacion}}</td>
                                            <td>{{$denunciado->variaidEstadoCivil}}</td>
                                        </tr>
                                        <tr class="table-active">
                                            <th>Religión</th>
                                            <th>Escolaridad</th>
                                            <th>Telefono</th>
                                            <th colspan="2">Documento de docIdentificación</th>
                                            <th>Num. de documento de identificación</th>
                                        </tr>
                                        <tr>
                                            <td>{{$denunciado->variaidReligion}}</td>
                                            <td>{{$denunciado->variaidEscolaridad}}</td>
                                            <td>{{$denunciado->variatelefono}}</td>
                                            <td colspan="2">{{$denunciado->variadocIdentificacion}}</td>
                                            <td>{{$denunciado->varianumDocIdentificacion}}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>    
                        @else
                            <div id="personales-empresa" class="row">
                                <table class="table table-striped">
                                        <thead class="table-secondary">
                                                <th>Nombre</th>
                                                <th>Fecha alta de la empresa</th>
                                                <th>R.F.C</th>
                                                <th colspan="2">Representante legal</th>
                                            </thead>
                                            <tr>
                                                <td>{{$denunciado->pernombres}}</td>
                                                <td>{!! Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!}</td>
                                                <td>{{$denunciado->perrfc}}</td>
                                                <td colspan="2">{{$denunciado->variarepresentanteLegal}}</td>
                                            </tr>
                                    </table>
                            </div>
                        @endif
                        
                        
                        <div id="direccion" class="row">
                            <div class="col-12" style="text-align:center"><p><h5 class="detalle">Dirección</h5></p>
                                </div>
                                <table class="table table-striped ">
                                        <tbody>
                                            <thead class="table-secondary">
                                                <th>Entidad Federativa</th>
                                                <th>Municipio</th>
                                                <th>Localidad</th>
                                                <th>C.P.</th>  
                                            </thead>
                                            <tr>
                                                <td>{{$denunciado->domicilioEstado}}</td>
                                                <td>{{$denunciado->domicilioMunicipio}}</td>
                                                <td>{{$denunciado->domicilioLocalidad}}</td>
                                                <td>{{$denunciado->domicilioCp}}</td>
                                            </tr>
                                            <tr class="table-active">
                                                <th>Calle</th>
                                                <th>Colonia</th>
                                                <th>Num.Ext.</th>
                                                <th>Num.Interno</th>
                                            </tr>
                                            <tr>
                                                <td>{{$denunciado->domicilioCalle}}</td>
                                                <td>{{$denunciado->domicilioColonia}}</td>
                                                <td>{{$denunciado->domicilioNumExterno}}</td>
                                                <td>{{$denunciado->notifiNumInterno}}</td>
                                            </tr>
                                        </tbody>
                                    </table>

                        </div>

                        @if ($denunciado->peresEmpresa==0)
                            @if (!is_null($denunciado->pernombres)&&!is_null($denunciado->perprimerAp)&&!is_null($denunciado->persegundoAp))                                                                
                                
                                @if ($denunciado->varialugarTrabajo=='SIN INFORMACION'&&$denunciado->variatelefonoTrabajo=='SIN INFORMACION'&&$denunciado->TrabajoCalle=='SIN INFORMACION')@else                                                                
                                    <div id="trabajo" class="row">
                                        <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos del trabajo</h5></p>
                                        </div>
                                        <table class="table table-striped">
                                                <thead class="table-secondary">
                                                    <th colspan="2">Lugar de trabajo</th>
                                                    <th>Teléfono</th>  
                                                    <th>Estado</th> 
                                                    <th>Municipio</th>                                 
                                                    <th>Localidad</th>
                                                </thead>
                                                <tr>
                                                    <td>{{$denunciado->varialugarTrabajo}}</td>
                                                    <td>{{$denunciado->variatelefonoTrabajo}}</td>
                                                    <td>{{$denunciado->TrabajoEstado}}</td>
                                                    <td>{{$denunciado->TrabajoLocalidad}}</td>
                                                </tr>
                                                <tr class="table-active">
                                                        <th>Colonia</th>
                                                        <th colspan="2">Calle</th>
                                                        <th>CP</th>
                                                        <TH>Num.Externo</TH>
                                                        <th>Num.Interno</th>
                                                </tr>
                                                <tr>
                                                        <td>{{$denunciado->TrabajoColonia}}</td>
                                                        <td>{{$denunciado->TrabajoCalle}}</td>
                                                        <td>{{$denunciado->TrabajoCp}}</td>
                                                        <td>{{$denunciado->TrabajoNumExterno}}</td>
                                                        <td>{{$denunciado->TrabajoNumInterno}}</td>
                                                </tr>
                                            </table>
                                        
                                    </div>
                                @endif
                            @endif
                        @endif
                        
                        @if (!is_null($denunciado->pernombres)&&!is_null($denunciado->perprimerAp)&&!is_null($denunciado->persegundoAp))
                            <div id="notificaciones" class="row">
                                <div class="col-12" style="text-align:center"><p><h5 class="detalle">Domicilio para notificaciones</h5></p>
                                </div>
                                <table class="table table-striped">
                                        <tbody>
                                                <thead class="table-secondary">
                                                    <th>Entidad Federativa</th>
                                                    <th>Municipio</th>
                                                    <th>Localidad</th>
                                                    <th>C.P.</th>  
                                                </thead>
                                                <tr>
                                                    <td>{{$denunciado->notifiEstado}}</td>
                                                    <td>{{$denunciado->notifiMunicipio}}</td>
                                                    <td>{{$denunciado->notifiLocalidad}}</td>
                                                    <td>{{$denunciado->notifiCp}}</td>
                                                </tr>
                                                <tr class="table-active">
                                                    <th>Calle</th>
                                                    <th>Colonia</th>
                                                    <th>Num.Ext.</th>
                                                    <th>Num.Interno</th>
                                                </tr>
                                                <tr>
                                                    <td>{{$denunciado->notifiCalle}}</td>
                                                    <td>{{$denunciado->notifiColonia}}</td>
                                                    <td>{{$denunciado->notifiNumExterno}}</td>
                                                    <td>{{$denunciado->notifiNumInterno}}</td>
                                                </tr>
                                            </tbody>

                                </table>
                            </div>
                        @endif                        
                        
                        <div id="denunciado" class="row">
                            <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos del denunciado</h5></p>
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