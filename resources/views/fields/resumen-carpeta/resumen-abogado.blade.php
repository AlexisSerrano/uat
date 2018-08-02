@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Abogados</h5></div>
            </div>
        </div>
    </div>
    <div class="card">
        <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
            @foreach ($abogados as $abogado)
                <li class="nav-item">
                    <a class="nav-link" id="abogado{{$abogado->abogadoid}}-tab" data-toggle="tab" href="#abogado{{$abogado->abogadoid}}" role="tab" aria-controls="abogado{{$abogado->abogadoid}}" aria-selected="false">
                        {{$abogado->pernombres." ".$abogado->perprimerAp." ".$abogado->persegundoAp}}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content" id="myTabContent">
            @foreach ($abogados as $abogado)
                <div class="tab-pane fade" id="abogado{{$abogado->abogadoid}}" role="tabpanel" aria-labelledby="abogado{{$abogado->abogadoid}}-tab">    
                    <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos personales</h5></p>
                    </div>
                                        
                    <div id="personales-persona" class="row">
                        <table class="table table-striped">
                                <thead class="table-secondary">
                                    <th colspan="2">Nombre</th>
                                    <th>Sexo</th>
                                    <th>R.F.C.</th>
                                    <th>CURP</th>
                                    <TH>Fecha de nacimiento</TH>
                                </thead>
                                <tr>
                                    <td colspan="2">{{$abogado->pernombres}} {{$abogado->perprimerAp}} {{$abogado->persegundoAp}}</td>
                                    <td>{{$abogado->persexo}}</td>
                                    <td>{{$abogado->perrfc}}</td>
                                    <td>{{$abogado->percurp}}</td>
                                    <td>{!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($abogado->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Nacionalidad</th>
                                    <th>Etnia</th>
                                    <th>Lengua</th>
                                    <th colspan="2">Ocupacion</th>
                                    <th>Estado Civil</th>
                                </tr>
                                <tr>
                                    <td>{{$abogado->peridNacionalidad}}</td>
                                    <td>{{$abogado->peridEtnia}}</td>
                                    <td>{{$abogado->peridLengua}}</td>
                                    <td colspan="2">{{$abogado->variaidOcupacion}}</td>
                                    <td>{{$abogado->variaidEstadoCivil}}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Religión</th>
                                    <th>Escolaridad</th>
                                    <th>Telefono</th>
                                    <th colspan="2">Documento de docIdentificación</th>
                                    <th>Num. de documento de identificación</th>
                                </tr>
                                <tr>
                                    <td>{{$abogado->variaidReligion}}</td>
                                    <td>{{$abogado->variaidEscolaridad}}</td>
                                    <td>{{$abogado->variatelefono}}</td>
                                    <td colspan="2">{{$abogado->variadocIdentificacion}}</td>
                                    <td>{{$abogado->varianumDocIdentificacion}}</td>
                                </tr>
                        </table>
                        
                    </div>    

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
                                        <td>{{$abogado->domicilioEstado}}</td>
                                        <td>{{$abogado->domicilioMunicipio}}</td>
                                        <td>{{$abogado->domicilioLocalidad}}</td>
                                        <td>{{$abogado->domicilioCp}}</td>
                                    </tr>
                                    <tr class="table-active">
                                        <th>Calle</th>
                                        <th>Colonia</th>
                                        <th>Num.Ext.</th>
                                        <th>Num.Ext.</th>
                                    </tr>
                                    <tr >
                                        <td>{{$abogado->domicilioCalle}}</td>
                                        <td>{{$abogado->domicilioColonia}}</td>
                                        <td>{{$abogado->domicilioNumExterno}}</td>
                                        <td>{{$abogado->domicilioNumInterno}}</td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>
    
                    <div id="trabajo" class="row">
                        <div class="col-12" style="text-align:center"><p><h5 class="detalle">Trabajo</h5></p>
                        </div>
                        <table class="table table-striped ">
                            <tbody>
                                <thead class="table-secondary">
                                    <th>Lugar de trabajo</th>
                                    <th>Telefono</th>
                                    <th>Estado</th>
                                    <th>Municipio</th>
                                    <th>Localidad</th>
                                    
                                </thead>
                                <tr>
                                    <td>{{$abogado->varialugarTrabajo}}</td>
                                    <td>{{$abogado->variatelefonoTrabajo}}</td>
                                    <td>{{$abogado->TrabajoEstado}}</td>
                                    <td>{{$abogado->TrabajoMunicipio}}</td>
                                    <td>{{$abogado->TrabajoLocalidad}}</td>
                                    
                                </tr>
                                <tr class="table-active">
                                    <th>Colonia</th>
                                    <th>Calle</th>
                                    <th>C.P.</th>
                                    <th>Num.Ext.</th>
                                    <th>Num.Ext.</th>
                                </tr>
                                <tr>
                                    <td>{{$abogado->TrabajoColonia}}</td>
                                    <td>{{$abogado->TrabajoCalle}}</td>
                                    <td>{{$abogado->TrabajoCp}}</td>
                                    <td>{{$abogado->TrabajoNumExterno}}</td>
                                    <td>{{$abogado->TrabajoNumInterno}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div>
                        
                    <div id="abogado" class="row">
                        <div class="col-12" style="text-align:center"><p> <h5 class="detalle">Datos de la abogado</h5></p>
                        </div>
                        <table class="table">
                            <thead class="table-secondary">
                                <th>Cedula Profesional</th>
                                <th>Sector</th>
                                <th>Tipo</th>
                                <th>Correo</th>
                            </thead>
                            <tr>
                                <td>{{$abogado->abogadocedulaProf}}</td>
                                <td>{{$abogado->abogadosector}}</td>
                                <td>{{$abogado->abogadotipo}}</td>
                                <td>{{$abogado->abogadocorreo}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
             @endforeach
        </div>
    </div>
</div>
                    @endsection
                    
                    
                    
                
                
                
    
    