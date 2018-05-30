<div class="card">
    <div class="card-header">
        <strong>
            <h6>Abogados</h6>
            </strong>
    </div>


<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Cédula</th>
            <th>Sector</th>
            <th>Tipo</th> 
            <th>Opciones</th>                               
        </thead>
        <tbody>
            @if(count($abogados)==0)
                <tr><td colspan="5" class="text-center">Sin registros</td></tr>
            @else
                @foreach($abogados as $abogado)
                    <tr>
                        <td>{{ $abogado->nombres." ".$abogado->primerAp." ".$abogado->segundoAp }}</td>
                        <td>{{ $abogado->cedulaProf }}</td>
                        <td>{{ $abogado->sector }}</td>
                        <td>{{ $abogado->tipo }}</td>  
                        {{-- <a href="{{ url('agregar-abogado/'.$abogado->id.'/eliminar')}}" title="Eliminar Registro" class="btn btn-secondary ">
                        <i class="fa fa-times"></i></td>  --}}
                        <td> 
	                        @if(is_null(session('terminada')))
                            <a data-abogado-id={{$abogado->id}} title="Eliminar abogado" class="deleteBtn btn btn-secondary btn-simple btn-xs">
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
            
            //  DenuncianteId = $(this).attr("data-denunciante-id");
            // alert("ok");
            $(".deleteBtn").on("click", function(e) {
                var id = $(this).data("abogado-id");
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
              
                 window.location.href=route('delete.abogado',id);
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush