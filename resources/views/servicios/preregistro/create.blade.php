
@extends('template.form2')

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
							<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1" {{$form['violencia1']}}> Sí
							@else
							<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1"> Sí
							@endif
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							@if(isset($form['violencia2']))
							<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0" {{$form['violencia2']}}> No
							@else
							<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0"> No
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
									{!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}
		
								<br>
							
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
	
	
	{{-- <script src="{{ asset('js/rfcMoral.js') }}"></script> --}}
	<script>	

		</script>
	
@endpush