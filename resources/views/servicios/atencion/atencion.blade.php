@extends('template.form')
@section('title','Atención Rápida')
@section('content')
<div id="page-content-wrapper">
    @include('fields.errores')
    {!!Form::open(['route' => 'addatencion'])!!}
        <div class="row">
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('nombre', 'Nombre', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::text('nombre', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el nombre', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('primer_ap', 'Primer apellido', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::text('primer_ap', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el primer apellido', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('segundo_ap', 'Segundo apellido', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::text('segundo_ap', null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Ingrese el segundo apellido', 'data-validation'=>'required']) !!}
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    {!! Form::label('redireccion', 'Modulo de atención', ['class' => 'col-form-label-sm']) !!}
                    {!! Form::select('redireccion', $modulos, null, ['class' => 'form-control form-control-sm', 'data-validation'=>'required']) !!}
                </div>
            </div>	
            <div class="col-6 text-right">
                <a href="{{url('registros')}}" class="btn btn-secondary">Cancelar</a>
            </div>
            <div class="col-6 text-left">
                {!!Form::submit('Guardar',array('class' => 'btn btn-secondary','id'=>'guardarDenunciante'))!!}
            </div>
              
        </div>
    {!!Form::close()!!}
</div>
@endsection