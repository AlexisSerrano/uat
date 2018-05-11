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
                    <td>LIC. BRENDA XIOVARA MORENO ESCALANTE</td>
                    <td>1</td>
                    <td >
                    <a href="" title="atendiendo"  class="btn "><i style="color:#8c1333;" class="fa fa-circle"></i></a>
                    </td> 
                </tr>   
                <tr>
                    <td>LIC. JOSÉ ANTONIO SANCHEZ PEREZ</td>
                    <td>2</td>
                   <td><a href="" title="libre" class="btn "><i  style="color:#138c13;" class="fa fa-circle"></i></a>
                  
                </td>                               
                </tr>
                
                
    
            </tbody>
        </table>
       
    </div>    
</div>    


@endsection