@extends('template.main')
@section('title', 'Historial de carpeta')

@section('contenido')

<div class="table">
        <a href="{{route('carpeta.detalle')}}"  class="float-right btn btn-secondary" >Regresar a detalle de carpeta</a>    
<br>
    {{-- {{ Form::open(['route' => ['filtro.carpetas'], 'method' => 'POST']) }}
    
        <div class="input-group mb-6 col-4" style="margin-left: -8px;">
            <div class="input-group-prepend">
             <button class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true" ></i></button>
            </div>
            <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon2" name="search" id="search" value="{{old('search')}}" >
        </div> 
    {{ Form::close() }} --}}
    <br>
    <div class="card table-responsive">
        <table class="table table-sm text-center" id="tablacarpetas">
            <thead class="table-active">
                <tr>
                    <th>Fecha</th>
                    <th>Número de Carpeta</th>
                    <th>Fiscal</th> 
                    <th>Observación/Motivo</th>
                    <th>Estatus</th>
                    <th>Determinación</th>
                    <th>Unidad</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($carpetas as $carpeta)
                    <tr>
                        <td>{{Jenssegers\Date\Date::parse($carpeta->fecha)->format('l j \\d\\e F \\d\\e Y') }}</td>
                        <td>{{ $carpeta->numCarpeta}}</td>
                        <td>{{ $carpeta->fiscal}}</td>
                        <td>{{ $carpeta->observacion}}</td>
                        <td>{{ $carpeta->estatus}}</td>
                        <td>{{ $carpeta->determinacion}}</td>                  
                        <td>{{ $carpeta->unidad}}</td>                  
                    </tr>
                @empty
                    <tr><td colspan="6" class="text-center">Sin Registros</td></tr>
                @endforelse
                {{-- @if(count($carpetas)==0)
                @else
                    @foreach($carpetas as $carpeta)
                    @endforeach
                @endif --}}
            </tbody>
        </table>

        <div class="mt-2 mx-auto">
            {{ $carpetas->links() }}
        </div>
    </div>
</div>
@endsection
