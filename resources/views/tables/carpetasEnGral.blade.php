@extends('template.main')
@section('title', 'Carpetas')

@section('contenido')

<div class="table">
    {{ Form::open(['route' => ['filtro.carpetas'], 'method' => 'POST']) }}
    
        <div class="input-group mb-6 col-4" style="margin-left: -8px;">
            <div class="input-group-prepend">
             <button class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true" ></i></button>
            </div>
         <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2" name="search" id="search" value="{{old('search')}}" >
            </div> 

        {{-- <div class="input-group mb-3 col-2">
            <input type="text" class="form-control" name="search" id="search" value="{{old('search')}}" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
            </div>
        </div> --}}
    {{ Form::close() }}
    <br>
    <div class="card">
    <table class="table table-hover text-center" id="tablacarpetas">
        <thead class="table-active">
            <tr>
                {{-- <th >N.</th> --}}
                {{-- <th >ID</th> --}}
                <th >Fecha</th>
                <th >Hora de intervención</th>
                {{-- <th >Victima/Querellante</th>
                <th >Ofensor/Q.R.R</th> --}}
                <th >Carpeta de investigación</th> 
                {{-- <th >Delito</th>
                <th>Forma de comisión</th>  --}}
                {{-- <th>Fecha de turno</th>
                <th>Facilitador</th> --}}
                <th>Estatus de la carpeta</th>
                {{-- <th>Resultado final</th>
                <th>Oficio turno a fiscal de distrito</th>
                <th >Nuevo numero de carpeta UIPJ</th> --}}
                {{-- <th>Ver detalles</th> --}}
                <th></th>
            </tr>
        </thead>
        <tbody>
            @if(count($carpetas)==0)
                <tr><td colspan="6" class="text-center">Sin Registros</td></tr>
            @else
                @foreach($carpetas as $carpeta)
                <tr>
                    {{-- <td>{{ $carpeta->id}}</td>  --}}
                    <td>{{ $carpeta->fechaInicio}}</td>
                    <td>{{ $carpeta->horaIntervencion}}</td>
                    {{-- <td>{{ $acusacion->denunciante }}</td>
                    <td>{{ $acusacion->nombres2." ".$acusacion->primerAp2." ".$acusacion->segundoAp2 }}</td>  --}}
                    <td>{{ $carpeta->numCarpeta }}</td>
                    {{-- <td>{{ $acusacion->delito }}</td> --}}
                    {{-- <td>{{ $acusacion->formaComision }}</td>  --}}
                    <td>{{ $carpeta->idEstadoCarpeta}}</td>
                    <td>
                        <a href="{{ route('ir.carpeta',$carpeta->id)}}"   rel="tooltip" title="Editar Registro" class="btn btn-secondary btn-simple btn-xs">
                            {{-- <i class="fa fa-pencil"></i>  --}}
                            Ver detalle 
                        </a>
                        {{-- <a href="{{ route('turnar.carpeta',$carpeta->id)}}"   rel="tooltip" title="Turnar" class="btn btn-secondary btn-simple btn-xs">
                        <i class="fa fa-child"></i></a> --}}
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

    
