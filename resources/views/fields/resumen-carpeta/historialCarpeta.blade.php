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
    <div class="card">
        <div class="table-responsive">
            <table class="table text-center" id="tablacarpetas">
                <thead class="table-active">
                    <tr>
                        <th style="white-space: nowrap">Fecha</th>
                        <th style="white-space: nowrap">Número de Carpeta</th>
                        <th style="white-space: nowrap">Fiscal</th> 
                        <th style="white-space: nowrap">Observación/Motivo</th>
                        <th style="white-space: nowrap">Estatus</th>
                        <th style="white-space: nowrap">Determinación</th>
                        <th style="white-space: nowrap">Unidad</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($carpetas as $carpeta)
                        <tr>
                            <td style="white-space: nowrap">{{Jenssegers\Date\Date::parse($carpeta->fecha)->format('l j \\d\\e F \\d\\e Y') }}</td>
                            <td style="white-space: nowrap">{{ $carpeta->numCarpeta}}</td>
                            <td style="white-space: nowrap">{{ $carpeta->fiscal}}</td>
                            <td>{{ $carpeta->observacion}}</td>
                            <td style="white-space: nowrap">{{ $carpeta->estatus}}</td>
                            <td style="white-space: nowrap">{{ $carpeta->determinacion}}</td>                  
                            <td style="white-space: nowrap">{{ $carpeta->unidad}}</td>                  
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
        </div>
        
        <div class="mt-2 mx-auto">
            {{ $carpetas->links() }}
        </div>
    </div>
</div>
@endsection
