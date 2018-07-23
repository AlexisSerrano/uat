@extends('template.form')

@section('title', 'Agregar autoridad')

@section('content')
@include('fields.errores')

<div id="page-content-wrapper">
@include('fields.buttons-navegacion')

	<div class="col-md-12 margen">
		<div id="app" style="background-color:#fff">
				<registro :sistema="'uat'" :tipo="'autoridad'" usuario="{{Auth::user()->id}}" carpeta="{{session('numCarpeta')}}"></registro>
		</div>
		<div>
			@include('tables.autoridades')
		</div>
	</div>
</div>
@endsection