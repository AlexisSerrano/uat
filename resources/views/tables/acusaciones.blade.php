<h6>Acusaciones</h6>
<div class="table">
    <table class="table table-striped">
        <thead>
            <th>Nombre denunciante</th>
            <th>Delito</th>
            <th>Nombre denunciado</th>
            <th>Opciones</th>  
            {{-- <th>Opciones</th> --}}
        </thead>
        <tbody>
            @if(count($acusaciones)==0)
                <tr><td colspan="4  " class="text-center">Sin registros</td></tr>
            @else
                @foreach($acusaciones as $acusacion)
                    <tr>
                        <td>{{ $acusacion->nombres." ".$acusacion->primerAp." ".$acusacion->segundoAp }}</td>
                        <td>{{ $acusacion->delito }}</td>
                        <td>{{ $acusacion->nombres2." ".$acusacion->primerAp2." ".$acusacion->segundoAp2 }}</td>
                        <td>
                                {{-- <a href="{{ url('agregar-acusacion/'.$acusacion->id.'/eliminar')}}"  title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i></a> --}}
                                <a data-acusacion-id={{$acusacion->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                        <i class="fa fa-times"></i></a></td>
                                </td> 
                        {{-- <td><a href="{{ route('formato.denuncia', $acusacion->id) }}" class="btn btn-secondary text-right">Descargar formato de Denuncia</a></td> --}}
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
                var id = $(".deleteBtn").data("acusacion-id");
                 window.location.href=route('delete.acusacion',{id:id});
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush