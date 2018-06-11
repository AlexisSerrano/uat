<br>
<div class="card">
        <div class="card-header">
            <h6>Vehiculos</h6>
        </div>
<div class="table-responsive">
   
    <table class="table table-hover">
        <thead>
            <th>Delito</th>
            <th>Marca</th>
            <th>Modelo</th>
            <th>Placas</th> 
            <th>Tipo Vehiculo</th>
            <th>Color</th>
            <th>Opciones</th>                               
        </thead>
        <tbody>
            @if(count($vehiculos)==0)
                <tr><td colspan="5" class="text-center">Sin registros</td></tr>
            @else
                @foreach($vehiculos as $vehiculo)
                    <tr>
                        <td>{{ $vehiculo->delito }}</td>
                        <td>{{ $vehiculo->marca }}</td>
                         <td>{{ $vehiculo->modelo }}</td>
                        <td>{{ $vehiculo->placas }}</td>   
                        <td>{{ $vehiculo->tipovehiculo }}</td>
                        <td>{{ $vehiculo->color }}</td>    
                         {{-- <a href="{{ url('agregar-abogado/'.$abogado->id.'/eliminar')}}" title="Eliminar Registro" class="btn btn-secondary ">
                        <i class="fa fa-times"></i></td>   --}}
                        <td> 
	                        @if(is_null(session('terminada')))
                            <a data-abogado-id={{$vehiculo->id}} title="Eliminar abogado" class="deleteBtn btn btn-secondary btn-simple btn-xs">
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