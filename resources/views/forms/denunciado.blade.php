@extends('template.form')

@section('title', 'Agregar investigado')

@section('content')

<div id="page-content-wrapper">
@include('fields.buttons-navegacion')

	<div class="col-md-12 margen">
		<div id="app" style="background-color:#fff">
				<registro :sistema="'uat'" :tipo="'denunciado'" usuario="{{Auth::user()->id}}" carpeta="{{session('numCarpeta')}}" idCarpeta="{{session('carpeta')}}"></registro>
		</div>
		<div>
			@include('tables.denunciados')
		</div>
	</div>
</div>
@endsection