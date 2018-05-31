{{-- 
<style type="text/css">
	.loadPage{
		display: block;
		background: #333;
		color: white;
		width: 100%;
		height:100%;
		position: fixed;
		top: 0;
		left: 0;
		z-index: 1000;
	}
	.loadPage p{
		display: : block;
		width: 100px;
		height: 30px;
		font-size: 30px;
		position: absolute;
		top: 0;
		left: 0;
		bottom: 0;
		right: 0;
		margin: auto;
			}
	
		.oculto{
			display: none;
		}
	</style> --}}
@extends('servicios.preregistro.templates.form2')

@section('content')
@if ($errors->any())
	<div class="alert alert-danger">
		@php
		$form = oldForm();
		@endphp
		<ul>
			@foreach ($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
@endif

	

{!!Form::open(['route' => 'preregistro.store'])!!}

<br>
	<p class="lead" align="center">

				PRE-REGISTRO

	</p>
	{{-- <span id="pantalla" class="oculto" >
		<p>Cargando...</p>
	</span> --}}
	<div>
		@include('servicios.preregistro.fields.tipo-persona')
	</div>
	<div class="card" id="datosPer">
		<div class="card-header lead" align="center">
				Datos personales
		</div>
		<div id="collapsePersonales1">
			<div class="boxtwo">
				<div class="col">
				@include('servicios.preregistro.fields.datos-personales')
				</div>
			</div>
		</div>

		<div id="collapsePersonales2">
			<div class="boxtwo">
				<div class="col">
				@include('servicios.preregistro.fields.datos-empresa')
				</div>
			</div>
		</div>
	</div>	

	<div class="card" id="datosPer">
		<div class="card-header">
		<div class="boxtwo">
			<div class="form-group" align="center">
				<div class="col">
					<label class="col-form-label col-form-label-sm"  for="formGroupExampleInput">¿Con violencia?</label>
					<div class="clearfix"></div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							@if(isset($form['violencia1']))
							<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1" {{$form['violencia1']}} data-validation="required" required> Sí
							@else
							<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1" data-validation="required"> Sí
							@endif
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							@if(isset($form['violencia2']))
							<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0" {{$form['violencia2']}} data-validation="required" required> No
							@else
							<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0" data-validation="required"> No
							@endif
						</label>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	
		<div class="form-group">
			<div class="col-12">
				<div class="col">
					<label for="narracion" class="col-form-label-sm">Narración</label>
					@if(isset($form['narracion']))
						{{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'min20' ,'required']) }}
					@else
					{{-- {{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'min20' ,'required']) }} --}}
					
					{{ Form::textarea('narracion', null, ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'min20','required']) }}
					@endif
					{{-- <textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=>
						@if(isset($form['narracion']))
							{{$form['narracion']}}
						@endif
					</textarea> --}}
				</div>
			</div>
			<div class="boxtwo">
					<div class="row">
						
						<div class="col">   
							<div class="text-center">
								<br>
									<a href="http://fiscaliaveracruz.gob.mx/" title="" class="btn btn-primary">Cancelar</a>
									{!!Form::submit('Guardar',array('class' => 'btn btn-primary ', 'id'=>'cargando'))!!}
									{{-- <button id="prueba" type="button" class="btn btn-primary">prueba</button> --}}
								<br>
							
							</div>
						</div>
					</div>
				</div>
		</div>
		{{-- <div id="cargando" style="display:none;">
			<div class="text-center">
				<strong  style="color:#f5f5f5;">Iniciando sesión<strong>
			</div>
			<div class="sk-circle">
				<div class="sk-circle1 sk-child"></div>
				<div class="sk-circle2 sk-child"></div>
				<div class="sk-circle3 sk-child"></div>
				<div class="sk-circle4 sk-child"></div>
				<div class="sk-circle5 sk-child"></div>
				<div class="sk-circle6 sk-child"></div>
				<div class="sk-circle7 sk-child"></div>
				<div class="sk-circle8 sk-child"></div>
				<div class="sk-circle9 sk-child"></div>
				<div class="sk-circle10 sk-child"></div>
				<div class="sk-circle11 sk-child"></div>
				<div class="sk-circle12 sk-child"></div>
			</div>
		</div> --}}
	</div>
		


	</div>
 {!!Form::close()!!}
@endsection
@push('scripts')

	<script src="{{asset('js/preregistro.js')}}"></script> 
	<script src="{{ asset('js/curp.js') }}"></script> 
	<script src="{{ asset('js/rfcFisico.js') }}"></script>
	<script src="{{ asset('js/rfcMoral.js') }}"></script>
	<script src="{{ asset('js/jquery.disableAutoFill.min.js')}}" ></script>
	
	{{-- <script src="{{ asset('js/rfcMoral.js') }}"></script> --}}
	<script>
	$(document).ready(function(){
		$("#cargando").click(function(event){
			console.log("entro");

		});
	});

			
	// 		console.log("entro");
	// 			$("#pantalla").removeClass("loadPage");
	//  			$("#pantalla").removeClass("oculto");
	// 			 $("#pantalla").addClass("loadPage");
    // 	});
	// });
/////////////////////////////////////////////////////////////////LO DE ARRINA SI SIRVE


	// $(window).load(function(){
	// 			$("#loadPage").delay(5000).fadeOut("slow");
	// 		});

	// 	 $('#direccion-tab').addClass("active");//Agrego la clase active al tab actual
	// 	 $('.tab-pane').removeClass("active");
		

	// 		window.onload = function(){
	// 			var contenedor = document.getElementById('
	// 			loadPage');
	// 			contenedor.removeClass("loadPage");
	// 			contenedor.removeClass("oculto");
	// 			 contenedor.addClass("oculto");
	// 			}



		//   function cargando(){
				
		// 		var contenedor2 = document.getElementById('
		//  	loadPage');
		// 			contenedor2.removeClass("loadPage");
		// 	 	contenedor2.removeClass("oculto");
		// 	 	contenedor2.addClass("loadPage");
		// 	 }

			


	</script>
		
@endpush