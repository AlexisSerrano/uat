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
	a {
    color: #0e0f10;
	}
		
	</style>
@endsection
@section('title', 'Observaciones')
@section('content')


@include('fields.buttons-navegacion')
@include('fields.botonborrar')


{{-- <div class="card"> --}}
	@include('fields.errores')
	<div class="container" >
		<br>
		<div class="row">
			{{-- <div class="col 3">
				<table class="table table-striped table-bordered table-hover text-center">
					<thead class="thead-active">
						<tr>
							<th>Descripción de hechos</th>
						</tr>					
					</thead>
					<tbody>
						@forelse($narraciones as $narracion)
						@php
							$fecha = formato_fecha($narracion->created_at);
						@endphp
						<tr>
							@if($narracion->id==$ultimo->id)
							<th  id="{{$narracion->id}}" class="rownarraciones ultimo"><a class="text" href="#" >{{$fecha}}</a></th>
							@else
							<th  id="{{$narracion->id}}" class="rownarraciones"><a class="text" href="#" >{{$fecha}}</a></th>
							@endif
						</tr>
						
						@empty

						@endforelse
					</tbody>
				</table>
			</div> --}}
			<div class="col">
				{{-- <form action="{{url('addnarracion')}}" method="post" id="formNarracion" enctype="multipart/form-data"> --}}
				{!! Form::open(['route' => 'store.descripcionHechos', 'method' => 'POST', 'id'=>'form'])  !!}
	
					@csrf
					<div class="form-group" id="divnarracion">
						@isset($narracion)
							{{ Form::textarea('descripcionHechos', $narracion, ['class' => 'form-control']) }}
						@else	
							{{ Form::textarea('descripcionHechos', null, ['class' => 'form-control']) }}
						@endisset		
						{{-- <textarea name="narracion" id="areaNarracion" cols="30" rows="10" class="form-control form-control-sm"></textarea> --}}
						{{-- <div id="divText" style="display:none"></div> --}}
					</div>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				{!! Form::close() !!}
				{{-- </form> --}}
			

			</div>

		</div>
	</div>
{{-- </div> --}}
@endsection

@push('scritps')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{ asset('js/borrar.js') }}"></script>
<script>

$.validate({
  modules : 'file'
});

// $("#input-id").fileinput();
// $("#input-id").fileinput({'showUpload':false, 'previewFileType':'any'});

$("#input-id").fileinput({
       language:'es',
       theme: 'fa',
       browseClass: 'btn btn-info btn-block',
       showCaption: true,
       showRemove: true,
       showUpload: false,
       allowedFileExtensions: ['jpg','jpeg','png','gif','pdf']
   });


</script>
	
@endpush