
@extends('template.form')
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

	
	
{!!Form::open(['route' => 'fiscal'])!!}
	<br>
	<p class="lead" align="center">
		PRE-REGISTRO
	</p>
	<div>
		@include('servicios.preregistro.fields.tipo-persona')
	</div>
	<div class="card" id="datosPer">
		<div class="card-header">
			<p class="lead" align="center">
				Datos personales
			</p>
		</div>
		<div id="collapsePersonales1" class="collapse show boxcollapse" >
			<div class="boxtwo">
				<div class="col">
					@include('servicios.preregistro.fields.datos-personales')
				</div>
			</div>
		</div>

		<div id="collapsePersonales2" class="collapse show boxcollapse" >
			<div class="boxtwo">
				<div class="col">
					@include('servicios.preregistro.fields.datos-empresa')
				</div>
			</div>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-12">
			<div class="col" id="divNarracion">
				<label for="narracion" class="col-form-label-sm">Narración</label>
				<textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" data-validation="length" data-validation-length= "20-5000">{{old('narracion')}}</textarea>
			</div>
		</div>
	</div>

	<div class="boxtwo">
		<div class="row">
			<div class="col">   
				<div class="text-left">
					<a href="https://consultas.curp.gob.mx/CurpSP/inicio2_2.jsp" title="" target="_blank"  class="btn btn-secondary"><i class="fa fa-search"></i>CURP</a>
				</div>
			</div>
	
			<div class="col">   
				<div class="text-right">
					<!--<a href="http://fiscaliaveracruz.gob.mx/" title="" class="btn btn-secondary">Cancelar</a>-->
					<a href="{{route('predenuncias.index')}}" title="" class="btn btn-secondary">Cancelar</a>
					{!!Form::submit('Guardar',array('class' => 'btn btn-primary'))!!}				
				</div>
			</div>
		</div>
	</div>

{!!Form::close()!!}
@endsection

@section('css')
@endsection

@push('scripts')
<script src="{{asset('js/preregistro.js')}}"></script> 
<script src="{{ asset('js/rfcFisico.js') }}"></script>
<script src="{{ asset('js/rfcMoral.js') }}"></script>
<script src="{{ asset('js/curp.js') }}"></script>
@endpush