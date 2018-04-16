@extends('template.form')

@section('title', 'Agregar Delito')

@section('contenido')
@include('fields.errores')
	@include('fields.buttons-navegacion')
    {!! Form::open(['route' => 'store.delito', 'method' => 'POST'])  !!}
	<div class="row no-gutters">
		<div class="col-12">
			<div class="boxtwo">
				<h6>Información sobre el delito</h6>
				@include('fields.delito')
			</div>
		</div>
	</div>

	<div class="boxtwo">
		<h6>Información sobre el lugar de los hechos</h6>
		@include('fields.direcciones')
		@include('fields.lugar-hechos')
		
		<div class="row">
			<div class="col text-left">
				<a href="{{route('new.denunciado')}}" class="btn btn-primary">Cancelar</a>
			</div>
			<div class="col text-right">	
				{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
			</div>
		</div>
	</div>
	{!! Form::close() !!}
	<div class="boxtwo">
		@include('tables.delitos')
	</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script>
		$(document).ready(function(){
			$(function () {
				$('#fechadelit').datetimepicker({
				format: 'YYYY-MM-DD',
				maxDate: moment()
				});
			});

			$(function () {
				$('#horadelit').datetimepicker({
				format: 'LT',
				maxDate: moment()
				});
			});
		});
	</script>
@endpush