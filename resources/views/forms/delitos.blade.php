@extends('template.form')

@section('title', 'Agregar delito')

@section('content')
@include('fields.errores')
	@include('fields.buttons-navegacion')
    {!! Form::open(['route' => 'store.delito', 'method' => 'POST'])  !!}
	<br>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active" id="delito-tab" data-toggle="tab" href="#delito" role="tab" aria-controls="delito" aria-selected="true">Información sobre el delito</a>
		</li>
		<li class="nav-item">
			<a class="nav-link" id="dirdelito-tab" data-toggle="tab" href="#dirdelito" role="tab" aria-controls="dirdelito" aria-selected="false">Información sobre el lugar de los hechos</a>
		</li>
	</ul>
	<div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active" id="delito" role="tabpanel" aria-labelledby="delito-tab">
			<div class="boxtwo">
				@include('fields.delito')
				<div class="row">
					<div class="col text-left">
					</div>
					<div class="col text-right">	
						<a class="btn btn-primary irdirdelito">Siguiente</a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="dirdelito" role="tabpanel" aria-labelledby="dirdelito-tab">
			<div class="boxtwo">
				@include('fields.direcciones')
				@include('fields.lugar-hechos')
				
				<div class="row">
					<div class="col text-left">
							<a class="btn btn-primary irdelito">Atras</a>
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
		@include('tables.delitos')
	</div>
@endsection

@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script>
		$('.irdirdelito').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#dirdelito-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#dirdelito').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#dirdelito').addClass("show");
		});

		$('.irdelito').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#delito-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#delito').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#delito').addClass("show");
		});

		$(document).ready(function(){
			$(function () {
				$('#fechadelit').datetimepicker({
				format: 'YYYY-MM-DD',
				maxDate: moment()
				});
			});

			$(function () {
				$('#horadelit').datetimepicker({
				format: 'LT',
				maxDate: moment()
				});
			});
		});
	</script>
@endpush