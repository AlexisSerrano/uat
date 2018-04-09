@extends('template.main')
@section('content')
@if ($errors->any())
	<div class="alert alert-danger">
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

@include('orientador.sidebar-orientador')

<div class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-secondary" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></button>   
	</div>
	
{{-- {!!Form::open(['route' => 'store.denunciante'])!!} --}}

<nav>
	<div class="nav nav-tabs color-nav-tab" role="tablist">
		<ul class="nav nav-pills">
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Denunciante</a>
			</li>
			<li class="nav-item">
				<a class="nav-link active" href="#">Denunciado</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Abogados</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Medidas de Protección</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Medidas de Protección</a>
			</li>
			<li class="nav-item">
				<a class="nav-link disabled" href="#">Hechos</a>
			</li>
		</ul>

	</div>
</nav>
<br>

<div id="page-content-wrapper"> 	
	
	<div class="col-md-12">
		<br>
		<nav>
			
			<div class="nav nav-tabs color-nav-tab" id="nav-tab" role="tablist">
				{{--  datos del denunciado  --}}
				<a class="nav-item nav-link active color-nav-tab" id="nav-personales-tab" data-toggle="tab" href="#nav-personales" role="tab" aria-controls="nav-personales" aria-selected="true">Datos Personales</a>
				{{-- Datos de localizacion solo para comparecencia o conocido--}}
				<a class="nav-item nav-link color-nav-tab" id="nav-direccion-tab" data-toggle="tab" href="#nav-direccion" role="tab" aria-controls="nav-direccion" aria-selected="false">Domicilio</a>
				{{-- Datos extra solo para comparecencia--}}
				<a class="nav-item nav-link color-nav-tab" id="nav-datosExtra-tab" data-toggle="tab" href="#nav-datosExtra" role="tab" aria-controls="nav-datosExtra" aria-selected="false">Otros datos </a>
				
					 	
			</div>
		</nav>
		{{-- personales-orientador --}}
		
		<div class="tab-content" id="nav-tabContent">
			{{--  datos del denunciado conocido/comparecencia/qrr --}}
			<div class="tab-pane fade show active" id="nav-personales" role="tabpanel" aria-labelledby="nav-personales-tab">
				<div class="boxtwo">
					@include('orientador.denunciado.forms.personales-denunciado')
			</div>
			<div class="row">
				<div class="col text-left">
					<a href="" class="btn button button1">Cancelar</a>
				</div>
				<div class="col text-right">
					<a href="" class="btn button button1">Siguiente</a>
				</div>
			</div>		
		</div>
		
			{{--  Datos de localización conocido/comparecencia  --}}
			{{-- crear un if para desabilitar si selecciona qrr --}}
			<div class="tab-pane fade" id="nav-direccion" role="tabpanel" aria-labelledby="nav-direccion-tab">
					{{--  direccion de conocido o comparecencia --}}
					<div class="boxtwo">
							@include('orientador.denunciante.fields-denunciante-new.direcciones')
					</div>
					<div class="row">
							<div class="col text-left">
								<a href="" class="btn button button1">Cancelar</a>
							</div>
							<div class="col text-right">
								<a href="" class="btn button button1">Siguiente</a>
							</div>
						</div>
			</div>
			{{--  Datos extra solo para comparecencia  --}}
					<div class="tab-pane fade" id="nav-datosExtra" role="tabpanel" aria-labelledby="nav-datosExtra-tab">
							<div class="boxtwo">
									@include('orientador.denunciado.fields.extra-conocido')
							</div>
							<div class="row">
									<div class="col text-left">
										<a href="" class="btn button button1">Cancelar</a>
									</div>
									<div class="col text-right">
										<a href="" class="btn button button1">Siguiente</a>
									</div>
								</div>
					</div>
			</div>

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
	{{-- <script src="{{ asset('js/scriptsform.js') }}"></script> --}}
	<script src="{{ asset('js/validation.js')}}"></script>
	<script src="{{ asset('js/denunciado.js')}}"></script>
	<script>



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
</script>
@endsection