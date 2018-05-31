@extends('template.form')
@section('title', 'Agregar vehículo')
@section('content')
@include('fields.buttons-navegacion')

@include('fields.errores')
{!! Form::open([ 'method' => 'POST'])  !!}
{{ csrf_field() }}
<br>
<div class="card">
		<div class="card-header">
<div class="row">
		<div class="col">
			<div class="text-left">
				{{--Aqui van radios, etc --}}
				<h5>Datos generales de la unidad</h5>
			</div>
		</div>
</div>
	</div>
	
	<div class=" card-body boxone">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="boxtwo" id="vehiculos">
					<div class="row">
						@include('fields.vehiculos')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
	{!! Form::close() !!}
@endsection



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
