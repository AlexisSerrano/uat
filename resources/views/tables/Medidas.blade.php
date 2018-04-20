<h6>Medidas</h6>
<div class="table">
    <table class="table table-striped">
        <thead>
                <th width="25%">Tipo de medida</th>
                <th>Fecha inicio</th>
                <th>Fecha final</th>
                <th>Ejecuta</th>
                <th>Persona</th>
                <th>Observaciones</th>
                <th>Eliminar</th>                             
        </thead>
        <tbody>
            @if(count($TablaProvidencia)==0)
                <tr><td colspan="7" class="text-center">Sin registros</td></tr>
            @else
                @foreach($TablaProvidencia as $provide)
                    <tr>
                        <td>{{ $provide->providencia}}</td>
                        <td>{{ $provide->fechainicio }}</td>  
                        <td>{{ $provide->fechafin }}</td>  
                        <td>{{ $provide->ejecutor }}</td>  
                        <td>{{ $provide->persona }}</td>  
                        <td>{{ $provide->observacion }}</td>  
                        <td>
                                <a href="{{ url('agregar-medidas/'.$provide->id.'/eliminar')}}" type="button" rel="tooltip" title="Eliminar Registro" class="btn btn-success btn-simple btn-xs">
                                <i class="fa fa-edit"></i></td>
                                </td>                           
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>
</div>

