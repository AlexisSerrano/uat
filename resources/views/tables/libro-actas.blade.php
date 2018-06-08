@extends('template.form')
@section('title', 'Libro de actas circunstanciales')
@section('content')
@include('fields.errores')

    <div class="col-md-12">
        {{ Form::open(['route' => ['libro.filtro'], 'method' => 'POST']) }}
            <div class="input-group mb-6 col-4">
                    <div class="input-group-prepend">
                            <button id="basic-addon1" class=" input-group-text" ><i class="fa fa-search"></i></button>
                       </div>
            {{ Form::text('search', old('search'), array('class'=>'form-control', 'placeholder'=>'Buscar..','aria-describedby'=>'basic-addon1')) }}
            
            </div>
<br>
     <div class="card">
        <div class="card-header">
            <h6 style="text-align:center">UNIDAD DE ATENCIÓN TEMPRANA DEL DISTRITO JUDICIAL</h6>
        </div>
                   
                    <div class=" table-responsive" align="center">  
                    <table id="tablaprovidencias" style="font-size:13px; column-width:90"  class='display table table-hover table-responsive-lg table-sm' width="min">
                        <thead >
                            <th >No.Oficio</th>
                            <th >Fecha</th>
                            <th >Víctima/Querellante</th>
                            <th >No. Fiscal</th>
                            <th >Fiscal</th>
                            
                        </thead>
                        <tbody>
                                {{-- @if(count($carpterminadas)==0)
                                <tr><td colspan="13" class="text-center">Sin Registros</td></tr>
                            @else
                                @foreach($carpterminadas as $carpterminada) --}}
                                <tr>
                                  
                                  {{-- <td>{{ $carpterminada->formaComision}}</td>  --}}
                                  <td>1</td>
                                  <td>08/06/2017</td>
                                  {{-- <td>{{ $carpterminada->idEstadoCarpeta}}</td> --}}
                                  <td>JOSÉ JUAN LOPEZ</td>
                                  <td>10</td>
                                  <td>RECEPCIONUAT</td>
                                  
                                </tr>
                               
                    </table>
                    <div class="mt-2 mx-auto">
                           
                    </div>
               
                    <br>
                </div>
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