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
@section('title', 'Descripción de los hechos')
@section('content')


@include('fields.buttons-navegacion')

{{-- <div class="card"> --}}
	@include('fields.errores')
	<br>
	<div class="container" >
		<br>
		<div class="row">
			<div class="col 3">
				<table class="table table-striped table-bordered table-hover text-center">
					<thead class="thead-active">
						<tr>
							<th>Descripción de hechos</th>
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
							<th id="{{$narracion->id}}"><a href='{{url("mostrardoc/$narracion->id")}}' target="_blank">{{$fecha}}</a></th>
							<th><span><i class="fa fa-file-word-o" aria-hidden="true"></i></span></th>
								
							@endif
						</tr>
						
						@empty

                        @endforelse
                        <tr>   </tr>
					</tbody>
				</table>
			</div>
			<div class="col-9">
				<form action="{{route('new.narracion', $id)}}" method="post" id="formNarracion" enctype="multipart/form-data">
					@csrf
					<div class="form-group" id="divnarracion">		
						<textarea name="narracion" id="areaNarracion" cols="30" rows="10" class="form-control form-control-sm">@if($ultimo != null){{ $ultimo->narracion}} @endif</textarea>
                        <div id="divText" style="display:none"></div>
                        <input type="hidden" name="id" value="{{$id}}"
					</div>
                        <input id="input-id" type="file" class="file" name="file"  data-preview-file-type="text">
               
					<br>
					<div class="form-group text-right">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			

			</div>

		</div>
	</div>
{{-- </div> --}}
@endsection

@push('scritps')
<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
<script src="{{ asset('public/js/funciones.js') }}"></script>
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