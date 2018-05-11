@extends('template.form')

@section('title', 'Agregar Defensa')
@section('content')
	@include('fields.buttons-navegacion')
	@include('fields.botonborrar')
	<br>
    
	{!! Form::open(['route' => 'store.defensa', 'method' => 'POST', 'id'=>'form'])  !!}
	{{-- @include('forms.idcarpeta') --}}
	<div class="row no-gutters">
		<div class="col-12">
			<div class="boxtwo">
				@include('fields.defensa')
				{{-- botones --}}
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
	{{-- @include('forms.buttons') --}}
	{!! Form::close() !!}
	<div class="boxtwo">
		@include('tables.defensas')
	</div>
@endsection

@push('scripts')
<script src="{{ asset('js/borrar.js') }}"></script>
	<script>
	
		$("#idAbogado").change(function(event){
			if(event.target.value!=""){
				var idCarpeta = $("input[type=hidden][name=idCarpeta]").val();
				$.get("../involucrados/"+idCarpeta+"/"+event.target.value+"", function(response, idCarpeta){
					$("#idInvolucrado").empty();
					$("#idInvolucrado").append("<option value=''>Seleccione un involucrado</option>");
					for(i=0; i<response.length; i++){
						$("#idInvolucrado").append("<option value='"+response[i].id+"'> "+response[i].nombres+"</option>");
					}
				});
			}
		});

	</script>
@endpush