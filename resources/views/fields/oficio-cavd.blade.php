@extends('template.form')
@section('title', 'Oficio a Centro de atención a víctimas')
@section('content')
{!! Form::open(['route' => 'store.oficioCavd', 'method' => 'POST'])  !!} 
<div class="card"> 
    <div class="card-body">
        <div class="row">
            <div class="col-4">
                <div class="form-group">
                    {!! Form::label('idCavd', 'Unidad', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('idCavd', $catalogo, null, ['class' => 'delito form-control form-control-sm select2', 'placeholder' => 'Seleccione una unidad', 'required']) !!}
                </div>
            </div>
            <div class="col-4">
                {!! Form::label('idDenunciante','Victima u ofendido', ['class' => 'col-form-label-sm']) !!}
                <select name="idDenunciante"  class="form-control form-control-sm" required>
                    <option value="">Seleccione una victima u ofendido</option>
                    @foreach($victimas2 as $victima)
                    <option value="{{ $victima->id }}">{{ $victima->nombres." ".$victima->primerAp." ".$victima->segundoAp }}</option>
                    @endforeach
                </select>
            </div>	
        </div>
    </div>
</div>


 {{-- <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <th>unidad</th>
                        <th>victima u ofendido</th>
                        <th>Opciones</th>  
                       
                    </thead>
                    <tbody>
                        @if(count( $victimas2 )==0)
                            <tr><td colspan="4  " class="text-center">Sin registros</td></tr>
                        @else
                            @foreach( $victimas2  as  $victimas )
                                <tr>
                                    <td>{{ $victimas->nombres." ".$victimas->primerAp." ".$victimas->segundoAp }}</td>
                                    {{-- <td>{{ $acusacion->delito }}</td>
                                    <td>{{ $acusacion->nombres2." ".$acusacion->primerAp2." ".$acusacion->segundoAp2 }}</td> --}}
                                    {{-- <td> --}}
                                        {{-- <a href="{{ url('agregar-acusacion/'.$acusacion->id.'/eliminar')}}"  title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                                        <i class="fa fa-times"></i></a> --}}
                                       
                                        {{-- <a href="{{route('oficio.cavd',$victimas->id)}}" title="Imprimir acuerdo inicial" class=" btn btn-secondary btn-simple btn-xs">
                                            <i class="fa fa-print"></i>
                                        </a>
                                    </td> --}}
                                                {{-- </td>  --}}
                                {{-- <td><a href="{{ route('formato.denuncia', $acusacion->id) }}" class="btn btn-secondary text-right">Descargar formato de Denuncia</a></td> --}}
                                {{-- </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div> --}} 



<div class="col text-right">

        <button class="btn btn-primary">Generar oficio</button>
</div>

@endsection

{{-- @push('scripts')
<script>
  $(".form-control form-control-sm").select2({
    placeholder: "Seleccione una victima u ofendido"
});  
</script>
@endpush --}}

