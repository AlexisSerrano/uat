@extends('fields.resumen-carpeta.resumen-carpeta')
@section('detalle')
<div class="col-10">
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col text-left"><h5>Victima u ofendido</h5></div>
            </div>
        </div>
    </div>
        <ul class="nav nav-tabs" id="myTab" aria-orientation="vertical" role="tablist">
        @foreach ($denunciantes as $denunciante)
        <li class="nav-item">
            <a class="btn btn-secondary nav-link" style="color:aliceblue" id="denunciante{{$denunciante->denuncianteid}}-tab" data-toggle="tab" href="#denunciante{{$denunciante->denuncianteid}}" role="tab" aria-controls="denunciante{{$denunciante->denuncianteid}}" aria-selected="false">
                    {{$denunciante->pernombres." ".$denunciante->perprimerAp." ".$denunciante->persegundoAp}}
                </a>
                {{-- <a class="btn btn-secondary float-right" href="{{route('narracion',$denunciante->variaid)}}">Ampliaciones <i class="fa fa-plus-square" aria-hidden="true"></i></a> --}}
            </li>
            @endforeach
        </ul>
        <div class="card">
            <div class="tab-content" id="myTabContent">
                @foreach ($denunciantes as $denunciante)
                    <div class="tab-pane fade" id="denunciante{{$denunciante->denuncianteid}}" role="tabpanel" aria-labelledby="denunciante{{$denunciante->denuncianteid}}-tab">    
                            
                        <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos personales</h5></p>  
                        </div>

                                            
                        @if ($denunciante->peresEmpresa==0)
                            <div id="personales-persona" class="row">
                                    <table class="table table-striped" style="text-align:left">
                                            <thead class="table-secondary">
                                                <th colspan="2">Nombre</th>
                                                <th>Fecha de nacimiento</th>
                                                <th>R.F.C.</th>
                                                <th>CURP</th>   
                                            </thead>
                                            <tr>
                                                <td colspan="2">{{$denunciante->pernombres}} {{$denunciante->perprimerAp}} {{$denunciante->persegundoAp}}</td>
                                                <td> {!!Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciante->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') ,['class'=> 'col-form-label-sm '])!!}	</td>                                    
                                                <td>{{$denunciante->perrfc}}</td>
                                                <td>{{$denunciante->percurp}}</td>
                                            </tr>
                                            <tr class="table-active">
                                                <th>Sexo</th>
                                                <th colspan="2">Telefono</th>
                                                <th>Etnía</th>
                                                <th>Lengua</th>
                                            </tr>
                                            <tr>
                                                <td>{{$denunciante->persexo}}</td>
                                                <td colspan="2">{{$denunciante->variatelefono}}</td>
                                                <td>{{$denunciante->peridEtnia}}</td>
                                                <td>{{$denunciante->peridLengua}}</td>     
                                            </tr>
                                            <tr class="table-active"><th colspan="2">Ocupación</th>
                                                <th>Estado Civil</th>
                                                <th>Religión</th>
                                                <th>Escolaridad</th>     
                                            </tr>
                                            <tr><td colspan="2">{{$denunciante->variaidOcupacion}}</td>
                                                <td>{{$denunciante->variaidEstadoCivil}}</td>
                                                <td>{{$denunciante->variaidReligion}}</td>
                                                <td>{{$denunciante->variaidEscolaridad}}</td>                                        
                                            </tr>
                                            <tr class="table-active">
                                                <th>Nacionalidad</TH>
                                                <th colspan="2">Doc. de identificación</th>
                                                <TH colspan="2">Num. documento de identificación</TH>
                                            </tr>
                                            <tr>
                                                <td>{{$denunciante->peridNacionalidad}}</td>
                                                <td colspan="2">{{$denunciante->variadocIdentificacion}}</td>
                                                <td colspan="2">{{$denunciante->varianumDocIdentificacion}}</td>
                                            </tr>
                                            <tr class="table-active">
                                                <th colspan="5">DIRECCIÓN</th>
                                            </tr>
                                            <TR>
                                                <td colspan="5">CALLE {{$denunciante->domicilioCalle}},NUM.EXTERNO:{{$denunciante->domicilioNumExterno}},
                                                NUM.INTERNO:{{$denunciante->domicilioNumInterno}}, MUNICIPIO {{$denunciante->domicilioMunicipio}},
                                                LOCALIDAD {{$denunciante->domicilioLocalidad}}, C.P:{{$denunciante->domicilioCp}},
                                                COL.{{$denunciante->domicilioColonia}}.
                                                </td>
                                            </TR>
                                        </table>
                            </div>
                           
                        @else
                            <div id="personales-empresa" class="row">
                                    <table class="table table-striped " style="text-align:left" id="empresa">
                                            <thead class="table-secondary">
                                                <th>Nombre</th>
                                                <th>Fecha alta de la empresa</th>
                                                <th>R.F.C</th>
                                                <th colspan="2">Representante legal</th>
                                            </thead>
                                            <tr>
                                                <td>{{$denunciante->pernombres}}</td>
                                                <td>{!! Form::label('fechaNacimiento',Jenssegers\Date\Date::parse($denunciante->perfechaNacimiento)->format('j \\d\\e F \\d\\e Y') , ['class' => 'col-form-label-sm']) !!}</td>
                                                <td>{{$denunciante->perrfc}}</td>
                                                <td colspan="2">{{$denunciante->variarepresentanteLegal}}</td>
                                            </tr>
                                        </table>
                            </div>
                        @endif
                           
                        @if ($denunciante->peresEmpresa==0)
                            <div id="trabajo" class="row">
                                <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos del trabajo</h5></p>
                                    <table class="table table-striped " id="trabajo">
                                                <thead class="table-secondary">
                                                    <th>Lugar de trabajo</th>
                                                    <th>Telefono</th>
                                                    <th>Estado</th>
                                                    <th>Municipio</th>
                                                    <th>Localidad</th>
                                                    <th>Colonia</th>
                                                    <th>Calle</th>
                                                    <th>C.P.</th>
                                                    <th>Num.Ext.</th>
                                                    <th>Num.Ext.</th>
                                                </thead>
                                                <tr>
                                                    <td>{{$denunciante->varialugarTrabajo}}</td>
                                                    <td>{{$denunciante->variatelefonoTrabajo}}</td>
                                                    <td>{{$denunciante->TrabajoEstado}}</td>
                                                    <td>{{$denunciante->TrabajoMunicipio}}</td>
                                                    <td>{{$denunciante->TrabajoLocalidad}}</td>
                                                    <td>{{$denunciante->TrabajoColonia}}</td>
                                                    <td>{{$denunciante->TrabajoCalle}}</td>
                                                    <td>{{$denunciante->TrabajoCp}}</td>
                                                    <td>{{$denunciante->TrabajoNumExterno}}</td>
                                                    <td>{{$denunciante->TrabajoNumInterno}}</td>
                                                </tr>
                                        </table>
                                </div>
                            </div>
                        @endif
                            <div id="notificaciones" class="row">
                                <div class="col-12" style="text-align:center"><p><h5 class="detalle">Domicilio para notificaciones</h5></p>
                                <table class="table table-striped ">
                                        <tbody>
                                            <thead class="table-secondary">
                                                <th>Entidad Federativa</th>
                                                <th>Municipio</th>
                                                <th>Localidad</th>
                                                <th>C.P.</th>  
                                            </thead>
                                            <tr>
                                                <td>{{$denunciante->notifiEstado}}</td>
                                                <td>{{$denunciante->notifiMunicipio}}</td>
                                                <td>{{$denunciante->notifiLocalidad}}</td>
                                                <td>{{$denunciante->notifiCp}}</td>
                                            </tr>
                                            <tr class="table-active">
                                                <th>Calle</th>
                                                <th>Colonia</th>
                                                <th>Num.Ext.</th>
                                                <th>Num.Ext.</th>
                                            </tr>
                                            <tr >
                                                <td>{{$denunciante->notifiCalle}}</td>
                                                <td>{{$denunciante->notifiColonia}}</td>
                                                <td>{{$denunciante->notifiNumExterno}}</td>
                                                <td>{{$denunciante->notifiNumInterno}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        
                        <div id="denunciante" class="row">
                            <div class="col-12" style="text-align:center"><p><h5 class="detalle">Datos de la victima u ofendido</h5></p>
                            </div>
                            <table class="table table-striped ">
                                    <thead class="table-secondary">
                                        <th>Identidad Resguardada</th>
                                        <th>Alias</th>
                                        <th>Tipo de solicitante</th>
                                        <th colspan="3" >Narración</th>
                                    </thead>
                                    <tr>
                                        @if (!is_null($denunciante->denunciantereguardarIdentidad))
                                        <td>SI</td>@else
                                        <td>NO</td>@endif
                                        @if (!is_null($denunciante->denunciantereguardarIdentidad))
                                        <td>{{$denunciante->denunciantereguardarIdentidad}}</td>@else
                                        <td>Sin información</td>@endif
                                        @if ($denunciante->denunciantevictima==1)
                                        <td>Victima</td>@else
                                        <td>Ofendiddo</td>@endif
                                        <td colspan="3">{{$denunciante->denunciantenarracion}}</td>
                                    </tr>
                            </table>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
</div>

    @endsection
    
   