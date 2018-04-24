@extends('template.form')
@section('title','Actas de hechos')

@section('content')
<div class="card">
    <div class="card-body">
        <a href="{{route('new.actahechos')}}" class="btn btn-primary"> Crear nueva acta</a>
        <hr>
        <table class="table table-striped">
            <thead>
                <th>Nombre</th>
                <th>Tipo de acta</th>
                <th>fecha</th>
                <th>Tipo</th> 
                <th>Opciones</th>                               
            </thead>
            <tbody>
                @if(count($actas)==0)
                <tr><td colspan="5" class="text-center">Sin registros</td></tr>
                @else
                @foreach($actas as $acta)
                <tr>
                    <td>{{ $acta->nombres." ".$acta->primerAp." ".$acta->segundoAp }}</td>
                    <td>{{ $acta->tipoActa }}</td>
                    <td>{{ $acta->sector }}</td>
                    <td>{{ $acta->tipo }}</td>  
                    <td>
                        <a href="{{ url('agregar-acta/'.$acta->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i></td>
                        </td>                                  
                    </tr>
                    @endforeach
                    @endif
                </tbody>
            </table>
    </div>    
</div>    


@endsection