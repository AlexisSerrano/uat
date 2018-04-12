@extends('template.form')
@section('css')
	<style>
	#divText{
		width: 100%;
		height: 220px;
		border: 1px solid #c8cac8;
		padding: 5px;
		background-color: #eef5ee;
	}
	</style>
@endsection
@section('content')


@php
	if (count($denunciantes)==0){
		$registroDenunciante='btn btn-secondary';
	}else{
		$registroDenunciante='btn btn-success';
	}
	if (!isset($registroDenunciado)){
		$registroDenunciado='btn btn-secondary';
	}
	if (!isset($registroAbogado)){
		$registroAbogado='btn btn-secondary';
	}
	if (!isset($registroAutoridad)){
		$registroAutoridad='btn btn-secondary';
	}
	if (!isset($registroAcusaciones)){
		$registroAcusaciones='btn btn-secondary';
	}
	if (!isset($registroDelitos)){
		$registroDelitos='btn btn-secondary';
	}
	if (!isset($registroDefenza)){
		$registroDefenza='btn btn-secondary';
	}
	if (!isset($registroDescripcion)){
		$registroDescripcion='btn btn-secondary';
	}
	
	@endphp
	<br><br>
<div class="btn-group col">
	<div class="btn-group" role="group" aria-label="Basic example">
		<button type="button" class="btn btn-secondary" href="#menu-toggle" id="menu-toggle"><i class="fa fa-bars"></i></button>   
	</div>
	<a href="{{route('new.denunciante')}}" class="{{$registroDenunciante}} form-control">Denunciante</a>
	<a  class="{{$registroDenunciado}} form-control">Denunciado</a>
	<a  class="{{$registroAbogado}} form-control">Abogado</a>
	<a  class="{{$registroAutoridad}} form-control">Autoridad</a>
	<a  class="{{$registroDelitos}} form-control">Delitos</a>
	<a  class="{{$registroAcusaciones}} form-control">Acusaciones</a>
	<a  class="{{$registroDefenza}} form-control">Defensa</a>
	<a href="{{route('narracion')}}" class="{{$registroDescripcion}} form-control">Descripcion de hechos</a>
</div>

<div class="card">
    <div class="card-header" style="text-align: center;">
        <p class="lead">Narración <span><i class="fa fa-comment"></i></span></p>
	 </div>
	 @if ($errors->any())
		<div class="alert alert-danger">
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
	<br>
	<div class="container" >
		<div class="row">
			<div class="col 3">
				<table class="table table-striped table-bordered table-hover text-center">
					<thead class="thead-active">
						<tr>
							<th>Narraciones</th>
							<th>Tipo</th>
						</tr>
						
							
						
					</thead>
					<tbody >
						@forelse($narraciones as $narracion)
						@php
						$fecha = formato_fecha($narracion->created_at);
						@endphp
						<tr>
							@if($narracion->tipo==0)
								@if($narracion->id==$ultimo->id)
								<th  id="{{$narracion->id}}" class="rownarraciones ultimo"><a href="#" >{{$fecha}}</a></th>
								<th><span><i class="fa fa-pencil-square" aria-hidden="true"></i></span></th>
								@else
								<th  id="{{$narracion->id}}" class="rownarraciones"><a href="#" >{{$fecha}}</a></th>
								<th><span><i class="fa fa-pencil-square" aria-hidden="true"></i></span></th>
								@endif	
							@else
							<th id="{{$narracion->id}}"><a href="mostrardoc/{{$narracion->id}}" target="_blank">{{$fecha}}</a></th>
							<th><span><i class="fa fa-file-word-o" aria-hidden="true"></i></span></th>
								
							@endif
						</tr>
						
						@empty

						@endforelse
					</tbody>
				</table>
			</div>
			<div class="col-9">
				<form action="{{url('addnarracion')}}" method="post" id="formNarracion" enctype="multipart/form-data">
					@csrf
					<div class="form-group" id="divnarracion">		
						<textarea name="narracion" id="areaNarracion" cols="30" rows="10" class="form-control form-control-sm">@if($ultimo != null){{ $ultimo->narracion}} @endif</textarea>
						<div id="divText" style="display:none"></div>
					</div>
					<div class="input-group mb-3">
						<div class="input-group-prepend">
							<span class="input-group-text">Subir archivo</span>
						</div>
						<div class="custom-file">
							<input type="file" class="custom-file-input" id="inputGroupFile01" name="file">
							<label class="custom-file-label" for="inputGroupFile01" value={{'input[type =>file]'}}></label>
						</div>
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			

			</div>

		</div>
	</div>
</div>
@endsection

@push('scritps')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script>


	$(document).ready(function(){
        $('input[type="file"]').change(function(e){
            var fileName = e.target.files[0].name;
            alert('The file "' + fileName +  '" has been selected.');
        });
    });
</script>
	
@endpush