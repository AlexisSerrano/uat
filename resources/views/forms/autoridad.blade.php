@extends('template.form')

@section('title', 'Agregar Autoridad')
@section('content')
@include('fields.buttons-navegacion')
@include('fields.errores')
{!! Form::open(['route' => 'store.autoridad', 'method' => 'POST'])  !!}
<br>
<ul class="nav nav-tabs" id="myTab" role="tablist">
	<li class="nav-item">
	  <a class="nav-link active disabled" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="true">Datos personales</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" id="direccion-tab" data-toggle="tab" href="#direccion" role="tab" aria-controls="direccion" aria-selected="false">Dirección</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" id="trabajo-tab" data-toggle="tab" href="#trabajo" role="tab" aria-controls="trabajo" aria-selected="false">Dirección de trabajo</a>
	</li>
	<li class="nav-item">
		<a class="nav-link disabled" id="autoridad-tab" data-toggle="tab" href="#autoridad" role="tab" aria-controls="autoridad" aria-selected="false">Datos de autoridad</a>
	</li>
</ul>

<div class="tab-content" id="myTabContent">
	<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
		<div class="boxtwo">
			@include('fields.personales-aut')
			{{-- botones --}}
			<div class="row menu">	
				<div class="col text-left">				
				</div>
				<div class="col text-right">
					<a id="Adireccion" class="btn btn-secondary irdireccion"><i class="fa fa-arrow-right"></i></a>
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="direccion" role="tabpanel" aria-labelledby="direccion-tab">
		<div class="boxtwo">
			@include('fields.direcciones')
			{{-- botones --}}
			<div class="row menu">	
				<div class="col text-left">				
					<a id="irpersonales" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
				</div>
				<div class="col text-right">
					<a id="Atrabajo" class="btn btn-secondary irtrabajo"><i class="fa fa-arrow-right"></i></a>							
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="trabajo" role="tabpanel" aria-labelledby="trabajo-tab">
		<div class="boxtwo">
			@include('fields.lugartrabajo')
			{{-- botones --}}
			<div class="row menu">	
				<div class="col text-left">				
					<a id="irdireccion" class="btn btn-secondary "><i class="fa fa-arrow-left"></i></a>
				</div>
				<div class="col text-right">
					<a id="Aautoridad"class="btn btn-secondary irextraautoridad"><i class="fa fa-arrow-right"></i></a>							
				</div>
			</div>
		</div>
	</div>
	<div class="tab-pane fade" id="autoridad" role="tabpanel" aria-labelledby="autoridad-tab">
		<div class="boxtwo">
			@include('fields.extra-aut')
			{{-- botones --}}
			<div class="row menu">	
				<div class="col text-left">
					<a id="irtrabajo" class="btn btn-secondary "><i class="fa fa-arrow-left"></i></a>				
				</div>
				<div class="col text-right">
					{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
				</div>
			</div>
		</div>
	</div>
</div>	


	
	
	{!! Form::close() !!}
	<div class="boxtwo">
		@include('tables.autoridades')
	</div>
@endsection


@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script src="{{ asset('js/siguientes.js') }}"></script>
	<script>
		$('#irdireccion').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#direccion').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#direccion').addClass("show");
		});
		
		$('#irtrabajo').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#trabajo').addClass("show");
		});

		$('#irpersonales').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#personales-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#personales').addClass("show");
		});

		// $('.irextraautoridad').click(function(){
		// 	$('.nav-link').removeClass("active");//Quito la clase active al tab actual
		// 	$('#autoridad-tab').addClass("active");//Agrego la clase active al tab actual
		// 	$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
		// 	$('.tab-pane').removeClass("show");
		// 	$('#autoridad').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
		// 	$('#autoridad').addClass("show");
		// });


		$(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD',
				minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
				maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			});
		});

	</script>
@endpush