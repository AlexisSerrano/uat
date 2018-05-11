@extends('template.form')
@section('title','Formatos para impresión')

@section('content')
<div class="card">
    <div class="card-body">
       
        <hr>
        <table class="table table-striped" style="text-align:center;">
            <thead>
                <th>Nombre del formato</th>
                <th>Carpeta</th>
                <th>Disponibilidad de impresión</th>
                                             
            </thead>
            <tbody>
               
                {{-- <tr><td colspan="5" class="text-center">Sin registros</td></tr> --}}
              
                <tr>
                    <td>Notificacion de Acceso a la información</td>
                    <td>01</td>
                    <td >
                    <a href="" title="imprimir"  class="btn btn-primary"><i class="fa fa-print"></i></a>
                    </td> 
                </tr>   
                <tr>
                    <td>Caratula de carpeta de información</td>
                    <td>01</td>
                   <td><a href="{{ url('caratula')}}" title="imprimir" class="btn btn-primary"><i class="fa fa-print"></i></a>
                  
                </td>                               
                </tr>
                <tr>
                        <td>Notificacion de Archivo temporal</td>
                        <td>02</td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-print"></i></a>
                        </td>    
                    </tr>
                <tr>
                        <td>Acuerdo de inicio y remisión fiscal de distrito</td>
                        <td>02</td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-print"></i></a>
                        </td>    
                    </tr>
                <tr>
                        <td>Oficio Dirección General de Transporte</td>
                        <td>02</td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-print"></i></a>
                        </td>    
                    </tr>
    
            </tbody>
        </table>
       
    </div>    
</div>    


@endsection