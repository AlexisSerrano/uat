	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
				
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
				  </button>
				  
			  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
					  
			    	<form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('filtro') }}">
						@csrf
						
						
						  <input class="form-control mr-sm-2" type="text" name="filtro" id="filtro" placeholder="Buscar" aria-label="Buscar">
						  
						  <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
							
						
					
			    	</form>
				  </div>
				  <a href="{{url('lista-oficios')}}"><button class="btn btn-outline-secondary my-2 my-sm-0" type="button">Todos</button></a>
			</nav>
		</div>
		<div class="col-12">
			<table class="table table-striped table-bordered table-hover" >
			 	<thead class="thead-active"style="text-align:center;">
			    	<tr>
			      		<th scope="col">Folio</th>
                        <th scope="col">Nombre</th>
						<th scope="col">Fiscal</th>
						<th scope="col">Descargar</th>
			    	</tr>
			  	</thead>
			  	<tbody>
				@forelse($actas as $acta)
				<tr>
					<td>UAT-XI/AH-{{$acta->folio}}/{{$year}}</td>
					<td>{{$acta->nombre}} {{$acta->primer_ap}} {{$acta->segundo_ap}}</td>
					<td>{{$acta->fiscal}}</td>
					<td style="text-align:center;"><a href='{{url("actaoficio/$acta->id")}}'><button class="btn btn-secondary"><i class="fa fa-download"></i></button></a></td>
				</tr>
				@empty
				@endforelse
			  	</tbody>
			</table>
		</div>
		<div class="mt-2 mx-auto">
				{{ $actas->links() }}
		</div>	
	</div>
