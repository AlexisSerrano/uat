@extends('template.form')
@section('title','Pre-registros')
@section('content')
	<div class="row">
		<div class="col-12">
				<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarpredenuncia">
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					  <span class="navbar-toggler-icon"></span>
						</button>
						
						
	  
						<div class="collapse navbar-collapse" id="navbarSupportedContent">
	  
							  
						  <ul class="navbar-nav mr-auto" style="margin-left: -8px;">
							  <LI>
									  <form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('showbyfolio') }}" id="busquedafolio">
											  @csrf
									  <div class="input-group mb-6">
											  
											  <div class="input-group-prepend">
											  
												<span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
											  
											  </div>
											  <input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1" name="folio" id="folio">
											</div>	
							  </LI>
							  <li>
								  <button class="btn btn-secondary" style="margin-left: 10px;">Todos
									  <a   href="{{url('registros')}}"></a>
								  </button>
							  </li>
						  </ul>
					  </form>
						  {{-- 
							  
											  
												<input class="form-control mr-sm-2 col-8" type="text" name="folio" id="folio" placeholder="Buscar" aria-label="Buscar">
												<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
										  {{-- --}}
							  
							  
							  <ul class="navbar-nav mr-auto" style="margin-left: 440px;">
								<li class="nav-item" style="margin-left: 30px;">
										<select class="form-control" id="filfiscal" name="filfiscal">
												@forelse($municipios as $municipio)
													@if(isset($idMunicipioSelect))
														@if($municipio->id==$idMunicipioSelect)
														<option value="{{$municipio->id}}" selected>{{$municipio->nombre}}</option>
														@else
														<option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
														@endif
													@else
														<option value="{{$municipio->id}}">{{$municipio->nombre}}</option>
													@endif	
												@empty
												@endforelse
											</select>
								</li> 
						  
						  
						</div>
				  </nav>
		
		<br>
			<div class="card">
			<table class="table table-hover">
			 	<thead class="thead-light">
			    	<tr>
			    		<th scope="col">Id</th>
			      		<th scope="col">Folio</th>
			      		<th scope="col">Tipo</th>
			      		<th scope="col">Nombre</th>
						  <th scope="col">Identificación</th>
						  <th scope="col">Razón</th>
			      		<th scope="col">Ver</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			  		@forelse($registros as $registro)
			  		<tr>
			  			<th scope="row">{{$registro->id}}</th>
			      		<td>{{$registro->folio}}</th>
			      		<td>{{($registro->esEmpresa==0)?'FISICA':'MORAL'}}</td>
			      		<td>{{($registro->esEmpresa==0)?$registro->nombre.' '.$registro->primerAp.' '.$registro->segundoAp:$registro->representanteLegal}}</td>
						  <td>{{$registro->docIdentificacion}}</td>
						  <td>{{$registro->razon}}</td>
			      		<td><a class="btn btn-secondary" href="{{url("registros/".$registro->id."/edit")}}"><i class="fa fa-check" aria-hidden="true"></i></a></td>
			    	</tr>
					@empty
					<tr><td colspan="7" class="text-center">Sin registros</td></tr>					
			  		@endforelse
			  	</tbody>
			</table>
		</div>
		<div class="mt-2 mx-auto">
			@if(count($registros))
			{{ $registros->links() }}
			@endif
		</div>	
	</div>
	
</div>
@endsection