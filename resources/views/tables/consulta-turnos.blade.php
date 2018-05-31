@extends('template.form')
@section('title','Consulta de turnos')

@section('content')

<div class="card">
    <table class="table table-hover" style="text-align:center;">
        <thead class="thead-light">
            <th>Fiscal</th>
            <th>Persona que atiende</th>
            <th>Folio</th>
            <th>Estado</th>
            {{-- <th>Caso N.</th> --}}
            <th>Estatus</th>
        </thead>
</div>
    
       
        
       
    <tbody>    
        {{-- <tr><td colspan="5" class="text-center">Sin registros</td></tr> --}}
        @foreach ($fiscales as $fiscal)
        
        <tr>
            <td>{{$fiscal->nombres}}</td>
            @if (Jenssegers\Date\Date::parse($fiscal->updated_at)->diffForHumans()=='hace 1 segundo')
            <td colspan="3">Disponible</td>
            @else
            <td>{{$fiscal->nombre."".$fiscal->primerAp."".$fiscal->segundoAp}}</td>
            <td>{{$fiscal->folio}}</td>
            <td>Ocupado desde {{Jenssegers\Date\Date::parse($fiscal->updated_at)->diffForHumans()}}</td>
            @endif
            <td >
                @if (is_null($fiscal->idCarpeta))
                    
                <a href="" title="libre" class="btn "><i  style="color:#138c13;" class="fa fa-circle"></i></a>
                @else
                <a href="" title="atendiendo"  class="btn "><i style="color:#8c1333;" class="fa fa-circle"></i></a>
                    
                @endif
            </td> 
        </tr>   
            
        @endforeach
        
        
        

    </tbody>
    </table>

@endsection
@push('scripts')
    <script>
        setInterval('location.reload()',30000);
        //location.reload();
    </script>
@endpush