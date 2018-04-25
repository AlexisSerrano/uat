@extends('template.form')
@section('title', 'Actas de hechos')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			<nav class="navbar navbar-expand-lg navbar-light bg-light">
			  	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			    <span class="navbar-toggler-icon"></span>
			  	</button>
			  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
			    	<form class="form-inline my-2 my-lg-0" method="POST" action="{{ url('showbyfolio') }}">
			    		@csrf
			      		<input class="form-control mr-sm-2" type="text" name="folio" id="folio" placeholder="Buscar" aria-label="Buscar">
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
                        <th scope="col">Nombre</th>
						<th scope="col">Fiscal</th>
						<th scope="col">Editar</th>
			    	</tr>
			  	</thead>
			  	<tbody>
				@forelse($actas as $acta)
				<tr>
					<td>{{$acta->id}}</td>
					<td>UAT-XI/AH-{{$acta->folio}}/2018</td>
					<td>{{$acta->nombre}} {{$acta->primer_ap}} {{$acta->segundo_ap}}</td>
					<td>{{$acta->fiscal}}</td>
					<td>Editar</td>
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
</div>
@endsection