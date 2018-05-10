<h6>Autoridades</h6>
<div class="table">
    <table class="table table-striped">
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
                        {{-- <a href="{{ url('agregar-autoridad/'.$autoridad->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i> --}}
                        <a data-autoridad-id={{$autoridad->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i></a></td>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

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
                var id = $(".deleteBtn").data("autoridad-id");
                 window.location.href=route('delete.autoridad',{id:id});
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush