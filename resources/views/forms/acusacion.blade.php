@extends('template.form')
@section('title', 'Agregar acusación')
@section('content')
@include('fields.buttons-navegacion')
@include('fields.botonborrar')
<br>
@include('fields.errores')
    {!! Form::open(['route' => 'store.acusacion', 'method' => 'POST', 'id'=>'form'])  !!}
	<div class="row no-gutters">
		<div class="col-12">
			<div class="boxtwo">
				@include('fields.acusacion')
				<div class="row menu">	
					<div class="col text-left">				
					</div>
					<div class="col text-right">
						{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
					</div>
				</div>
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	<br>
		@include('tables.acusaciones')
	
@endsection
@push('scripts')
<script src="{{ asset('js/borrar.js') }}"></script>
@endpush