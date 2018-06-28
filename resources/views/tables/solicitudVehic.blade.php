<div class="card">
	<div class="card-header">
		<h6>Solicitudes/Vehiculos</h6>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>Victima/Ofendido</th>
                <th>Fecha de solicitud</th> 
				<th>Marca</th> 
                <th>Modelo</th>
                <th>Placas</th>  
                <th>Color</th>
				<th>Estatus</th>
				<th>Respuesta</th>
		
			</thead>
			<tbody>
					@if(count($solicitudV)==0)
					<tr><td colspan="8" class="text-center">Sin registros</td></tr>
				@else
					@foreach($solicitudV as $solicitudV1)
						<tr>

							
							
							
							<td>{{ $solicitudV1->nombre." ".$solicitudV1->primerAp." ".$solicitudV1->segundoAp }}</td>
                            <td>{{ $solicitudV1->fecha }}</td>
                            <td>{{ $solicitudV1->marca }}</td>
                            <td>{{ $solicitudV1->modelo }}</td>
                            <td>{{ $solicitudV1->placas }}</td>
                            <td>{{ $solicitudV1->color }}</td>
							<td class="recibido"><i class="fa fa-circle"></i> <span class="recibido">Recibido</span></td>
							<td>Sin respuesta</td> 
						
						</tr>
						@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
				