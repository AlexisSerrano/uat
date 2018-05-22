<br>
<div class="card">
        <div class="card-header">
                <h6>Delitos</h6>
        </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Delito</th>
            <th>Forma de Comisión</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @if(count($delitos)==0)
                <tr><td colspan="5" class="text-center">Sin registros</td></tr>
            @else
                @foreach($delitos as $delito)
                    <tr id="{{$delito->id}}">
                        <td>{{ $delito->delito }}</td>
                        <td>{{ $delito->modalidad }}</td>
                        <td>{{ $delito->fecha }}</td>
                        <td>{{ $delito->hora }}</td>
                        <td>
                       {{-- <a href="{{ url('delito/'.$delito->id.'/eliminar')}}"  rel="tooltip" title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                       <i class="fa fa-edit"></i></a> --}} 

                            {{-- <button type="button" class="btn btn-secondary btn-simple btn-xs btn-modal-delito"  value={{$delito->id}} data-toggle="modal" data-target="#myModal-delito" id="open"> <i class="fa fa-edit"></i</button> --}}
                            <a data-delito-id={{$delito->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i></a></td>
                          
                            </td> 
                          
                    </tr>

                 
                @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>


{{-- APARTADO DE MODAL PARA EDITAR EL DELITO --}}
@csrf
<!-- Modal -->
{{-- <div class="modal fade" id="myModal-delito" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
               
                 <h3 class="modal-title" id="myModalLabel">EDITAR</h3>

            </div>
            <div class="modal-body">
                    <input class="form-control" type="text" id="idr" name="idr" hidden>
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
              
            
            </div>
        
    </div>
</div> --}}



@push('scripts')
   <script> 
        $(document).ready(function() {
            
            //  DenuncianteId = $(this).attr("data-denunciante-id");
            // alert("ok");
            $(".deleteBtn").on("click", function(e) {
            e.preventDefault()
                swal({
                    title: "Está seguro de eliminarlo?",
                    text: "No podrá recuperar este registro!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "si, eliminarlo!",
                    cancelButtonText: "No, cancelar!",
                    closeOnConfirm: true,
                    closeOnCancel: true },
                    function(isConfirm){
                if (isConfirm) {
                var id = $(".deleteBtn").data("delito-id");
                 window.location.href=route('delete.delito',{id:id});
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush
		
	{{-- {!! Form::close() !!} --}}