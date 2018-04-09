@extends('template.form')
@section('content')
@include('fields.errores')

<div id="page-content-wrapper">

{!!Form::open(['route' => 'store.denunciante'])!!}

@php
	if (count($denunciantes)==0){
		$registroDenunciante='btn btn-secondary';
	}else{
		$registroDenunciante='btn btn-success';
	}
	if (!isset($registroDenunciado)){
		$registroDenunciado='btn btn-secondary';
	}
	if (!isset($registroAbogado)){
		$registroAbogado='btn btn-secondary';
	}
	if (!isset($registroAutoridad)){
		$registroAutoridad='btn btn-secondary';
	}
	if (!isset($registroAcusaciones)){
		$registroAcusaciones='btn btn-secondary';
	}
	if (!isset($registroDelitos)){
		$registroDelitos='btn btn-secondary';
	}
	if (!isset($registroDefenza)){
		$registroDefenza='btn btn-secondary';
	}
	if (!isset($registroDescripcion)){
		$registroDescripcion='btn btn-secondary';
	}
	
	@endphp

	
	<br><br>
	
<div class="btn-group col">
	
	<div class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-secondary" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></button>   
	</div>
	<a href="{{route('new.denunciante')}}" class="{{$registroDenunciante}} form-control">Denunciante</a>
	<a  class="{{$registroDenunciado}} form-control">Denunciado</a>
	<a  class="{{$registroAbogado}} form-control">Abogado</a>
	<a  class="{{$registroAutoridad}} form-control">Autoridad</a>
	<a  class="{{$registroDelitos}} form-control">Delitos</a>
	<a  class="{{$registroAcusaciones}} form-control">Acusaciones</a>
	<a  class="{{$registroDefenza}} form-control">Defensa</a>
	<a href="{{route('narracion')}}" class="{{$registroDescripcion}} form-control">Descripción de hechos</a>
	{{--  <button class="btn button1" >Devolver turno</button>  --}}
</div>
  
{{--  <div class="container">  --}}
	{{--  <div id="page-content-wrapper">  --}}
{{--  <span class="datotip" id="{{$tipopersona}}"></span> 	  --}}
	
	<div class="col-md-12">
		<br>
		<nav>
			
			<div class="nav nav-tabs color-nav-tab" id="nav-tab" role="tablist">
				{{--  datos personales  --}}
				<a class="nav-item nav-link active color-nav-tab" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="nav-personales" aria-selected="true">Datos personales <span><i class="fa fa-address-card-o"></i></span></a>
				{{--  Datos del Direccion particular--}}
				<a class="nav-item nav-link color-nav-tab" id="direccion-tab" data-toggle="tab" href="#direccion" role="tab" aria-controls="nav-direccion" aria-selected="false">Domicilio <span><i class="fa fa-check-circle"></i></span> </a>
				{{--  Direccion Trabajo del trabajo--}}
				<a class="nav-item nav-link color-nav-tab" id="dirTrabajo-tab" data-toggle="tab" href="#dirTrabajo" role="tab" aria-controls="dirTrabajo" aria-selected="false">Datos del trabajo <span><i class="fa fa-check-circle"></i></span> </a>
				{{-- Domicilio Notificaciones--}}
				<a class="nav-item nav-link" id="dirNotificaciones-tab" data-toggle="tab" href="#dirNotificaciones" role="tab" aria-controls="dirNotificaciones" aria-selected="false">Domicilio para notificaciones <span><i class="fa fa-home"></i></span></a>
				{{-- Informacion deninciante  --}}
				<a class="nav-item nav-link" id="dirDenunciante-tab" data-toggle="tab" href="#dirDenunciante" role="tab" aria-controls="dirDenunciante" aria-selected="false">Datos del denunciante <span><i class="fa fa-archive"></i></span></a>	 	
			
			</div>
		</nav>
		{{-- personales-orientador --}}
		
		<div class="tab-content" id="nav-tabContent">
			{{--  datos de la persona  --}}
			<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
				
					
				<div class="boxtwo">
					<div class="row">
						@include('fields.tipo-persona')
					</div>
				</div>
			
				<div class="boxtwo">
					@include('fields.personales')
				</div>
			
				<div>
					<div class="row">
						<div class="col text-left">
							<a href="{{route('cancelar.caso')}}" class="btn button1">Cancelar</a>
						</div>
						<div class="col text-right">
							<a id=Adireccion  class="btn button1">Siguiente</a>
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
							<a href="{{route('cancelar.caso')}}" class="btn button1">Cancelar</a>
						</div>
			
						<div class="col text-right">
							<a id=Atrabajo class="btn button button1">Siguiente</a>
							<a id="ANotificaciones2" class="btn button button1">Siguiente</a>
						</div>
					</div>
				
				</div>
			</div>
			{{--  direccion de trabajo  --}}
			<div class="tab-pane fade" id="dirTrabajo" role="tabpanel" aria-labelledby="dirTrabajo-tab">
				@include('fields.lugartrabajo')
				<div class="row menu">
					<div class="col text-left">
						<a href="{{route('cancelar.caso')}}" class="btn button1">Cancelar</a>
					</div>
					<div class="col text-right">
						<a id="ANotificaciones" class="btn button1">Siguiente</a>
					</div>
				</div>
			</div>	
			{{--  direccion de Notificaciones  --}}
			<div class="tab-pane fade" id="dirNotificaciones" role="tabpanel" aria-labelledby="dirNotificaciones-tab">
				@include('fields.notificaciones')
				<div class="row menu">
					<div class="col text-left">
						<a href="{{route('cancelar.caso')}}" class="btn button1">Cancelar</a>
					</div>
					<div class="col text-right">
						<a id="Adenunciante" class="btn button1">Siguiente</a>
					</div>
				</div>
			</div>
			{{--  informacion denunciante  --}}
			<div class="tab-pane fade" id="dirDenunciante" role="tabpanel" aria-labelledby="dirDenunciante-tab">
				@include('fields.extra-denunciante')
				<div>
					<div class="row menu">
						
						<div class="col text-left">
								
						
							<a href="{{route('cancelar.caso')}}" class="btn button1">Cancelar</a>
							
						</div>
						
						<div class="col text-right">
							
							{!!Form::submit('Guardar',array('class' => 'btn button1','id'=>'guardarDenunciante'))!!}
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

@section('scripts')
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script src="{{ asset('js/scriptsform.js') }}"></script>
	<script src="{{ asset('js/validation.js')}}"></script>
	<script src="{{ asset('js/validation-orientador.js')}}"></script>
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

	// $('#guardarDenunciante').click(function(){
	// 	if
	// 	toastr.info('Se ha terminado el registro del denunciante');
	// 	});

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
@endsection