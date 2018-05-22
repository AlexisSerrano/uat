@extends('template.form')

@section('title', 'Agregar delito')

@section('content')
@include('fields.errores')
	@include('fields.buttons-navegacion')
	@include('fields.botonborrar')
    {!! Form::open(['route' => 'store.delito', 'method' => 'POST', 'id'=>'form'])  !!}
	<br>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
			<a class="nav-link active disabled" id="delito-tab" data-toggle="tab" href="#delito" role="tab" aria-controls="delito" aria-selected="true">Información sobre el delito</a>
		</li>
		<li class="nav-item">
			<a class="nav-link disabled" id="dirdelito-tab" data-toggle="tab" href="#dirdelito" role="tab" aria-controls="dirdelito" aria-selected="false">Información sobre el lugar de los hechos</a>
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
						<a id="aDelito"class="btn btn-primary irdirdelito"><i class="fa fa-arrow-right"></i></a>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade" id="dirdelito" role="tabpanel" aria-labelledby="dirdelito-tab">
			<div class="boxtwo">
				@include('fields.dir-delito')
				@include('fields.lugar-hechos')
				
				<div class="row">
					<div class="col text-left">
						<a id="irdelito" class="btn btn-primary "><i class="fa fa-arrow-left"></i></a>
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
	<script src="{{ asset('js/siguientes.js') }}"></script>
	<script src="{{ asset('js/borrar.js') }}"></script>
	<script>
		// $('.irdirdelito').click(function(){
			
		// });

		$('#irdelito').click(function(){
			$('.nav-link').removeClass("active");//Quito la clase active al tab actual
			$('#delito-tab').addClass("active");//Agrego la clase active al tab actual
			$('.tab-pane').removeClass("active");//quito las clases del div contenedor personas para ocultar la info
			$('.tab-pane').removeClass("show");
			$('#delito').addClass("active");//agrego las clases del div contenedor direcciones para mostrar la info
			$('#delito').addClass("show");
		});

	</script>
@endpush