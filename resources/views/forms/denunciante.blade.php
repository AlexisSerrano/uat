{{-- @php
$form = oldFormDenunciante();
@endphp --}}

@extends('template.form')

@section('title', 'Agregar víctima u ofendido')

@section('content')
@include('fields.errores')

<div id="page-content-wrapper">

{!!Form::open(['route' => 'store.denunciante', 'method' => 'POST', 'id'=>'form'])!!}

@include('fields.buttons-navegacion')

	<div class="col-md-12">
		<div id="app" style="background-color:#fff">
				<registro :sistema="'uat'" :tipo="'denunciante'" usuario="{{Auth::user()->id}}" carpeta="xxx"></registro>
		</div>
		<div>
			@include('tables.denunciantes')
		</div>
	</div>
</div>

{!!Form::close()!!}

@endsection