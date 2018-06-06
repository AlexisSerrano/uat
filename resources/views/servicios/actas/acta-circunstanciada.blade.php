@php
$form = oldFormActas();
@endphp

@extends('template.form')

@section('title', 'Acta circunstanciada')
@section('content')
@include('fields.errores')

{!! Form::open(['route' => 'addactaCirc', 'method' => 'post'])  !!}
{{-- {!! Form::open(['route' => 'addactaCirc', 'method' => 'POST'])  !!} --}}
	<br>
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row" id="actas">
                {{-- DATOS DE TODO TIPO DE ACTAS --}}
                @isset($acta)
                    {{-- @include('fields.datos-actaCircunst') --}}
                @else
                    @include('fields.datos-actaCircunst')
                @endisset
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
{{-- @push('scripts')
<script src="{{ asset('js/actas.js') }}"></script>
@endpush --}}
