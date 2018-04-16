@extends('template.form')

@section('title', 'Agregar Acusación')
@section('content')
	@include('fields.buttons-navegacion')
    {!! Form::open(['route' => 'store.acusacion', 'method' => 'POST'])  !!}
	<div class="row no-gutters">
		<div class="col-12">
			<div class="boxtwo">
				@include('fields.acusacion')
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
	{!! Form::close() !!}
	<div class="boxtwo">
		@include('tables.acusaciones')
	</div>
@endsection