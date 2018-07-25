@extends('template.form')
@section('title', 'Agregar Víctima u ofendido')
@section('content')
@include('fields.errores')

  
<div id="page-content-wrapper">

		
 <span class="datotip" id="{{$tipopersona}}"></span> 	 
	
	<div class="col-md-12">
		
		
		
		<div class="boxtwo">
			@if($tipopersona==0)
				persona fisica
				<div id="app" style="background-color:#fff">
					<registro :sistema="'uat'" :tipo="'denunciante'" usuario="{{Auth::user()->id}}" carpeta="{{session('numCarpeta')}}" idCarpeta="{{session('carpeta')}}"></registro>
				</div>
			@else
				persona moral
				<div id="app" style="background-color:#fff">
					<registro :sistema="'uat'" :tipo="'denunciante'" usuario="{{Auth::user()->id}}" carpeta="{{session('numCarpeta')}}" idCarpeta="{{session('carpeta')}}"></registro>
				</div>
			@endif
			
		</div>
				
			
	</div>
	<div class="text-right col">
		@if (isset($preregistro->statusCola))
		<a href="{{route('devolver',$preregistro->id)}}" title="" class="btn btn-secondary">Devolver turno</a>
		@else
		<a href="{{route('actaspendientes')}}" title="" class="btn btn-secondary">Regresar</a>
		@endif
	</div>   
</div>
{!!Form::close()!!}
@endsection
