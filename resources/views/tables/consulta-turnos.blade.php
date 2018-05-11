@extends('template.form')
@section('title','Consulta de turnos')

@section('content')
<div class="card">
    <div class="card-body">
       
        <hr>
        <table class="table table-striped" style="text-align:center;">
            <thead>
                <th>Fiscal</th>
                <th>Caso N.</th>
                <th>Estatus</th>
                                             
            </thead>
            <tbody>
               
                {{-- <tr><td colspan="5" class="text-center">Sin registros</td></tr> --}}
              
                <tr>
                    <td></td>
                    <td></td>
                    <td >
                    <a href="" title="imprimir"  class="btn btn-primary"><i class="fa fa-circle"></i></a>
                    </td> 
                </tr>   
                <tr>
                    <td></td>
                    <td></td>
                   <td><a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-circle"></i></a>
                  
                </td>                               
                </tr>
                <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-circle"></i></a>
                        </td>    
                    </tr>
                <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-circle"></i></a>
                        </td>    
                    </tr>
                <tr>
                        <td></td>
                        <td></td>
                        <td>
                        <a href="" title="imprimir" class="btn btn-primary"><i class="fa fa-circle"></i></a>
                        </td>    
                    </tr>
    
            </tbody>
        </table>
       
    </div>    
</div>    


@endsection