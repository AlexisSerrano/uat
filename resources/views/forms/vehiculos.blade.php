@extends('template.form')
@section('title', 'Agregar vehículo')
@section('content')
@include('fields.buttons-navegacion')

@include('fields.errores')
{!! Form::open(['route' => ['carpeta.vehiculo'], 'method' => 'POST'])  !!}
{{ csrf_field() }}
<br>
<div class="card">
	<div class="card-header row">
		<div class="col">
			<button type="button" class="btn btn-primary form-control" onclick="vehiculoInvolucrado();">Vehículo involucrado</button>
		</div>
		<div class="col">
			<button type="button" class="btn btn-primary form-control" onclick="vehiculoRobado();">Vehículo robado</button>
		</div>
	</div>
	
	<div class=" card-body boxone">
		<div class="row no-gutters">
			<div class="col-12">
				<div class="boxtwo" id="vrr">
					<iframe src="http://localhost/vrr/public/ver-registro" width="100%" height="1000px">
						<p>Tu navegador no soporta esta paguina por favor cambia de navegador o intentalo mas tarde.</p>
					</iframe>
				</div>
				<div class="boxtwo" id="vehiculos">
					<div class="row">
						@include('fields.vehiculos')
					</div>
					
					<div class="col text-right">
					{!!Form::submit('Guardar',array('class' => 'btn  btn-primary'))!!}
					</div>
				</div>
			</div>
		</div>
	</div>

</div>

	{!! Form::close() !!}
	@include('tables.vehiculos')
@endsection
{{-- nuevos cambios --}}

	

@push('scripts')
	<script src="{{ asset('js/selects/vehiculo.js') }}"></script>
    {{-- <script src="{{ asset('js/selects/vehiculo.js') }}"></script>--}}
	<script src="{{ asset('js/vehiculos.js') }}"></script> 
	<script>
		$("#vrr").hide();
		$("#vehiculos").hide();

		function vehiculoInvolucrado() {
			$("#vrr").hide();
			$("#vehiculos").show();
		}
		function vehiculoRobado() {
			$("#vrr").show();
			$("#vehiculos").hide();
		}
	</script>



@endpush


{{-- @push('docready-js')

    $.validate({
        validateOnEvent: true,
		lang : 'es'
    });

@endpush --}}
