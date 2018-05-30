@extends('template.form')

@section('title', 'Agregar vehículo')
@section('contenido')
{!! Form::open([ 'method' => 'POST'])  !!}
{{ csrf_field() }}
<div class="card-header">
<div class="row">
		<div class="col">
			<div class="text-left">
				{{--Aqui van radios, etc --}}
			</div>
		</div>
		
	</div>
</div>
	@include('forms.errores')
	<div class=" card-body boxone">
	<div class="row no-gutters">
		<div class="col-12">
			<div class="boxtwo" id="vehiculos">
				<h6>Datos generales de la unidad</h6>
				<div class="row">
					{{-- @if(!empty($idCarpeta))
						{!! Form::hidden('idCarpeta', $idCarpeta) !!}
					@endif --}}
					@include('fields.vehiculos')
				</div>
			</div>
		</div>
	</div>
</div>
	{!! Form::close() !!}
@endsection

{{-- @section('tabla')
	<div class="boxtwo">
		@section('titulo-tabla', 'Vehículos registrados')
		@include('tables.vehiculos')
	</div>
@endsection --}}

@push('scripts')
	
    {{-- <script src="{{ asset('js/selects/vehiculo.js') }}"></script>
	 <script src="{{ asset('js/vehiculos.js') }}"></script> --}}
@endpush
@push('docready-js')

    $.validate({
        validateOnEvent: true,
		lang : 'es'
    });

@endpush
