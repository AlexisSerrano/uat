<div class="card">
        <div class="card-header">
            <h6>Investigado</h6>
        </div>

<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Edad</th>
            <th>Sexo</th>
            <th>Teléfono</th>
            <th>Persona moral</th>
            <th>Opciones</th>
        </thead>
        <tbody>
            @if(count($denunciados)==0)
                <tr><td colspan="7" class="text-center">Sin registros</td></tr>
            @else
                @foreach($denunciados as $denunciado)
                    <tr>
                    @if(is_null($denunciado->nombres))
                        <td>{{ $denunciado->alias }}</td>
                    @else  
                        <td>{{ $denunciado->nombres." ".$denunciado->primerAp." ".$denunciado->segundoAp }}</td>
                    @endif
                        <td>{{ $denunciado->rfc }}</td>
                        <td>{{ $denunciado->edad }}</td>
                        <td>{{ $denunciado->sexo }}</td>
                        <td>{{ $denunciado->telefono }}</td>
                        @if($denunciado->esEmpresa==1)
                            <td>SI</td>
                        @else
                            <td>NO</td>
                        @endif  
                    <td>
                        {{-- <a href="{{ url('narracion/'.$denunciado->idVariablesPersona)}}"  rel="tooltip" title="Ampliar narracion" class="btn btn-secondary btn-simple btn-xs">
                            <i class="fa fa-edit"></i></a>   --}}

                         
                            @if(is_null(session('terminada')))
                            <a data-denunciado-id={{$denunciado->id}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
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
                var id = $(this).data("denunciado-id");
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
                
                
                 window.location.href=route('delete.denunciado',id);
               
               //window.location.href ="{{ url('agregar-denunciado')}}/"+id+"/eliminar";
                }
        });
        });
        });
  </script>  
@endpush