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
               
                {{-- <tr><td colspan="5" class="text-center">Sin registros</td></tr> --}}
              
                <tr>
                    <td>Acuerdo de inicio y remisión fiscal de distrito</td>
                    <td style="text-align:center;">
                    <a href="{{ url('oficio-distrito')}}" title="imprimir"  class=" btn-secondary btn-lg "><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr> 
                <tr>
                        <td>Oficio de Dirección Gral. Transporte</td>
                        <td style="text-align:center;">
                        <a href=" {{ url('transporte-estado')}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr>   
                <tr>
                
                    <td>Caratula de carpeta de información</td>
                   <td style="text-align:center;">
                       <a href="{{ url('caratula')}}" title="imprimir" class="btn-lg btn-secondary"><i class="fa fa-print"></i> imprimir</a>
                  
                </td>                               
                </tr>
                <tr>
                        <td>Oficio de Policía Ministerial</td>
                        <td style="text-align:center;">
                        <a href="{{ url('policia-ministerial')}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                        </td> 
                    </tr>  
                <tr>
                    <td>Oficio de Centro de atención a víctimas</td>
                    <td style="text-align:center;">
                    <a href="{{ url('oficio-cavd')}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr>
                <tr>
                    <td>Notificación de actuaciones a fiscal de distrito</td>
                    <td style="text-align:center;">
                    <a href="{{ url('not-actuaciones')}}" title="imprimir"  class=" btn-secondary btn-lg"><i class="fa fa-print"></i> Imprimir</a>
                    </td> 
                </tr>    

    
            </tbody>
        </table>
       
   
</div>    


@endsection