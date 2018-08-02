@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Autoridades</h5></div>
                <div class="col text-right">
                    
                </div>
            </div>
        </div>
    </div>
    <div class="card">
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
        <div class="tab-content" id="myTabContent">
             @foreach ($autoridades as $autoridad)
                <div class="tab-pane fade" id="autoridad{{$autoridad->autoridadid}}" role="tabpanel" aria-labelledby="autoridad{{$autoridad->autoridadid}}-tab">    
                    <div class="col-12" style="text-align:center">
                        <p><h5 class="detalle">Datos personales<a class="btn btn-secondary float-right" href="{{route('narracion',$autoridad->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a></h5>
                        </p>
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
                                    <td colspan="2">{{$autoridad->pernombres}} {{$autoridad->perprimerAp}} {{$autoridad->persegundoAp}}</td>
                                    <td>{{$autoridad->persexo}}</td>
                                    <td>{{$autoridad->perrfc}}</td>
                                    <td>{{$autoridad->percurp}}</td>
                                    <td>{!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($autoridad->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Nacionalidad</th>
                                    <th>Etnia</th>
                                    <th>Lengua</th>
                                    <th colspan="2">Ocupacion</th>
                                    <th>Estado Civil</th>
                                </tr>
                                <tr>
                                    <td>{{$autoridad->peridNacionalidad}}</td>
                                    <td>{{$autoridad->peridEtnia}}</td>
                                    <td>{{$autoridad->peridLengua}}</td>
                                    <td colspan="2">{{$autoridad->variaidOcupacion}}</td>
                                    <td>{{$autoridad->variaidEstadoCivil}}</td>
                                </tr>
                                <tr class="table-active">
                                    <th>Religión</th>
                                    <th>Escolaridad</th>
                                    <th>Telefono</th>
                                    <th colspan="2">Documento de docIdentificación</th>
                                    <th>Num. de documento de identificación</th>
                                </tr>
                                <tr>
                                    <td>{{$autoridad->variaidReligion}}</td>
                                    <td>{{$autoridad->variaidEscolaridad}}</td>
                                    <td>{{$autoridad->variatelefono}}</td>
                                    <td colspan="2">{{$autoridad->variadocIdentificacion}}</td>
                                    <td>{{$autoridad->varianumDocIdentificacion}}</td>
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
                                            <td>{{$autoridad->domicilioEstado}}</td>
                                            <td>{{$autoridad->domicilioMunicipio}}</td>
                                            <td>{{$autoridad->domicilioLocalidad}}</td>
                                            <td>{{$autoridad->domicilioCp}}</td>
                                        </tr>
                                        <tr class="table-active">
                                            <th>Calle</th>
                                            <th>Colonia</th>
                                            <th>Num.Ext.</th>
                                            <th>Num.Ext.</th>
                                        </tr>
                                        <tr >
                                            <td>{{$autoridad->domicilioCalle}}</td>
                                            <td>{{$autoridad->domicilioColonia}}</td>
                                            <td>{{$autoridad->domicilioNumExterno}}</td>
                                            <td>{{$autoridad->domicilioNumInterno}}</td>
                                        </tr>
                                    </tbody>
                            </table>
                    </div>
                    <div id="trabajo" class="row">
                        <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos del trabajo</h5></p>
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
                                        <td>{{$autoridad->varialugarTrabajo}}</td>
                                        <td>{{$autoridad->variatelefonoTrabajo}}</td>
                                        <td>{{$autoridad->TrabajoEstado}}</td>
                                        <td>{{$autoridad->TrabajoMunicipio}}</td>
                                        <td>{{$autoridad->TrabajoLocalidad}}</td>
                                        
                                    </tr>
                                    <tr class="table-active">
                                        <th>Colonia</th>
                                        <th>Calle</th>
                                        <th>C.P.</th>
                                        <th>Num.Ext.</th>
                                        <th>Num.Ext.</th>
                                    </tr>
                                    <tr>
                                        <td>{{$autoridad->TrabajoColonia}}</td>
                                        <td>{{$autoridad->TrabajoCalle}}</td>
                                        <td>{{$autoridad->TrabajoCp}}</td>
                                        <td>{{$autoridad->TrabajoNumExterno}}</td>
                                        <td>{{$autoridad->TrabajoNumInterno}}</td>
                                    </tr>
                                </tbody>
                            </table>
                    </div>
                    <div id="autoridad" class="row">
                        <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos de la autoridad</h5></p>
                        </div>
                        <table class="table table-striped">
                            <thead class="table-secondary">
                                <th>Antiguedad</th>
                                <th>Rango</th>
                                <th>Horario Laboral</th>
                            </thead>
                            <tr>
                                <td>{{$autoridad->autoridadantiguedad}}</td>
                                <td>{{$autoridad->autoridadrango}}</td>
                                <td>{{$autoridad->autoridadhorarioLaboral}}</td>
                            </tr>
                        </table>
                    </div>
                 </div>
             @endforeach
        </div>
    </div>
</div>
@endsection
        
        