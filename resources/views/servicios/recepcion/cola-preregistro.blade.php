@extends('template.form')
@if ($status==0)
@section('title', 'Registros en cola')
@else
@section('title', 'Registros urgentes')
@endif
@section('content')
	<div class="row">
		<div class="col-12">
				
			
		
			  	{{-- <div class="collapse navbar-collapse" id="navbarSupportedContent"> --}}
			    	{{-- <ul class="navbar-nav mr-auto">
			      		<li class="nav-item active">
			        	<a class="nav-link" href="{{url('predenuncias')}}">
			        		<button class="btn btn-outline-secondary">Todos</button>
			        	</a>
			      		</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="{{url('encola')}}">
			        			<button class="btn btn-outline-secondary">En cola</button>
			        		</a>
			      		</li>
			      		<li class="nav-item">
			        		<a class="nav-link" href="{{url('urgentes')}}">
			        			<button class="btn btn-outline-secondary">Urgentes</button>
			        		</a>
			      		</li>
			    	</ul> --}}
			    	<form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('showbyfolio') }}">
						@csrf
						<div class="input-group mb-8">		
								<div class="input-group-prepend">
								  <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></span>
								</div>
								<input type="text" class="form-control" placeholder="Buscar" aria-label="Buscar" aria-describedby="basic-addon1" name="folio" id="folio">
							  </div>	
			    	</form>
			  
			<br>
					<div class="card">
		
		{{-- <div class="col-12"> --}}
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
			      		<td> <button class="btn btn-primary">
								<a href="{{url("predenuncias/".$registro->id."/edit")}}">
									<i style="color:white" class="fa fa-check" aria-hidden="true"></i></a></button>
						</td>


						  
							  
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
{{-- </div> --}}
@endsection