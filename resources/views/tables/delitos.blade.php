<h6>Delitos</h6>
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
                        <a href="{{ url('delito/'.$delito->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i></td>
                        </td>  
                        <td>
                            <a href="{{ url('delito/'.$delito->id.'/editar')}}" type="button" rel="tooltip" title="Editar Registro" class="btn btn-success btn-simple btn-xs">
                            <i class="fa fa-edit"></i></td>
                            </td>  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>