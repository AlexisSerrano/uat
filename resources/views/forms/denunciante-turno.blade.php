@extends('template.form')
@section('title', 'Agregar denunciante')
@section('content')
@include('fields.errores')

{!!Form::open(['route' => 'store.denunciante'])!!}

@include('fields.buttons-navegacion')
  
<div id="page-content-wrapper">
{{--  <span class="datotip" id="{{$tipopersona}}"></span> 	  --}}
	
	<div class="col-md-12">
		<br>
		<nav>
			
			<div class="nav nav-tabs color-nav-tab" id="nav-tab" role="tablist">
				{{--  datos personales  --}}
				<a class="nav-item nav-link active color-nav-tab" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="nav-personales" aria-selected="true">Datos personales <span><i class="fa fa-angle-down"></i></span></a>
				{{--  Datos del Direccion particular--}}
				<a class="nav-item nav-link color-nav-tab" id="direccion-tab" data-toggle="tab" href="#direccion" role="tab" aria-controls="nav-direccion" aria-selected="false">Domicilio <span><i class="fa fa-angle-down"></i></i></span> </a>
				{{--  Direccion Trabajo del trabajo--}}
				@if ($tipopersona==0)	
					<a class="nav-item nav-link color-nav-tab" id="dirTrabajo-tab" data-toggle="tab" href="#dirTrabajo" role="tab" aria-controls="dirTrabajo" aria-selected="false">Datos del trabajo <span><i class="fa fa-angle-down"></i></i></span> </a>
				@endif
				{{-- Domicilio Notificaciones--}}
				<a class="nav-item nav-link" id="dirNotificaciones-tab" data-toggle="tab" href="#dirNotificaciones" role="tab" aria-controls="dirNotificaciones" aria-selected="false">Domicilio para notificaciones <span><i class="fa fa-angle-down"></i></span></a>
				{{-- Informacion deninciante  --}}
				<a class="nav-item nav-link" id="dirDenunciante-tab" data-toggle="tab" href="#dirDenunciante" role="tab" aria-controls="dirDenunciante" aria-selected="false">Datos del denunciante <span><i class="fa fa-angle-down"></i></span></a>	 	
			</div>
		</nav>
		{{-- personales-orientador --}}
		<input type=hidden id="esEmpresa" name="esEmpresa" value={{$tipopersona}}>
		<div class="tab-content" id="nav-tabContent">
			{{--  datos de la persona  --}}
			<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
				
				<div class="boxtwo">
					@if($tipopersona==0)
						@include('fields.persona')
					@else
						@include('fields.empresa')
					@endif
				</div>
				
				<div>
					<div class="row">
						<div class="col text-left">
							<a href="{{route('devolver', $idpreregistro)}}" class="btn btn-primary">Devolver turno</a>
						</div>
						<div class="col text-right">
							<a id=Adireccion  class="btn btn-primary">Siguiente</a>
						</div>
					</div>
				</div>
			</div>
			{{--  direccion particular  --}}
			<div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
				@include('fields.direcciones')
				<div>
					<div class="row">
						<div class="col text-left">
							<a href="{{route('devolver', $idpreregistro)}}" class="btn btn-primary">Devolver turno</a>
						</div>
			
						@if ($tipopersona==0)
							<div class="col text-right">
								<a  id=Atrabajo class="btn btn-primary">Siguiente</a>
							</div>
						@else
							<div class="col text-right">
								<a id="ANotificaciones2" class="btn btn-primary">Siguiente</a>
							</div>
						@endif

					</div>
				</div>
			</div>
			{{--  direccion de trabajo  --}}
			@if ($tipopersona==0)
				<div class="tab-pane fade" id="dirTrabajo" role="tabpanel" aria-labelledby="dirTrabajo-tab">
					@include('fields.lugartrabajo')
					<div class="row menu">
						<div class="col text-left">
							<a href="{{route('devolver', $idpreregistro)}}" class="btn btn-primary">Devolver turno</a>
						</div>
						<div class="col text-right">
							<a  id="ANotificaciones" class="btn btn-primary">Siguiente</a>
						</div>
					</div>
				</div>
			@endif
			{{--  direccion de Notificaciones  --}}
			<div class="tab-pane fade" id="dirNotificaciones" role="tabpanel" aria-labelledby="dirNotificaciones-tab">
				@include('fields.notificaciones')
				<div class="row menu">
					<div class="col text-left">
						<a href="{{route('devolver', $idpreregistro)}}" class="btn btn-primary">Devolver turno</a>
					</div>
					<div class="col text-right">
						<a  id="Adenunciante" class="btn btn-primary">Siguiente</a>
					</div>
				</div>
			</div>
			{{--  informacion denunciante  --}}
			<div class="tab-pane fade" id="dirDenunciante" role="tabpanel" aria-labelledby="dirDenunciante-tab">
				@include('fields.extra-denunciante')
				<div>
					<div class="row menu">
						<div class="col text-left">
							<a href="{{url('devolver/'.$idpreregistro)}}" class="btn btn-primary">Devolver turno</a>
						</div>
						<div class="col text-right">
							{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
						</div>
					</div>
				</div>
			</div>

		</div>
		
		<div>
			@include('tables.denunciantes')
		</div>
	</div>
</div>
{!!Form::close()!!}
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@push('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	{{-- <script src="{{ asset('js/predenunciacaso.js') }}"></script> --}}
	{{-- <script src="{{ asset('js/validation.js')}}"></script> --}}
	{{-- <script src="{{ asset('js/validation-orientador.js')}}"></script> --}}
	<script>

	

	$('#Adireccion').click(function(){
		//Quito la clase active al tab actual
		$('.nav-item').removeClass("active");
		//Agrego la clase active al tab actual
		$('#direccion-tab').addClass("active");
		//quito las clases del div contenedor personas para ocultar la info
		$('#personales').removeClass("active");
		$('#personales').removeClass("show");
		//agrego las clases del div contenedor direcciones para mostrar la info
		$('#direccion').addClass("active");
		$('#direccion').addClass("show");
	});

	$('#Atrabajo').click(function(){	
		//Quito la clase active al tab actual
		$('.nav-item').removeClass("active");
		//Agrego la clase active al tab actual
		$('#dirTrabajo-tab').addClass("active");
		//quito las clases del div contenedor personas para ocultar la info
		$('#direccion').removeClass("active");
		$('#direccion').removeClass("show");
		//agrego las clases del div contenedor direcciones para mostrar la info
		$('#dirTrabajo').addClass("active");
		$('#dirTrabajo').addClass("show");
	});

	$('#ANotificaciones').click(function(){
		//toastr.info('2');
		// //Quito la clase active al tab actual
		$('.nav-item').removeClass("active");
		// //Agrego la clase active al tab actual
		$('#dirNotificaciones-tab').addClass("active");
		// //quito las clases del div contenedor personas para ocultar la info
		$('#dirTrabajo').removeClass("active");
		$('#dirTrabajo').removeClass("show");
		// //agrego las clases del div contenedor direcciones para mostrar la info
		$('#dirNotificaciones').addClass("active");
		$('#dirNotificaciones').addClass("show");
	});

	$('#ANotificaciones2').click(function(){
		//toastr.info('EMPRESA->');
		// //Quito la clase active al tab actual
		$('.nav-item').removeClass("active");
		// //Agrego la clase active al tab actual
		$('#dirNotificaciones-tab').addClass("active");
		// //quito las clases del div contenedor personas para ocultar la info
		$('#direccion').removeClass("active");
		$('#direccion').removeClass("show");
		//agrego las clases del div contenedor direcciones para mostrar la info
		$('#dirNotificaciones').addClass("active");
		$('#dirNotificaciones').addClass("show");
	});
	$('#Adenunciante').click(function(){
		//toastr.info('3');
		//Quito la clase active al tab actual
		$('.nav-item').removeClass("active");
		//Agrego la clase active al tab actual
		$('#dirDenunciante-tab').addClass("active");
		//quito las clases del div contenedor personas para ocultar la info
		$('#dirNotificaciones').removeClass("active");
		$('#dirNotificaciones').removeClass("show");
		//agrego las clases del div contenedor direcciones para mostrar la info
		$('#dirDenunciante').addClass("active");
		$('#dirDenunciante').addClass("show");
	});


	$('#guardarDenunciante').click(function(){
		toastr.info('Se ha terminado el registro del denunciante');
		});

		$(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD',
				minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
				maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			});
		});

		$("#fechanac").on("change.datetimepicker", function (e) {
			$('#edad').val(moment().diff(e.date,'years'));
		});

	$("#fechanac").on("change.datetimepicker", function (e) {
		$('#edad').val(moment().diff(e.date,'years'));
	});

	$( "#edad" ).change(function() {
		var anios = $('#edad').val();
		$('#fechanac').datetimepicker('date', moment().subtract(anios, 'years').format('YYYY-MM-DD'));
	});

	id = $(".datotip").attr("id");
	if(id==0){
		$("#esEmpresa1").prop("checked", true);
		console.log("entro");
	}
	else{
		console.log(id);
	}
	
	
	
	
</script>
@endpush