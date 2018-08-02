@extends('template.form')
@section('title', 'Periciales')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0"><a class="btn collapsed" style="color:black;" data-toggle="collapse" data-target="#collapsesix" aria-expanded="false" aria-controls="collapsesix">
                Registro de diligencias</a>
        </h5>
    </div>
    {{-- <div id="collapsesix" class="collapse" style="color:black;" aria-labelledby="headingsix" data-parent="#accordion"> --}}
        <div class="card-body"> 
            <table class="table table-bordered "  >
                <thead>
                    <th>Seleccione una</th>
                    <th>Nombre del denunciante</th>
                    <th colspan="2">Delito</th>
                    <th>Nombre del denunciado</th>                                   
                </thead>
                @foreach($acusaciones as $acusacion)
                    <tr>    
                        <td><label class="form-check-label"><input type="radio" class="form-check-input" name="optradio"></label></td>
                        <td>{{ $acusacion->nombres." ".$acusacion->primerAp." ".$acusacion->segundoAp }}</td>
                        <td colspan="2">{{$acusacion->delito}}</td>
                    <td>{{$acusacion->nombres2}}</td>
                    </tr>
                @endforeach
            </table> 
            <br>
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                                {!! Form::label('unidadTermino', 'Unidad termino', ['class' => 'col-form-label-sm']) !!}
                                {!! Form::select('unidadTermino',array('DIAS' => 'DIAS', 
                                'HORAS' => 'HORAS'), null,['class' => 'form-control form-control-sm','placeholder' => 'seleccione una unidad de termino', 'data-validation'=>'required']) !!}
                        </div>
                    </div>
                    <div class="col-6">
                            <div class="form-group">
                                    {!! Form::label('unidadTermino', 'Numero ', ['class' => 'col-form-label-sm']) !!}
                                    {!! Form::number('unidadTermino', null,['class' => 'form-control form-control-sm','placeholder' => 'seleccione una cantidad', 'data-validation'=>'required']) !!}
                            </div>
                    </div>
                </div>
            </div>
            <div class="col">
                <label for="observacionesPericiales" class="col-form-label-sm">Observaciones</label>
                <textarea name="observacionesPericiales" id="observacionesP" class="form-control form-control-sm" data-validation="length" data-validation-length= "20-5000"></textarea>
            </div>
            <div class="col-6">
<br>
                <a href="{{ route("oficio.periciales",session('carpeta'))}}" title="imprimir"  class=" btn-secondary btn-lg" TARGET=”_blank”><i class="fa fa-print"></i></a>
            </div>
            <div id="tablaPericiales">
                @include('tables.periciales-oficios')
            </div>
        </div>   
    {{-- </div> --}}
</div>
@endsection