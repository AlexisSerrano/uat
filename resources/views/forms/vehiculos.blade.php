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
			<button class="btn btn-primary form-control" onclick="mostrarCampos();">Vehículo involucrado</button>
		</div>
		<div class="col">
			<button class="btn btn-primary form-control">Vehículo robado</button>
		</div>
	</div>
	
	<div class=" card-body boxone">
		<div class="row no-gutters">
			<div class="col-12">
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
		function mostrarCampos() {
			
		}
	</script>



@endpush


{{-- @push('docready-js')

    $.validate({
        validateOnEvent: true,
		lang : 'es'
    });

@endpush --}}
