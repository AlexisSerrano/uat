@extends('template.form')
@section('title','Consulta de turnos')

@section('content')

<div class="card">
    <table class="table table-hover" style="text-align:center;">
        <thead class="thead-light">
            <th>Fiscal</th>
            {{-- <th>Caso N.</th> --}}
            <th>Estatus</th>
        </thead>
</div>
    
       
        
       
    <tbody>    
        {{-- <tr><td colspan="5" class="text-center">Sin registros</td></tr> --}}
        @foreach ($fiscales as $fiscal)
        
        <tr>
            <td>{{$fiscal->nombres}}</td>
            {{-- <td>1</td> --}}
            <td >
                @if (is_null($fiscal->idCarpeta))
                    
                <a href="" title="libre" class="btn "><i  style="color:#138c13;" class="fa fa-circle"></i></a>
                @else
                <a href="" title="atendiendo"  class="btn "><i style="color:#8c1333;" class="fa fa-circle"></i></a>
                    
                @endif
            </td> 
        </tr>   
            
        @endforeach
        {{-- <tr>
            <td>LIC. JOSÉ ANTONIO SANCHEZ PEREZ</td>
            <td>2</td>
            <td>
                    <a href="" title="libre" class="btn "><i  style="color:#138c13;" class="fa fa-circle"></i></a>
            
        </td>                               
        </tr> --}}
        
        

    </tbody>
    </table>
 


@endsection