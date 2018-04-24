@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
@include('fields.errores')
@php
$form = oldFormActas();
@endphp
{!! Form::open(['route' => 'addactas', 'method' => 'POST'])  !!}
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row" id="actas">
                {{-- DATOS DE TODO TIPO DE ACTAS --}}
                @include('fields.actas')
            </div>
            <div class="row menu">	
                <div class="col text-left">
                    <a href="" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
                </div>
                <div class="col text-right">
                    {!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarActa'))!!}
                </div>
            </div>
            
        </div>
    </div>
</div>
	{!! Form::close() !!}
	
@endsection

