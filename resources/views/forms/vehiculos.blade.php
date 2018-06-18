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
	
	
	<object type="text/html" data="http://192.108.22.44:80/VRR/public/session_uatwf" name="systemVrr" id="systemVrr"  width="100%" height="500px">
	{{-- <object type="text/html" data="{{url('iframe')}}" name="systemVrr" id="systemVrr"  width="100%" height="1000px"> --}}
		
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
		
		$("#systemVrr").hide();
		$("#vehiculos").hide();
		
		function vehiculoInvolucrado() {
			$("#systemVrr").hide();
			$("#vehiculos").show();
		}
		// localStorage.setItem('session_id', "{{Auth::user()->session_id}}");
		
		function vehiculoRobado() {
			$("#systemVrr").show();
			$("#vehiculos").hide();
			
			var data_vrr={
				"session_id":"{{Auth::user()->session_id}}",
				"grupo":"{{Auth::user()->grupo}}",
				"idUser":"{{Auth::user()->id}}",
				"numCarpeta":"{{session('numCarpeta')}}",
				"idCarpeta":"{{session('carpeta')}}",
				"origen":"UAT"
			};

			setTimeout(function() {
				var vehiculos = document.getElementById('systemVrr'); 
				vehiculos.contentWindow.postMessage( JSON.stringify(data_vrr) , 'http://192.108.22.44');
				// console.log("{{Auth::user()->session_id}}"); 
			},5000);
			// frame.contentWindow.postMessage(/*any variable or object here*/, '*'); 


			// setTimeout(function(){
			// 	var vehiculos=window.frames['systemVrr'];
			// 	console.log('Se ejecuto');

			// 	vehiculos.document.forms["validacion"].elements["session_id"].value="{{Auth::user()->session_id}}";
			// 	vehiculos.document.forms["validacion"].elements["grupo"].value="{{Auth::user()->grupo}}";
			// 	vehiculos.document.forms["validacion"].elements["idUser"].value="{{Auth::user()->id}}";
			// 	vehiculos.document.forms["validacion"].elements["numCarpeta"].value="{{session('numCarpeta')}}";
			// 	vehiculos.document.forms["validacion"].elements["idCarpeta"].value="{{session('carpeta')}}";
			// 	vehiculos.document.forms["validacion"].elements["origen"].value="UAT";
				
			// },8000);
		}

		
	</script>



@endpush

