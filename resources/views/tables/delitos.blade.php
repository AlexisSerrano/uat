

<div class="table">
    <table class="table table-striped">
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
                    <tr>
                        <td>{{ $delito->delito }}</td>
                        <td>{{ $delito->modalidad }}</td>
                        <td>{{ $delito->fecha }}</td>
                        <td>{{ $delito->hora }}</td>
                        <td>
                       <a href="{{ url('delito/'.$delito->id.'/eliminar')}}"  rel="tooltip" title="Eliminar Registro" class="btn btn-secondary btn-simple btn-xs">
                        <i class="fa fa-times"></i></a>
                            <a href="{{ url('delito/'.$delito->id.'/editar')}}"  rel="tooltip" title="Editar Registro" class="btn btn-secondary btn-simple btn-xs">
                            <i class="fa fa-edit"></i></a>

                            
                          
                            </td> 
                          
                    </tr>

                    {{-- <button 
                    type="button" 
                    class="btn btn-primary" 
                    data-toggle="modal"
                    data-id="{{ $delito->id }}"
                   
                    data-target="#myModal">
                   Add to Favorites
                 </button> --}}
                @endforeach
            @endif
        </tbody>
    </table>
</div>

