{{-- @php
$form = oldFormAbogado();
@endphp --}}
@extends('template.form')

@section('title', 'Agregar Abogado')
@section('content')
	@include('fields.buttons-navegacion')
	@include('fields.botonborrar')
	@include('fields.errores')
	
    {!! Form::open(['route' => 'store.abogado', 'method' => 'POST', 'id'=>'form'])  !!}
	<br>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
		<li class="nav-item">
		  	<a class="nav-link active disabled" id="personales-tab" data-toggle="tab" href="#personales" role="tab" aria-controls="personales" aria-selected="true">Datos personales</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link disabled" id="trabajo-tab" data-toggle="tab" href="#trabajo" role="tab" aria-controls="trabajo" aria-selected="false">Datos del trabajo</a>
		</li>
		<li class="nav-item">
		  	<a class="nav-link disabled" id="abogado-tab" data-toggle="tab" href="#abogado" role="tab" aria-controls="abogado" aria-selected="false">Datos del abogado</a>
		</li>
	  </ul>
	  <div class="tab-content" id="myTabContent">
		<div class="tab-pane fade show active " id="personales" role="tabpanel" aria-labelledby="personales-tab">
			
				<div class="boxtwo">
					@include('fields.personales-abo')
					{{-- botones --}}
					<div class="row menu">	
						<div class="col text-left">				
						</div>
						<div class="col text-right">
							<a id="Atrabajo2" class="btn btn-secondary irtrabajo"><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>	
			
		</div>
		<div class="tab-pane fade" id="trabajo" role="tabpanel" aria-labelledby="trabajo-tab">
			
				<div class="boxtwo">
					@include('fields.lugartrabajoAbo')
					{{-- botones --}}
					<div class="row menu">	
						<div class="col text-left">				
							<a id="irpersonales" class="btn btn-secondary "><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a id="aAbogado" class="btn btn-secondary irextraabogado"><i class="fa fa-arrow-right"></i></a>							
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
	<br>
	
		
			@include('tables.abogados')
	
	
@endsection

@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script src="{{ asset('js/siguientes.js') }}"></script>
	<script src="{{ asset('js/borrar.js') }}"></script>
	<script src="{{ asset('js/rfcFisico-f.js') }}"></script>

	<script>
		

	</script>
@endpush