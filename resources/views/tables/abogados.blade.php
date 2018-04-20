<h6>Abogados</h6>
<div class="table">
    <table class="table table-striped">
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
                        <td>
                        <a href="{{ url('agregar-abogado/'.$abogado->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                        <i class="fa fa-edit"></i></td>
                        </td>                                  
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>