@extends('template.form')

@section('title', 'Agregar abogado')

@section('content')
<div id="page-content-wrapper">
@include('fields.buttons-navegacion')

	<div class="col-md-12 margen">
		<div id="app" style="background-color:#fff">
				<registro :sistema="'uat'" :tipo="'abogado'" usuario="{{Auth::user()->id}}" carpeta="{{session('numCarpeta')}}" idCarpeta="{{session('carpeta')}}"></registro>
		</div>
		<div>
			@include('tables.abogados')
		</div>
	</div>
</div>
@endsection