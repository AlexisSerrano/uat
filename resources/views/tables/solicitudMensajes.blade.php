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
					@if(count($soliMensaje)==0)
					<tr><td colspan="4" class="text-center">Sin registros</td></tr>
				@else
					@foreach($soliMensaje as $soliMensaje1)
						<tr>

							
							
							
							<td>{{ $soliMensaje1->nombre." ".$soliMensaje1->primerAp." ".$soliMensaje1->segundoAp }}</td>
							<td>{{ $soliMensaje1->fecha }}</td>
							<td class="recibido"><i class="fa fa-circle"></i> <span class="recibido">Recibido</span></td>
							<td>Sin respuesta</td> 
						
						</tr>
						@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>