@extends('template.form')
@section('title', 'Agregar denunciante')
@section('content')
@include('fields.errores')

{!!Form::open(['route' => 'store.denunciante'])!!}

{{-- @include('fields.buttons-navegacion') --}}
  
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
					<a class="nav-item nav-link color-nav-tab" id="trabajo-tab" data-toggle="tab" href="#trabajo" role="tab" aria-controls="trabajo" aria-selected="false">Datos del trabajo <span><i class="fa fa-angle-down"></i></i></span> </a>
				@endif
				{{-- Domicilio Notificaciones--}}
				<a class="nav-item nav-link" id="dirnotificacion-tab" data-toggle="tab" href="#dirnotificacion" role="tab" aria-controls="dirnotificacion" aria-selected="false">Domicilio para notificaciones <span><i class="fa fa-angle-down"></i></span></a>
				{{-- Informacion deninciante  --}}
				<a class="nav-item nav-link" id="denunciante-tab" data-toggle="tab" href="#denunciante" role="tab" aria-controls="denunciante" aria-selected="false">Datos del denunciante <span><i class="fa fa-angle-down"></i></span></a>	 	
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
						@php
							$botonatras='irtrabajo';
						@endphp
					@else
						@include('fields.empresa')
						@php
							$botonatras='irdireccion';
						@endphp
					@endif
					<div class="row">
						<div class="col text-left">
						</div>
						<div class="col text-right">
							<a class="btn btn-secondary irdireccion"><i class="fa fa-arrow-right"></i></a>
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
							<a class="btn btn-secondary irpersonales"><i class="fa fa-arrow-left"></i></a>
						</div>
			
						@if ($tipopersona==0)
							<div class="col text-right">
								<a class="btn btn-secondary irtrabajo"><i class="fa fa-arrow-right"></i></a>
							</div>
						@else
							<div class="col text-right">
								<a class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-right"></i></a>
							</div>
						@endif

					</div>
				</div>
			</div>
			{{--  direccion de trabajo  --}}
			@if ($tipopersona==0)
				<div class="tab-pane fade" id="trabajo" role="tabpanel" aria-labelledby="trabajo-tab">
					<div class="boxtwo">
						@include('fields.lugartrabajo')
						<div class="row menu">
							<div class="col text-left">
								<a class="btn btn-secondary irdireccion"><i class="fa fa-arrow-left"></i></a>
							</div>
							<div class="col text-right">
								<a class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-right"></i></a>
							</div>
						</div>
					</div>
				</div>
			@endif
			{{--  direccion de Notificaciones  --}}
			<div class="tab-pane fade" id="dirnotificacion" role="tabpanel" aria-labelledby="dirnotificacion-tab">
				<div class="boxtwo">					
					@include('fields.notificaciones')
					<div class="row menu">
						<div class="col text-left">
							<a class="btn btn-secondary {{$botonatras}}"><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a class="btn btn-secondary irdenunciante"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			{{--  informacion denunciante  --}}
			<div class="tab-pane fade" id="denunciante" role="tabpanel" aria-labelledby="denunciante-tab">
				<div class="boxtwo">
					@include('fields.extra-denunciante')
					<div>
						<div class="row menu">
							<div class="col text-left">
								<a class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-left"></i></a>
							</div>
							<div class="col text-right">
								{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
		<br>
		{{-- <div>
			@include('tables.denunciantes')
		</div> --}}
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
		$('.irtrabajo').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#trabajo').addClass("show");
		});

		$('.irdireccion').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#direccion').addClass("show");
		});

		
		$('.irpersonales').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#personales-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#personales').addClass("show");
		});

		$('.irdirnotificacion').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#dirnotificacion-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#dirnotificacion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#dirnotificacion').addClass("show");
		});

		$('.irdenunciante').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#denunciante-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#denunciante').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#denunciante').addClass("show");
		});



		$(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD'
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