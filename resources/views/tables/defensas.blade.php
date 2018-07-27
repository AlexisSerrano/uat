<br>
<div class="card">
        <div class="card-header">
            <h6>Defensas</h6>
        </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Defiende a</th>                                
        </thead>
        <tbody>
            @if(count($defensas)==0)
                <tr><td colspan="2" class="text-center">Sin registros</td></tr>
            @else
                @foreach($defensas as $defensa)
                    <tr>
                        <td>{{ $defensa->nombre_abogado }}</td>  
                        <td>{{ $defensa->nombre_involucrado }}</td>                        
                        <td> 
	                        @if(is_null(session('terminada')))
                            <a data-defensa-id={{$defensa->idAparicion}} title="Eliminar defensa" class="deleteBtn btn btn-secondary btn-simple btn-xs">
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
@push('scripts')
   <script> 
        $(document).ready(function() {
            $(".deleteBtn").on("click", function(e) {
                var id = $(this).data("defensa-id");
            e.preventDefault()
                swal({
                    title: "¿Está seguro de eliminarlo?",
                    text: "¡No podrá recuperar este registro!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, ¡Eliminarlo!",
                    cancelButtonText: "No, ¡Cancelar!",
                    closeOnConfirm: true,
                    closeOnCancel: true },
                    function(isConfirm){
                if (isConfirm) {
              
                 window.location.href=route('delete.defensa',id);
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush