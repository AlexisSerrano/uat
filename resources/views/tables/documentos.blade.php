@php
$oficios = getImpresiones();
$data= getOficiosImpresos();

@endphp

@extends('template.form')
@section('title','Oficios')

@section('content')
<div class="card">
        <table class="table table-hover"  >
            <thead>

                <th>Nombre del oficio</th>
                <th style="text-align:center;">N. Impresiones realizadas</th>
                <th style="text-align:center;">Impresión</th>
                                             
            </thead>
            <tbody>
                <tr>
                    <td style="text-align:left;">Acuerdo de inicio</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right">{{$data['acuerdoInicioc']}}</span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route("impresion.acuerdoInicio",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                    </td> 
                </tr> 
                @if($oficios['vehiculos']>=1)
                <tr>
                    <td style="text-align:left;">Oficio de Dirección Gral. Transporte</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right">{{$data['gralTransporte']}}</span>
                    </td>
                    <td style="text-align:center;">
                        <a href=" {{ route("oficio.transporte",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                    </td> 
                </tr> 
                    @endisset  
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
                    <td>Oficio de Policía Ministerial</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right">{{$data['policiaMinC']}}</span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route("policia.ministerial",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                    </td> 
                </tr>  
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
                    <td>Notificación de actuaciones a fiscal de distrito</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right">{{$data['actuacionesC']}}</span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route("not.actuaciones",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                    </td> 
                </tr> 
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
                    <td>Notificación de archivo temporal</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right">{{$data['temporalC']}}</span>
                    </td> 
                    <td style="text-align:center;">
                        <a href="{{ route("impresion.temporal",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i></a>
                    </td>
                </tr>
                <tr>
                    <td>Remisión fiscal de distrito</td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right"></span>
                    </td>
                    <td style="text-align:center;">
                        <a href="{{ route("fiscal.distrito",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
                    </td> 
                </tr>  
                <tr>
                    <td>Acuerdo de remisión </td>
                    <td style="text-align:center;">
                        <span class="badge badge-info right"></span>
                    </td>
                    <td style="text-align:center;">
                    <a href="{{ route("oficio.remision",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i></a>
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


@endsection

