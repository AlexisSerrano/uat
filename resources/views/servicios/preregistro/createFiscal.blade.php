
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
	<div class="card" id="datosPer">
		<div class="card-header">
		<div class="boxtwo">
			<div class="form-group" align="center">
				<div class="col">
					<label class="col-form-label col-form-label-sm"  for="formGroupExampleInput">¿Con violencia?</label>
					<div class="clearfix"></div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1"> Sí
						</label>
					</div>
					<div class="form-check form-check-inline">
						<label class="form-check-label col-form-label col-form-label-sm">
							<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0"> No
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
					<textarea name="narracion" id="narracion" cols="30" rows="10" class="form-control form-control-sm" required=></textarea>
				</div>
			</div>
		</div>

		<div class="boxtwo">
			<div class="row">
				
				<div class="col">   
					<div class="text-right">
							<a href="http://fiscaliaveracruz.gob.mx/" title="" class="btn  button button1">Cancelar</a>
							{!!Form::submit('Guardar',array('class' => 'btn  button button1'))!!}
					
					</div>
				</div>
			</div>
		</div>


	</div>
{!!Form::close()!!}
@endsection

@section('css')
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/css/tempusdominus-bootstrap-4.min.css" />
@endsection

@push('scripts')
<script src="{{asset('js/preregistro.js')}}"></script> 


	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.0-alpha14/js/tempusdominus-bootstrap-4.min.js"></script>	
	<script src="{{ asset('js/validation.js')}}"></script>
	<script>
		$(function () {
			$('#fechanac').datetimepicker({
				format: 'YYYY-MM-DD',
            	minDate: moment().subtract(150, 'years').format('YYYY-MM-DD'),
            	maxDate: moment().subtract(18, 'years').format('YYYY-MM-DD')
			});
		});

		$("#fechanac").on("change.datetimepicker", function (e) {
			$('#edad').val(moment().diff(e.date,'years'));
		});

		$( "#edad" ).change(function() {
			var anios = $('#edad').val();
			$('#fechanac').datetimepicker('date', moment().subtract(anios, 'years').format('YYYY-MM-DD'));
		});


	</script>
@endpush