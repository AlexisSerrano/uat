@extends('template.main')
@section('title', 'Carpetas en reserva')

@section('contenido')

<div class="table">
    {{ Form::open(['route' => ['filtro.carpetasReserva'], 'method' => 'POST']) }}
    
        <div class="input-group mb-6 col-4" style="margin-left: -8px;">
            <div class="input-group-prepend">
             <button class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true" ></i></button>
            </div>
         <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2" name="search" id="search" value="{{old('search')}}" >
            </div> 
    {{ Form::close() }}
    <br>
    <div class="card">
    <table class="table table-hover text-center" id="tablacarpetas">
        <thead class="table-active">
            <tr>
                <th >Solicitante</th>
                <th >Fiscal que atendio</th>
                <th >Fecha de inicio</th>
                <th >Hora</th>
                {{-- <th >Victima/Querellante</th>
                <th >Ofensor/Q.R.R</th> --}}
                {{-- <th >Carpeta de investigación</th>  --}}
                {{-- <th >Delito</th>
                <th>Forma de comisión</th>  --}}
                {{-- <th>Fecha de turno</th>
                <th>Facilitador</th> --}}
                {{-- <th>Estatus de la carpeta</th> --}}
                {{-- <th>Resultado final</th>
                <th>Oficio turno a fiscal de distrito</th>
                <th >Nuevo numero de carpeta UIPJ</th> --}}
                <th>Reanudar carpeta</th>
            </tr>
        </thead>
        <tbody>
            @if(count($carpetas)==0)
                <tr><td colspan="6" class="text-center">Sin Registros</td></tr>
            @else
                @foreach($carpetas as $carpeta)
                <tr>
                    <td>{{ $carpeta->nombre}}</td> 
                    <td>{{ $carpeta->fiscalAtendio}}</td> 
                    <td>{{ $carpeta->fechaInicio}}</td>
                    <td>{{ $carpeta->horaIntervencion}}</td>
                    <td>
                        <a href="{{ route('carpeta.reserva',$carpeta->id)}}"   rel="tooltip" title="Editar Registro" class="btn btn-secondary btn-simple btn-xs">
                        <i class="fa fa-pencil"></i></a>
                    </td>                     
                </tr>
                @endforeach
            @endif
        </tbody>
    </table>
    <div class="mt-2 mx-auto">
        {{ $carpetas->links() }}
    </div>

</div>
</div>
@endsection

    
