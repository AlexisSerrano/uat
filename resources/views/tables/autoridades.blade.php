<br>
<div class="card">
        <div class="card-header">
            <h6>Autoridades</h6>
        </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>Antigüedad</th>
            <th>Rango</th>
            <th>Horario laboral</th>
            <th>Documento</th>
            <th>Num. documento</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @if(count($autoridades)==0)
                <tr><td colspan="7" class="text-center">Sin registros</td></tr>
            @else
                @foreach($autoridades as $autoridad)
                    <tr>
                        <td>{{ $autoridad->nombres." ".$autoridad->primerAp." ".$autoridad->segundoAp }}</td>
                        <td>{{ $autoridad->antiguedad }}</td>
                        <td>{{ $autoridad->rango }}</td>
                        <td>{{ $autoridad->horarioLaboral }}</td>
                        <td>{{ $autoridad->docIdentificacion }}</td>
                        <td>{{ $autoridad->numDocIdentificacion }}</td>
                        <td>
            
                             {{-- <a href="{{ url('narracion/'.$autoridad->idVariablesPersona)}}"  rel="tooltip" title="Ampliar narracion" class="btn btn-secondary btn-simple btn-xs">
                            <i class="fa fa-edit"></i></a>   --}}
                            @if(is_null(session('terminada')))
                            <a data-autoridad-id={{$autoridad->idApariciones}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
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
                var id = $(this).data("autoridad-id");
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
              
                 window.location.href=route('delete.autoridad',id);
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush