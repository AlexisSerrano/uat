<div class="card">
        <div class="card-header">
            <h6>Acusaciones</h6>
        </div>
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre de la víctima u ofendido</th>
            <th>Delito</th>
            <th>Nombre del investigado</th>
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
                            @if(is_null(session('terminada')))
                                <a data-acusacion-id={{$acusacion->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                    <i class="fa fa-times"></i>
                                </a>
                            @endif
                            <a href="{{route('acuerdo-documento',$acusacion->id)}}" title="Imprimir acuerdo inicial" class=" btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-print"></i>
                            </a>
                        </td>
                                    {{-- </td>  --}}
                    {{-- <td><a href="{{ route('formato.denuncia', $acusacion->id) }}" class="btn btn-secondary text-right">Descargar formato de Denuncia</a></td> --}}
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
                var id = $(this).data("acusacion-id");
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
              
                 window.location.href=route('delete.acusacion',id);
                //  window.location.href=route("agregar-denunciado/'.$denunciante->id.'/eliminar");
                }
        });
        });
        });
  </script>  
@endpush