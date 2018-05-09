@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
@include('fields.errores')
@php
$form = oldFormActas();
@endphp
{!! Form::open(['route' => 'addactas2', 'method' => 'POST', 'target'=>'nventana'])  !!}
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row" id="actas">
                {{-- DATOS DE TODO TIPO DE ACTAS --}}
                @isset($acta)
                    @include('fields.actas-atender')
                @else
                    @include('fields.actas')
                @endisset
            </div>
            <div class="row menu">	
                <div class="col text-left">
                    <a href="{{route('actaspendientes')}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
@push('scripts')
<script src="{{ asset('js/actas.js') }}"></script>
@endpush
