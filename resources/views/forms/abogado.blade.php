@extends('template.form')

@section('title', 'Agregar Abogado')
@section('content')
	@include('fields.buttons-navegacion')
	@include('fields.errores')
	
    {!! Form::open(['route' => 'store.abogado', 'method' => 'POST'])  !!}
	<br>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
		  	<a class="nav-link active" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="true">Datos personales</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" id="trabajo-tab" data-toggle="tab" href="#trabajo" role="tab" aria-controls="trabajo" aria-selected="false">Datos del trabajo</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link" id="abogado-tab" data-toggle="tab" href="#abogado" role="tab" aria-controls="abogado" aria-selected="false">Datos del abogado</a>
		</li>
	  </ul>
	  <div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
			
				<div class="boxtwo">
					@include('fields.personales-abo')
					{{-- botones --}}
					<div class="row menu">	
						<div class="col text-left">				
						</div>
						<div class="col text-right">
							<a class="btn btn-primary irtrabajo">Siguiente</a>
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
							<a class="btn btn-primary irpersonales"><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a class="btn btn-primary irextraabogado">Siguiente</a>							
						</div>
					</div>
				</div>
			
		</div>
		<div class="tab-pane fade" id="abogado" role="tabpanel" aria-labelledby="abogado-tab">
				<div class="boxtwo">
					@include('fields.extra-abo')
					{{-- botones --}}
					<div class="row menu">	
						<div class="col text-left">
							<a class="btn btn-primary irtrabajo"><i class="fa fa-arrow-left"></i></a>				
						</div>
						<div class="col text-right">
							{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
						</div>
					</div>
				</div>
			
		</div>
	  </div>
	  
	


	{!! Form::close() !!}
	<br>
	<div class="card">
		<div class="boxtwo card-body">
			@include('tables.abogados')
		</div>
	</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script>
		$('.irtrabajo').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#trabajo-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#trabajo').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#trabajo').addClass("show");
		});

		$('.irpersonales').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#personales-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#personales').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#personales').addClass("show");
		});

		$('.irextraabogado').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#abogado-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#abogado').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#abogado').addClass("show");
		});


		$(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD',
				minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
				maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			});
		});

	</script>
@endpush