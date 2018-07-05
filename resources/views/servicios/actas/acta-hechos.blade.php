@extends('template.form')

@section('title', 'Actas de hechos')
@section('content')
@include('fields.errores')
@php
$form = oldFormActas();
@endphp
@isset($acta)
{!! Form::open(['route' => 'addactas2', 'method' => 'POST'])  !!}
@else
{!! Form::open(['route' => 'addactas2', 'method' => 'POST', 'id'=>'form'])  !!}
@endisset
<div class="row no-gutters">
    <div class="col-12">
        <div class="boxtwo">
            <div class="row" id="actas">
                {{-- DATOS DE TODO TIPO DE ACTAS --}}
                @isset($acta)
                    @if ($acta->esEmpresa==1)
                        @include('servicios.actas.actas-atender-empresa')
                    @else
                        @include('servicios.actas.actas-atender-persona')
                    @endif
                @else
                    @include('fields.tipo-persona')
                    @include('fields.actas')
                @endisset
            </div>
            <div class="row menu">	
                <div class="col text-left">
                    <a href="{{redirect()->getUrlGenerator()->previous()}}" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
<script src="{{ asset('js/rfcMoral-f.js') }}"></script>
	<script src="{{ asset('js/rfcFisico-f.js') }}"></script>
	<script src="{{ asset('js/curp-f.js') }}"></script>
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
<script src="{{ asset('js/actas-hechos.js') }}"></script>
@endpush
