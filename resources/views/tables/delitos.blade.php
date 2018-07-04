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
                        <td>{{ $delito->delito.' '.$delito->desagregacion1.' '.$delito->desagregacion2 }}</td>
                        <td>{{ $delito->modalidad }}</td>
                        <td>{{ $delito->fecha }}</td>
                        <td>{{ $delito->hora }}</td>
                        <td>
                       {{-- <a href="{{ url('delito/'.$delito->id.'/eliminar')}}"  rel="tooltip" title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                       <i class="fa fa-edit"></i></a> --}} 
                          
                            @if(is_null(session('terminada')))
                            <button type="button" class="btn btn-secondary btn-simple btn-xs btn-modal-delito"  value={{$delito->id}}  > <i class="fa fa-edit"></i></button>
                            <a data-delito-id={{$delito->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i>
                            </a>
                        	@endif
                        </td>
                           
                          
                    </tr>

                 
                @endforeach
            @endif
        </tbody>
    </table>
</div>
</div>


{{-- APARTADO DE MODAL PARA EDITAR EL DELITO --}}
<div id="myModal1" class="modal fade" role="dialog">
   
        <div class="modal-dialog modal-lg">
          <!-- Modal content-->
          <div class="modal-content"> 
            <!--Cabecera del modal-->
            <div class="modal-header">
                <h4 class="modal-title">Actualizar</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> 

            <form class="modalForm" id="mediformu">

            <div class="modal-body">
                    <input class="form-control" type="text" id="idr" name="idr" hidden>
                <div role="tabpanel">
                    
                         <div role="tabpanel" class="tab-pane active" id="delito"></div>
                        @include('fields.edit.delitoedit')
                        <div role="tabpanel" class="tab-pane active" id="delito"></div>
                      @include('fields.edit.direccionesedit') 
                      <div role="tabpanel" class="tab-pane active" id="delito"></div>
                        @include('fields.edit.lugar-hechosedit')
                       
                    </div>

                  
                  
            <div class="modal-footer">
              <button type="button" id="guardar" class="btn btn-success btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Editar</button>
                </div>
      
             </form>
             <!-- FORMULARIO - END -->
      
          </div>
        </div>
   
    </div>


@push('scripts')
<script src="{{asset('js/ajaxDelito.js')}}"></script>
   <script> 
        $(document).ready(function() {
            
            //  DenuncianteId = $(this).attr("data-denunciante-id");
            // alert("ok");
            $(".deleteBtn").on("click", function(e) {
                var id = $(this).data("delito-id");
            e.preventDefault()
                swal({
                    title: "¿Está seguro de eliminarlo?",
                    text: "!No podrá recuperar este registro!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, ¡Eliminarlo!",
                    cancelButtonText: "No, ¡Cancelar!",
                    closeOnConfirm: true,
                    closeOnCancel: true },
                    function(isConfirm){
                if (isConfirm) {
                
                 window.location.href=route('delete.delito',id);
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script> 
  
@endpush
		
	{{-- {!! Form::close() !!} --}}