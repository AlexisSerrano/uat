<div class="card">
	<div class="card-header">
		<h6>Solicitudes/Psicologo</h6>
	</div>
	<div class="table-responsive">
		<table class="table table-hover">
			<thead>
				<th>Victima/Ofendido</th>
				<th>Fecha de solicitud</th>  
				<th>Estatus</th>
				<th>Respuesta</th>
		
			</thead>
			<tbody>
					@if(count($psicoSolicitud)==0)
					<tr><td colspan="4" class="text-center">Sin registros</td></tr>
				@else
					@foreach($psicoSolicitud as $psicoSolicitud1)
						<tr>

							
							
							
							<td>{{ $psicoSolicitud1->nombre." ".$psicoSolicitud1->primerAp." ".$psicoSolicitud1->segundoAp }}</td>
							<td>{{ $psicoSolicitud1->fecha }}</td>
							<td class="recibido"><i class="fa fa-circle"></i> <span class="recibido">Recibido</span></td>
							<td>Sin respuesta</td> 
						
						</tr>
						@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>
				
			
