
<br>
<div class="card">
        <div class="card-header">
            <h6>Víctima u ofendido</h6>
        </div>


<div class="table-respinsive">
    <table class="table table-hover">
        <thead>
            <th>Nombre</th>
            <th>RFC</th>
            <th>Teléfono</th>
            <th>Tipo de persona</th>
            <th>Tipo de solicitante</th>
            <th>Identidad resguardada</th>
            <th>Alias</th>
            <th>Opciones</th>
            {{--  <th>Opciones</th>  --}}
        </thead>
        <tbody>
            @if(count($denunciantes)==0)
                <tr><td colspan="8" class="text-center">Sin registros</td></tr>
            @else
                @foreach($denunciantes as $denunciante)
                <tr id="{{$denunciante->idApariciones}}">
                        <td>{{ $denunciante->nombres." ".$denunciante->primerAp." ".$denunciante->segundoAp }}</td>
                        <td>{{ $denunciante->rfc }}</td>
                        {{-- <td>{{ $denunciante->edad }}</td>
                        <td>{{ $denunciante->sexo }}</td> --}}
                        <td>{{ $denunciante->telefono }}</td>
                        @if($denunciante->esEmpresa==1)
                            <td>PERSONA MORAL</td>
                        @else
                            <td>PERSONA FÍSICA</td>
                        @endif
                        @if($denunciante->victima==1)
                            <td>VÍCTIMA</td>
                        @else
                            <td>OFENDIDO</td>
                        @endif
                        @if($denunciante->reguardarIdentidad!=NULL)
                            <td>SI</td>
                            <td>{{$denunciante->alias}}</td>
                        @else
                            <td style="text-align:center">NO</td>
                            <td></td>
                        @endif
                        <td> 
                            {{-- <a href="{{ url('narracion/'.$denunciante->idVariablesPersona)}}"  rel="tooltip" title="Ampliar narracion" class="btn btn-secondary btn-simple btn-xs">
                            <i class="fa fa-edit"></i></a>   --}}
                            <a href='{{url("agregar-denunciante/edit/{$denunciante->idVarPersona}/{$denunciante->esEmpresa}")}}' title="Editar Registro" class="btn btn-secondary btn-simple btn-xs">
                            <i class="fa fa-edit"></i>
                            </a>
                            @if(is_null(session('terminada')))
                            <a data-denunciante-id={{$denunciante->idApariciones}} title="Eliminar Registro" class="deleteBtn btn btn-secondary btn-simple btn-xs">
                                <i class="fa fa-times"></i>
                            </a>
                        	@endif
                        </td>
                      
                         {{-- <td><a href="{{ route('constancia.hechos', $denunciante->id) }}" class="btn btn-secondary text-right">Descargar constancia de hechos</a></td>  --}}
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
                var id = $(this).data("denunciante-id");
            e.preventDefault()
                swal({
                    // console.log(id);
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
                    window.location.href=route('delete.denunciante',id);
                }
        });
        });
        });
  </script>  
@endpush
