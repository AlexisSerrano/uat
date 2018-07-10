
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
	/* .loadPage p{
		display: block;
		
		font-size: 30px;
		margin: auto;
			}
	 */
		.oculto{
			display: none;
		}
		.logo{
		position:fixed;
		}
		p {
		font-family: "Arial", serif;
		}
		
	</style>
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

	

{!!Form::open(['route' => 'preregistro.store', 'id'=>'form.registro'])!!}

<br>
	<p class="lead" align="center">
		PRE-REGISTRO
	</p>
	<div id="pantalla" class="oculto" >
		<div style="font-size: 30px;text-align: center;margin-top:300px; display:block;margin-bottom: auto;">
			<p>
				<img width="100px" height="100px" src="{{asset('img/Cargando.gif')}}" > 
				<br>
				Espere un momento
			</p>
		</div>	
	</div>
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
		<div class="form-group">
			<div class="col-12">
				<div class="col" id="divNarracion">
					<label for="narracion" class="col-form-label-sm">Narración</label>
					{{-- @if(isset($form['narracion']))
						{{ Form::textarea('narracion', $form['narracion'], ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'20-5000' ,'required']) }}
					@else --}}
					{{ Form::textarea('narracion', old('narracion'), ['class' => 'form-control form-control-sm', 'size' => '30x10', 'data-validation'=>'length', 'data-validation-length'=>'20-5000','required']) }}
					{{-- @endif --}}
				
				</div>
			</div>
			<div class="boxtwo">
				<div class="row">
					
					<div class="col">   
						<div class="text-center">
							<br>
								<a href="http://fiscaliaveracruz.gob.mx/" title="" class="btn btn-primary">Cancelar</a>
							
								{!!Form::submit('Guardar',array('class' => 'btn btn-primary ', 'id'=>'cargando'))!!}
								{{-- {!!Form::submit('Prueba',array('class' => 'btn btn-primary ', 'id'=>'prueba'))!!} --}}
								{{-- <button id="prueba" type="button" class="btn btn-primary">prueba</button> --}}
							<br>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		


	</div>
 {!!Form::close()!!}
@endsection
@push('scripts')

	<script src="{{asset('js/preregistro.js')}}"></script> 
	<script src="{{ asset('js/curp.js') }}"></script> 
	<script src="{{ asset('js/rfcFisico.js') }}"></script>
	<script src="{{ asset('js/rfcMoral.js') }}"></script>
	<script src="{{ asset('js/validar-pre.js') }}"></script>
	<script src="{{ asset('js/jquery.disableAutoFill.min.js')}}" ></script>
	
	{{-- <script src="{{ asset('js/rfcMoral.js') }}"></script> --}}
	<script>
	</script>
		
@endpush