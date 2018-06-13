@extends('template.form')

@section('title', 'Agregar Víctima u ofendido')
@section('css')
<style>
	.btn-success{
		background: black;
	}	
</style>
	
@endsection
@section('content')
@include('fields.errores')

		@include('fields.buttons-navegacion')
		@include('fields.botonborrar')
		<br>

{!!Form::open(['route' => 'store.denunciado' , 'method' => 'POST', 'id'=>'form'])!!}
  
{{--  <div class="container">  --}}
	{{--  <div id="page-content-wrapper">  --}}
{{--  <span class="datotip" id="{{$tipopersona}}"></span> 	  --}}
	
<div class="boxtwo">
		<div class="row">
			<div class="col-6">
				<div class="form-group">
					<label class="col-form-label col-form-label-sm" for="formGroupExampleInput">Selecciona una opción</label>
					<div class="clearfix"></div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							<input class="form-check-input" type="radio" id="tipoDenunciado1" name="tipoDenunciado" value="1" required> Q.R.R.
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							<input class="form-check-input" type="radio" id="tipoDenunciado2" name="tipoDenunciado" value="2" required> Conoce al denunciado
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							<input class="form-check-input" type="radio" id="tipoDenunciado3" name="tipoDenunciado" value="3" required> Por comparecencia
						</label>
					</div>
				</div>
			</div>
			<div class="col-6 comparecencia">
				<div class="row">
	    			@include('fields.tipo-persona')
				</div>
	    	</div>
		</div>
	</div>

	<input type="hidden" name="idCarpeta" value="{{session('carpeta')}}">

	<div id="qrr">
		<div class="boxtwo">
			<div class="row">
				<div class="col-12">
					<div class="form-group">
						{!! Form::label('nombresQ', 'Nombre', ['class' => 'col-form-label-sm']) !!}
						{!! Form::text('nombresQ', "QUIEN O QUIENES RESULTEN RESPONSABLES", ['class' => 'form-control form-control-sm', 'readonly']) !!}
					</div>
				</div>
			</div>
			<div>
				<div class="row menu">
					<div class="col text-left">	
						{{-- <a href="{{route('cancelar.caso')}}" class="btn btn-primary ">Cancelar</a> --}}
					</div>
					<div class="col text-right">
						{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
					</div>
				</div>
			</div>
		</div>
	</div>
	
	<div id="conocido">
		<div class="boxtwo">
			@include('fields.det-conocido')
			<div>
				<div class="row menu">
					<div class="col text-left">
					</div>
					
					<div class="col text-right">
						{!!Form::submit('Guardar',array('class' => 'btn btn-primary','id'=>'guardarDenunciante'))!!}
					</div>
				</div>
			</div>
		</div>
	</div>

	<div  class="col-md-12 comparecencia">
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
				<a class="nav-item nav-link disabled" id="denunciado-tab" data-toggle="tab" href="#denunciado" role="tab" aria-controls="denunciado" aria-selected="false">Datos del denunciado <span><i class="fa fa-angle-down"></i></span></a>	 	
			
			</div>
		</nav>
		
		<div class="tab-content" id="nav-tabContent">
			{{--  datos de la persona  --}}
			<div class="tab-pane fade show active" id="personales" role="tabpanel" aria-labelledby="personales-tab">
				<div class="boxtwo">
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
							<a id="irpersonales" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
							<a id="ANotificaciones" class="btn btn-secondary irdirnotificacion"><i class="fa fa-arrow-right"></i></a>
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
							<a id="adireccion2" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
						</div>
						<div class="col text-right">
							<a id="Adenunciado" class="btn btn-secondary "><i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
			</div>
			{{--  informacion denunciado  --}}
			<div class="tab-pane fade" id="denunciado" role="tabpanel" aria-labelledby="denunciado-tab">
				<div class="boxtwo">
					@include('fields.extra-denunciado')				
					<div class="row menu">
						<div class="col text-left">
							<a id="irdirnotificacion" class="btn btn-secondary"><i class="fa fa-arrow-left"></i></a>
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
	@include('tables.denunciados')
</div>
{!!Form::close()!!}

@endsection

@push('scripts')
	<script src="{{ asset('js/selectsDirecciones.js') }}"></script>
	<script src="{{ asset('js/scriptsform.js') }}"></script>
	<script src="{{ asset('js/siguientes.js') }}"></script>
	<script src="{{ asset('js/rfcMoral-f.js') }}"></script>
	<script src="{{ asset('js/rfcFisico-f.js') }}"></script>
	<script src="{{ asset('js/curp-f.js') }}"></script>
	<script src="{{ asset('js/borrar.js') }}"></script>
	
	<script>


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