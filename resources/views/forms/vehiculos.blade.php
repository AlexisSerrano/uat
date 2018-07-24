@extends('template.form')
@section('title', 'Agregar vehículo involucrado')
@section('content')
@include('fields.buttons-navegacion')

@include('fields.errores')
{!! Form::open(['route' => ['carpeta.vehiculo'], 'method' => 'POST'])  !!}
{{ csrf_field() }}
<br>
<div class="card margen">
	{{-- <div class="card-header row">
		<div class="col">
			<button type="button" class="btn btn-primary form-control" onclick="vehiculoInvolucrado();">Vehículo involucrado</button>
		</div>
		<div class="col">
			<button type="button" name="botonRobados" class="btn btn-primary form-control" onclick="vehiculoRobado();">Vehículo robado</button>
		</div>
	</div>
	 --}}
	
	{{-- <object type="text/html" data="http://192.168.137.1/VRR/public/session_uatwf" name="systemVrr" id="systemVrr"  width="100%" height="500px"> --}}
	{{-- <object type="text/html" data="{{url('iframe')}}" name="systemVrr" id="systemVrr"  width="100%" height="1000px"> --}}
		
	{{-- </object> --}}
	
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
@endpush

