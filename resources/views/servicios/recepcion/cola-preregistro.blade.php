@extends('template.form')
@if ($status==0)
	@section('title', 'Registros en cola')
@else
	@section('title', 'Registros urgentes')
@endif
@section('content')
<div class="container">
	<div class="row">
		<div class="col-12">
			{!! Form::open(['route' => 'prioridadpreregistrofiltro', 'method' => 'POST'])  !!}
			@csrf
			@if ($status==0)
				<input type="hidden" name="tipo" id="tipo" value=0>
			@else
				<input type="hidden" name="tipo" id="tipo" value=1>
			@endif
				<div class="row">
					<div class="col-4 text-right">
						<div class="input-group">
							<input type="text" id="folio" name="folio" class="form-control" placeholder="buscar">
							<span class="input-group-btn">
								<button type="submit" class="btn btn-secondary"><i class="fa fa-search" aria-hidden="true"></i></button>
							</span>
						</div>
					</div>
				</div>
			{!!Form::close()!!}	
		</div>
		<br><br>
		<div class="col-12">
			<table class="table table-striped table-bordered table-hover">
			 	<thead class="thead-active">
			    	<tr>
			    		<th scope="col">Id</th>
			      		<th scope="col">Folio</th>
			      		<th scope="col">Tipo</th>
			      		<th scope="col">Nombre</th>
						<th scope="col">Identificación</th>
						<th scope="col">Razón</th>
			      		<th scope="col">Validar</th>
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
			      		<td><a href="{{url("predenuncias/".$registro->id."/edit")}}"><i class="fa fa-check-square-o" aria-hidden="true"></i></a></td>
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