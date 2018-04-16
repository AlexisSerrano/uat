@php
	if (count($denunciantes)==0){
		$registroDenunciante='btn btn-secondary';
	}else{
		$registroDenunciante='btn btn-success';
	}
	if (count($denunciados)==0){
		$registroDenunciado='btn btn-secondary';
	}else{
		$registroDenunciado='btn btn-success';
	}
	if (!isset($registroAbogado)){
		$registroAbogado='btn btn-secondary';
	}
	if (!isset($registroAutoridad)){
		$registroAutoridad='btn btn-secondary';
	}
	if (count($acusaciones)==0){
		$registroAcusaciones='btn btn-secondary';
	}else{
		$registroAcusaciones='btn btn-success';
	}
	if (count($delitos)==0){
		$registroDelitos='btn btn-secondary';
	}else{
		$registroDelitos='btn btn-success';
	}
	if (!isset($registroDefenza)){
		$registroDefenza='btn btn-secondary';
	}
	if (!isset($registroDescripcion)){
		$registroDescripcion='btn btn-secondary';
    }
    if (!isset($medidasProteccion)){
		$medidasProteccion='btn btn-secondary';
	}
	
	@endphp
<div class="btn-group col">
	<a href="{{route('new.denunciante')}}" class="{{$registroDenunciante}} form-control">Denunciante</a>
	<a href="{{route('new.denunciado')}}" class="{{$registroDenunciado}} form-control">Denunciado</a>
	{{-- <a  class="{{$registroAbogado}} form-control">Abogado</a> --}}
	{{-- <a  class="{{$registroAutoridad}} form-control">Autoridad</a> --}}
	<a href="{{route('new.delito')}}" class="{{$registroDelitos}} form-control">Delitos</a>
	<a href="{{route('new.acusacion')}}" class="{{$registroAcusaciones}} form-control">Acusaciones</a>
	{{-- <a  class="{{$registroDefenza}} form-control">Defensa</a> --}}
    <a href="{{route('narracion')}}" class="{{$registroDescripcion}} form-control">Descripción de hechos</a>
    <a href="{{url('medidas')}}" class="{{$medidasProteccion}} form-control">Medidas de protección</a>
</div>
 