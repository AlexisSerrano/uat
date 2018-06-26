@extends('template.form')

@section('title', 'Estado de la carpeta')
@section('css')
<style>
	.btn-success{
		background: black;
	}	
</style>
	
@endsection
@section('content')
@include('fields.errores')

<div class="card">
    <div class="card-header" style="text-align:right;">
        <a href="{{route('carpeta.detalle')}}" class="btn btn-secondary" >Resumen de la carpeta</a>    
        {{-- <button class="btn btn-secondary">Resumen de la carpeta</button> --}}
    </div>
    <div class="card-body">

        <div class="row">
            <div class="col-12">
                
                {!!  Form::open(['route' => 'estado.edit', 'method' => 'post', 'id'=>'form'])!!}
                <input type="hidden" name="idCarpeta" value="{{$estatus[0]->id}}">
                <div class="row">
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('estatusCarpeta', 'Estatus de la carpeta:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('estatusCarpeta', $estatus[0]->estatus, ['class' => 'form-control form-control-sm','readonly']) !!}
                        </div>
                    </div>
                    
                    <div class="col-6">
                        <div class="form-group">
                            {!! Form::label('cambioEstatus', 'Cambiar a:', ['class' => 'col-form-label-sm']) !!}
                            {{-- {!! Form::select('cambioEstatus', ['' => 'Seleccione un estatus'], $informacion, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!} --}}
                            {!! Form::select('EstadoCarpeta', $informacion, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione un estatus','data-validation'=>'required']) !!}
                        </div>                        
                    </div>

                    <div class="col-12">
                        
                        <div class="form-group">
                            {!! Form::label('asignarFiscal', 'Asignar a fiscal:', ['class' => 'col-form-label-sm']) !!}
                            {!! Form::text('asignarFiscal', 'SIN INFORMACIÓN', ['class' => 'form-control form-control-sm']) !!}
                        </div>
                        
                    </div>
                    
                </div>
                
                <div class="row">
                    <div class="col-12">
                        <label for="narracion" class="col-form-label-sm">Observaciones</label>
                        {{ Form::textarea('narracion',null, ['class' => 'form-control form-control-sm', 'size' => '30x10']) }}
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-12">   
                        <br>
                        <div class="text-right">
                            {{-- <a href="{{route('indexcarpetas')}}" title="" class="btn btn-secondary">Cancelar</a> --}}
                            {!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}
                        </div>
                    </div>
                </div>
                
                {!!Form::close()!!}
            </div>
        </div>
    </div>
        @endsection


