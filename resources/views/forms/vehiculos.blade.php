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
			<button type="button" name="botonRobados" class="btn btn-primary form-control" onclick="vehiculoRobado();">Vehículo robado</button>
		</div>
	</div>
	
	
	{{-- <object type="text/html" data="http://localhost/vrr/public/ver-registro" name="systemVrr" id="systemVrr"  width="100%" height="1000px"> --}}
	<object type="text/html" data="{{url('iframe')}}" name="systemVrr" id="systemVrr"  width="100%" height="1000px">
	</object>
	
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
		// $("#vrr").hide();
		// setTimeout(function(){
		// 	console.log('llamando la carga');
		// 	//console.log(vehiculos.document.forms["formDenuncia"]);	
		// 	datos();
		// },5000);
		vehiculos=window.frames['systemVrr'];
		
		function datos(){
			vehiculos.document.forms["formDenuncia"].elements["session_id"].value="{{Auth::user()->session_id}}";
			vehiculos.document.forms["formDenuncia"].elements["grupo"].value="{{Auth::user()->grupo}}";
			vehiculos.document.forms["formDenuncia"].elements["idUser"].value="{{Auth::user()->id}}";
			vehiculos.document.forms["formDenuncia"].elements["numCarpeta"].value="{{session('numCarpeta')}}";
			vehiculos.document.forms["formDenuncia"].elements["idCarpeta"].value="{{session('carpeta')}}";
			vehiculos.document.forms["formDenuncia"].elements["origen"].value="UAT";

		}
		$("#systemVrr").hide();
		$("#vehiculos").hide();
		
		function vehiculoInvolucrado() {
			$("#systemVrr").hide();
			$("#vehiculos").show();
		}
		
		function vehiculoRobado() {
			$("#systemVrr").show();
			$("#vehiculos").hide();
			setTimeout(function(){
				vehiculos.document.forms["formDenuncia"].elements["session_id"].value="{{Auth::user()->session_id}}";
				vehiculos.document.forms["formDenuncia"].elements["grupo"].value="{{Auth::user()->grupo}}";
				vehiculos.document.forms["formDenuncia"].elements["idUser"].value="{{Auth::user()->id}}";
				vehiculos.document.forms["formDenuncia"].elements["numCarpeta"].value="{{session('numCarpeta')}}";
				vehiculos.document.forms["formDenuncia"].elements["idCarpeta"].value="{{session('carpeta')}}";
				vehiculos.document.forms["formDenuncia"].elements["origen"].value="UAT";
			},5000);
		}
		
	</script>



@endpush


{{-- @push('docready-js')

    $.validate({
        validateOnEvent: true,
		lang : 'es'
    });

@endpush --}}
