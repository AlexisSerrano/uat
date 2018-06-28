<div class="card">
	<div class="card-header">
		<h6>Solicitudes/Lesiones</h6>
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
					@if(count($soliLesiones)==0)
					<tr><td colspan="4" class="text-center">Sin registros</td></tr>
				@else
					@foreach($soliLesiones as $soliLesiones1)
						<tr>

							
							
							
							<td>{{ $soliLesiones1->nombre." ".$soliLesiones1->primerAp." ".$soliLesiones1->segundoAp }}</td>
							<td>{{ $soliLesiones1->fecha }}</td>
							<td class="pendiente"><i class="fa fa-circle"></i> <span class="pendiente">Pendiente</span></td>
							<td>Sin respuesta</td> 
						
						</tr>
						@endforeach
				@endif
			</tbody>
		</table>
	</div>
</div>