@extends('template.main')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light" id="navbarpredenuncia">
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  	</button>
			  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    	<ul class="navbar-nav mr-auto" style="margin-left: -20px;">
			      		<li class="nav-item active">
			        	<a class="nav-link" href="{{url('predenuncias')}}">
			        		<button class="btn btn-outline-secondary">Todos</button>
			        	</a>
			      		</li>
			      		<li class="nav-item" style="margin-left: -10px;">
			        		<a class="nav-link" href="{{url('encola')}}">
			        			<button class="btn btn-outline-secondary">En cola</button>
			        		</a>
			      		</li>
			      		<li class="nav-item" style="margin-left: -10px;">
			        		<a class="nav-link" href="{{url('urgentes')}}">
			        			<button class="btn btn-outline-secondary">Urgentes</button>
			        		</a>
			      		</li>
			      		<li class="nav-item" style="margin-left: -10px;">
			        		<a class="nav-link" href="{{url('recepcionista')}}">
			        			<button class="btn btn-outline-secondary">Agregar</button>
			        		</a>
			      		</li>
			      		<li class="nav-item">
			        		<select class="form-control" id="filmunicipio" name="filmunicipio">
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
			    	</ul>
			    	<form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('showbyfolio') }}" id="busquedafolio">
			    		@csrf
			      		<input class="form-control mr-sm-2 col-8" type="text" name="folio" id="folio" placeholder="Buscar" aria-label="Buscar">
			      		<button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Buscar</button>
			    	</form>
			  	</div>
			</nav>
		</div>
		<div class="col-12">
			<table class="table table-striped table-bordered table-hover">
			 	<thead class="thead-active">
			    	<tr>
			    		<th scope="col">Id</th>
			      		<th scope="col">Folio</th>
			      		<th scope="col">Tipo</th>
			      		<th scope="col">Nombre</th>
			      		<th scope="col">Identificación</th>
			      		<th scope="col">Validar</th>
			    	</tr>
			  	</thead>
			  	<tbody>
			  		@forelse($registros as $registro)
			  		<tr>
			  			<th scope="row">{{$registro->id}}</th>
			      		<td>{{$registro->folio}}</th>
			      		<td>{{($registro->esEmpresa==0)?'Fisica':'Moral'}}</td>
			      		<td>{{($registro->esEmpresa==0)?$registro->nombre.' '.$registro->primerAp.' '.$registro->segundoAp:$registro->representanteLegal}}</td>
			      		<td>{{$registro->docIdentificacion}}</td>
			      		<td><a href="{{url("predenuncias/".$registro->id."/edit")}}"><img src="{{asset('img/check3.png')}}" alt=""></a></td>
			    	</tr>
					@empty

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