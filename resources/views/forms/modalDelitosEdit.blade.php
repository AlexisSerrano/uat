@extends('template.form')
{{-- @section('title', 'Editar delito') --}}
@section('content')
{{-- @include('fields.errores') --}}
{{-- @include('fields.buttons-navegacion') --}}


<head>
    <meta charset="utf-8">
    <meta name="_token" content="{{csrf_token()}}" />
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/css/bootstrap.css" rel="stylesheet">  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-beta.3/js/bootstrap.min.js"></script> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.0/jquery.js"></script> 

</head>



{{-- <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#modal-edit-customers{{$delito->id}}" id="modal-edit">Open Modal</button>  --}}
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" id="open">Open Modal</button>
{!! Form::open(['route' => ['actualizar.delito',$TipifDelito->id] ,'method' => 'put'] ) !!}
@csrf
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               
                 {{-- <h3 class="modal-title" id="myModalLabel">EDITAR</h3> --}}

            </div>
            <div class="modal-body">
                <div role="tabpanel">
                    
                        <div role="tabpanel" class="tab-pane active" id="delito">DELITO</div>
                        @include('fields.edit.delitoedit')
                        <div role="tabpanel" class="tab-pane active" id="delito">DIRECCION</div>
                        @include('fields.edit.direccionesedit')
                        <div role="tabpanel" class="tab-pane active" id="delito">LUGAR DE HECHOS</div>
                        @include('fields.edit.lugar-hechosedit')
                       
                    </div>

                  
                  
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary save">Save changes</button>
                {{-- <button  class="btn btn-success" id="ajaxSubmit">Guardar cambios</button> --}}
            
            </div>
        
    </div>
</div>

		
	{!! Form::close() !!}
	{{-- <div class="boxtwo">
		@include('tables.delitos')
	</div> --}}
@endsection

@push('scripts')


<script>
    $(document).ready(function(){
        var TipifDelito_id = $(this).attr("id");
       jQuery('#ajaxSubmit').click(function(e){
          e.preventDefault();
          $.ajaxSetup({
             headers: {
                 'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
             }
         });
          jQuery.ajax({
             url: "{{'actualizar.delito'}}",
             method: 'put',
             data: {
                idDelito: jQuery('#idDelito').val(),
                formaComision: jQuery('#formaComision').val(),
                fecha: jQuery('#fecha').val(),
                hora: jQuery('#hora').val(),
                conViolencia: jQuery('#conViolencia').val(),
                idEstado: jQuery('#idEstado').val(),
                idMunicipio: jQuery('#idMunicipio').val(),
                idLocalidad: jQuery('#idLocalidad').val(),
                cp: jQuery('#cp').val(),
                idColonia: jQuery('#idColonia').val(),
                calle: jQuery('#calle').val(),
                numExterno: jQuery('#numExterno').val(),
                numInterno: jQuery('#numInterno').val(),
                entreCalle: jQuery('#entreCalle').val(),
                yCalle: jQuery('#yCalle').val(),
                calleTrasera: jQuery('#calleTrasera').val(),
                idZona: jQuery('#idZona').val(),
                idLugar: jQuery('#idLugar').val(),
                puntoReferencia: jQuery('#puntoReferencia').val(),
               

             },
             success: function(result){
                 if(result.errors)
                 {
                     jQuery('.alert-danger').html('');

                     jQuery.each(result.errors, function(key, value){
                         jQuery('.alert-danger').show();
                         jQuery('.alert-danger').append('<li>'+value+'</li>');
                     });
                 }
                 else
                 {
                     jQuery('.alert-danger').hide();
                     $('#open').hide();
                     $('#myModal').modal('hide');
                 }
             }});
          });
       });
 </script>
@endpush