@php
$oficios = getImpresiones();
@endphp

@extends('template.form')
@section('title','Oficios')

@section('content')
<div class="card">
        <table class="table table-hover" style="text-align:center;" >
            <thead>

                <th>Nombre del formato</th>
                <th>Disponibilidad de impresión</th>
                                             
            </thead>
            <tbody>
                <tr>
                    <td>Acuerdo de inicio</td>
                    <td style="text-align:center;">
                    <a href="{{ route("impresion.acuerdoInicio",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr> 
                @if($oficios['vehiculos']>=0)
                <tr>
                        <td>Oficio de Dirección Gral. Transporte</td>
                        <td style="text-align:center;">
                        <a href=" {{ route("oficio.transporte",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr> 
                    @endisset  
                <tr>
                
                    <td>Caratula de carpeta de información</td>
                   <td style="text-align:center;">
                       <a href="{{ route("caratula",session('carpeta'))}}" title="imprimir" class="btn-lg btn-secondary"><i class="fa fa-print"></i> imprimir</a>
                  
                </td>                               
                </tr>
                <tr>
                        <td>Oficio de Policía Ministerial</td>
                        <td style="text-align:center;">
                        <a href="{{ route("policia.ministerial",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr>  
                <tr>
                    <td>Oficio de Centro de atención a víctimas</td>
                    <td style="text-align:center;">
                    <a href="{{ route("show.oficioCavd",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr>
                <tr>
                    <td>Notificación de actuaciones a fiscal de distrito</td>
                    <td style="text-align:center;">
                    <a href="{{ route("not.actuaciones",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr> 
                <tr>
                    <td>Oficio Finanzas</td>
                    <td style="text-align:center;">
                    <a href="{{ route("show.ofFinanzas",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr> 
                <tr>
                        <td>Notificación de archivo temporal</td>
                        <td style="text-align:center;">
                        <a href="{{ route("impresion.temporal",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr>
                    <tr>
                        <td>Remisión fiscal de distrito</td>
                        <td style="text-align:center;">
                        <a href="{{ route("fiscal.distrito",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr>  
                {{-- <tr>
                        <td>Invitacion Inicial</td>
                        <td style="text-align:center;">
                        <a href="{{ route("primera-invitacion",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                 </tr>     --}}
                    

    
            </tbody>
        </table>
       
   
</div>    


@endsection