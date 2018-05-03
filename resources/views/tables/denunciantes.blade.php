<br>
<h5>Denunciantes</h5>


<div class="table">
    <table class="table table-striped">
        <thead>
            <th>Nombre</th>
            <th>RFC</th>
            {{-- <th>Edad</th>
            <th>Sexo</th> --}}
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
                <tr><td colspan="7" class="text-center">Sin registros</td></tr>
            @else
                @foreach($denunciantes as $denunciante)
                    <tr>
                        <td>{{ $denunciante->nombres." ".$denunciante->primerAp." ".$denunciante->segundoAp }}</td>
                        <td>{{ $denunciante->rfc }}</td>
                        {{-- <td>{{ $denunciante->edad }}</td>
                        <td>{{ $denunciante->sexo }}</td> --}}
                        <td>{{ $denunciante->telefono }}</td>
                        @if($denunciante->esEmpresa==1)
                            <td>Persona Moral</td>
                        @else
                            <td>Persona Fisica</td>
                        @endif
                        @if($denunciante->victima==1)
                            <td>Victima</td>
                        @else
                            <td>Ofendido</td>
                        @endif
                        @if($denunciante->reguardarIdentidad!=NULL)
                            <td>Si</td>
                            <td>$denunciante->reguardarIdentidad</td>
                        @else
                            <td colspan="2" style="text-align:center">No</td>
                        @endif
              
                       <td> <a href="{{ url('agregar-denunciante/'.$denunciante->id.'/eliminar')}}" title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                        <i class="fa fa-times"></i></td>
                        {{--  <td><a href="{{ route('constancia.hechos', $denunciante->id) }}" class="btn btn-secondary text-right">Descargar constancia de hechos</a></td>  --}}
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>