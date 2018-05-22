@extends('template.form')
@section('title', 'Libro de gobierno')
@section('content')

<div id="page-content-wrapper">
    <div class="col-md-12">
        <h6 style="text-align:center">UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL</h6>
            <div class="table table-hover table-responsive">
                <div class="">

                    
                    <table id="tablaprovidencias">
                        <br>
                        <thead class="table-active">
                            {{-- <th >N.</th> --}}
                            <th >Fecha</th>
                            <th >Victima/Querellante</th>
                            <th >Ofensor/Q.R.R</th>
                            <th >Carpeta de investigación</th>
                            <th >Delito</th>
                            <th>Forma de comisión</th>
                            {{-- <th>Fecha de turno</th>
                            <th>Facilitador</th> --}}
                            <th>Estatus</th>
                            {{-- <th>Resultado final</th>
                            <th>Oficio turno a fiscal de distrito</th>
                            <th >Nuevo numero de carpeta UIPJ</th> --}}
                        </thead>
                        <tbody>
                            @if(count($acusaciones)==0)
                            <tr><td colspan="4" class="text-center">Sin Registros</td></tr>
                        @else
                            @foreach($acusaciones as $acusacion)
                                <tr>
                                    {{-- <td>{{ $acusacion->id}}</td> --}}
                                    <td>{{ $acusacion->fechaInicio}}</td>
                                    <td>{{ $acusacion->denunciante }}</td>
                                    <td>{{ $acusacion->nombres2." ".$acusacion->primerAp2." ".$acusacion->segundoAp2 }}</td> 
                                    <td>{{ $acusacion->numCarpeta }}</td>
                                    <td>{{ $acusacion->delito }}</td>
                                    <td>{{ $acusacion->formaComision }}</td> 
                                    <td>{{ $acusacion->estadoCarpeta}}</td>
                                      
                                      </tr>
                                      @endforeach
                                @endif
                            </tbody>
                        </table>
                   
                    <br>
                </div>
             </div>
        </div>
</div>

    


@endsection
        
@section('css')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" /> --}}
@endsection
@push('scripts')
<script>
</script>
@endpush