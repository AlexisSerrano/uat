@extends('template.form')

@section('title', 'Agregar denunciante')

@section('content')
@include('fields.errores')

<div id="page-content-wrapper">

{!!Form::open(['route' => 'store.denunciante', 'method' => 'POST', 'id'=>'form'])!!}

@include('fields.buttons-navegacion')
@include('fields.botonborrar')

	<div class="col-md-12">
		<br>
		<nav>
			<div class="nav nav-tabs color-nav-tab" id="nav-tab" role="tablist">
				{{--  datos personales  --}}
				<a class="nav-item nav-link active color-nav-tab disabled" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="nav-personales" aria-selected="true">Datos personales <span><i class="fa fa-angle-down"></i></span></a>
				{{--  Datos del Direccion particular--}}
				<a class="nav-item nav-link color-nav-tab disabled" id="direccion-tab" data-toggle="tab" href="#direccion" role="tab" aria-controls="nav-direccion" aria-selected="false">Domicilio <span><i class="fa fa-angle-down"></i></span> </a>
				{{--  Direccion Trabajo del trabajo--}}
				<a class="nav-item nav-link color-nav-tab disabled" id="trabajo-tab" data-toggle="tab" href="#trabajo" role="tab" aria-controls="trabajo" aria-selected="false">Datos del trabajo <span><i class="fa fa-angle-down"></i></span> </a>
				{{-- Domicilio Notificaciones--}}
				<a class="nav-item nav-link disabled" id="dirnotificacion-tab" data-toggle="tab" href="#dirnotificacion" role="tab" aria-controls="dirnotificacion" aria-selected="false">Domicilio para notificaciones <span><i class="fa fa-angle-down"></i></span></a>
				{{-- Informacion deninciante  --}}
				<a class="nav-item nav-link disabled" id="denunciante-tab" data-toggle="tab" href="#denunciante" role="tab" aria-controls="denunciante" aria-selected="false">Datos del denunciante <span><i class="fa fa-angle-down"></i></span></a>	 	
			
			</div>
		</nav>
		
		<div class="tab-content" id="nav-tabContent">
			{{--  datos de la persona  --}}
			<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
				<div class="boxtwo">
					<div class="row">
						@include('fields.tipo-persona')
					</div>
					@include('fields.personales')
					<div class="row">
						<div class="col text-left">
						</div>
						<div class="col text-right">
							<a  id=Adireccion  class="btn btn-secondary irdireccion"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			{{--  direccion particular  --}}
			<div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
				<div class="boxtwo">
					@include('fields.direcciones')
					<div class="row">
						<div class="col text-left">
							<a id="aPersonales" class="btn btn-secondary irpersonales"><span><i class="fa fa-arrow-left"></i></span></a>
						</div>
						<div class="col text-right">
							<a id=Atrabajo class="btn btn-secondary irtrabajo"><i class="fa fa-arrow-right"></i></a>
							<a id="ANotificaciones2" class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			{{--  direccion de trabajo  --}}
			<div class="tab-pane fade" id="trabajo" role="tabpanel" aria-labelledby="trabajo-tab">
				<div class="boxtwo">
					@include('fields.lugartrabajo')
					<div class="row menu">
						<div class="col text-left">
							<a id="irdireccion" class="btn btn-secondary "><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a id="ANotificaciones" class="btn btn-secondary"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>	
			{{--  direccion de Notificaciones  --}}
			<div class="tab-pane fade" id="dirnotificacion" role="tabpanel" aria-labelledby="dirnotificacion-tab">
				<div class="boxtwo">
					@include('fields.notificaciones')
					<div class="row menu">
						<div class="col text-left">
							<a id="atrabajo2" class="btn btn-secondary irtrabajo"><i class="fa fa-arrow-left"></i></a>
							<a id="adireccion2" class="btn btn-secondary irdireccion"><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a id="Adenunciante" class="btn btn-secondary irdenunciante"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			{{--  informacion denunciante  --}}
			<div class="tab-pane fade" id="denunciante" role="tabpanel" aria-labelledby="denunciante-tab">
				<div class="boxtwo">
					@include('fields.extra-denunciante')				
					<div class="row menu">
						<div class="col text-left">
							<a id="irdirnotificacion" class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-left"></i></a>
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

@push('scripts')
	<script src="{{ asset('js/rfcMoral-f.js') }}"></script>
	<script src="{{ asset('js/rfcFisico-f.js') }}"></script>
	<script src="{{ asset('js/curp-f.js') }}"></script>
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script src="{{ asset('js/scriptsform.js') }}"></script>
	<script src="{{ asset('js/siguientes.js') }}"></script>
	<script src="{{ asset('js/borrar.js') }}"></script>
	
	{{-- <script src="{{ asset('js/validation.js')}}"></script>
	<script src="{{ asset('js/validation-orientador.js')}}"></script> --}}
	<script>


	id = $(".datotip").attr("id");
	
	if(id==0){
		$("#esEmpresa1").prop("checked", true);
		console.log("entro");
	}
	else{
		console.log(id);
	}
	
	$('#aPersonales').click(function(){
		$('.nav-link').removeClass("active");
        $('#personales-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		$('#personales').addClass("show");
		console.log('boton atrás')
		});
	$('#irdirnotificacion').click(function(){
		$('.nav-link').removeClass("active");
        $('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		$('#dirnotificacion').addClass("show");
		console.log('boton atrás')
		});
	$('#irdireccion').click(function(){
		$('.nav-link').removeClass("active");
        $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		$('#direccion').addClass("show");
		console.log('boton atrás')
		});
	
		

		$('#adireccion2').click(function(){
		$('.nav-link').removeClass("active");
        $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
        $('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
        $('.tab-pane').removeClass("show");
        $('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		$('#direccion').addClass("show");
		console.log('boton atrás')
		});
	
</script>
@endpush