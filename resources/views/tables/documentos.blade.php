@php
$oficios = getImpresiones();
$data= getOficiosImpresos();

@endphp

@extends('template.form')
@section('title','Oficios')

@section('content')

<div id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <a class="btn " style="color:black;" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                    Basicos de la carpeta de investigación
                    </a>
                </h5>
            </div>
            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div>
                    <table class="table table-hover"  >
                                <thead>
                    
                                    <th>Nombre del oficio</th>
                                    <th style="text-align:center;">N. Impresiones realizadas</th>
                                    <th style="text-align:center;">Impresión</th>
                                                                 
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Caratula de carpeta de información</td>
                                        <td style="text-align:center;">
                                            <span class="badge badge-info right">{{$data['caratulaC']}}</span>
                                        </td>                              
                                        <td style="text-align:center;">
                                            <a href="{{ route("caratula",session('carpeta'))}}" title="imprimir" class=" hola btn-lg btn-secondary"><i class="fa fa-print"></i></a>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td>Formato de denuncia/querella </td>
                                        <td style="text-align:center;">
                                                {{-- <span class="badge badge-info right">{{$data['remicionC']}}</span> --}}
                                        </td>
                                        <td style="text-align:center;">
                                        <a href="{{ route("formato.denuncia",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                                        </td> 
                                    </tr>  
                                    <tr>
                                        <td style="text-align:left;">Acuerdo de inicio</td>
                                        <td style="text-align:center;">
                                            <span class="badge badge-info right">{{$data['acuerdoInicioc']}}</span>
                                        </td>
                                        <td style="text-align:center;">
                                            <a href="{{ route("impresion.acuerdoInicio",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                                        </td> 
                                    </tr>
                                      
                                </tbody>
                            </table>
                           
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <a class="btn collapsed" style="color:black;" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Vehiculos
                    </a>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div>
                    <table class="table table-hover"  >
                            <thead>
                
                                <th>Nombre del oficio</th>
                                <th style="text-align:center;">N. Impresiones realizadas</th>
                                <th style="text-align:center;">Impresión</th>
                                                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="text-align:left;">Oficio de Dirección Gral. Transporte</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['gralTransporte']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href=" {{ route("oficio.transporte",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr> 
                                {{-- @endisset --}}
                                <tr>
                                    <td>Oficio Finanzas</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['finanzasC']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route("show.ofFinanzas",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr> 
                                
                                <tr>
                                    <td>Para reporte de robo </td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right"></span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route("oficio.impRobo",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr> 
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingfour">
                <h5 class="mb-0">
                    <a class="btn  collapsed" style="color:black;" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                        Solicitudes
                    </a>
                </h5>
            </div>
            <div id="collapsefour" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div>
                    <table class="table table-hover"  >
                            <thead>
                
                                <th>Nombre del oficio</th>
                                <th style="text-align:center;">N. Impresiones realizadas</th>
                                <th style="text-align:center;">Impresión</th>
                                                                
                            </thead>
                            <tbody>
                                
                                <tr>
                                    <td>Oficio de Centro de atención a víctimas</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['cavdC']}}</span>
                                    </td> 
                                    <td style="text-align:center;">
                                        <a href="{{ route("show.oficioCavd",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>Oficio de Policía Ministerial</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['policiaMinC']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route("policia.ministerial",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr>  
                            </tbody>
                        </table>
                        
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingfive">
                <h5 class="mb-0">
                    <a class="btn collapsed" style="color:black;" data-toggle="collapse" data-target="#collapsefive" aria-expanded="false" aria-controls="collapsefive">
                        Estatus de la carpeta
                    </a>
                </h5>
            </div>
            <div id="collapsefive" class="collapse" style="color:black;" aria-labelledby="headingThree" data-parent="#accordion">
                <div>
                    <table class="table table-hover"  >
                            <thead>
                
                                <th>Nombre del oficio</th>
                                <th style="text-align:center;">N. Impresiones realizadas</th>
                                <th style="text-align:center;">Impresión</th>
                                                                
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Notificación de actuaciones a fiscal de distrito</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['actuacionesC']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route("not.actuaciones",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr> 
                                <tr>
                                    <td>Remisión fiscal de distrito</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['acuerdoRemisionC']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                        <a href="{{ route("fiscal.distrito",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr> 
                                <tr>
                                    <td>Notificación de archivo temporal</td>
                                    <td style="text-align:center;">
                                        <span class="badge badge-info right">{{$data['temporalC']}}</span>
                                    </td> 
                                    <td style="text-align:center;">
                                        <a href="{{ route("impresion.temporal",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td>Acuerdo de remisión </td>
                                    <td style="text-align:center;">
                                            <span class="badge badge-info right">{{$data['remicionC']}}</span>
                                    </td>
                                    <td style="text-align:center;">
                                    <a href="{{ route("oficio.remision",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                                    </td> 
                                </tr>  
                            </tbody>
                        </table>
                        
                </div>
            </div>
        </div>





       
    </div>
</div>    


@endsection

