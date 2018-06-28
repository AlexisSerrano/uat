@extends('template.form')
@if ($status==0)
	@section('title', 'Registros en cola')
@else
	@section('title', 'Registros urgentes')
{{-- @else
	@if($status=x)
	@section('title','Registros ausentes') --}}
@endif
@section('content')
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
					<div class=" input-group col-4 text-right">
						<div class="input-group-prepend">
							<button class="input-group-text" id="basic-addon1"><i class="fa fa-search" aria-hidden="true"></i></button>
						</div>
						<input type="text" id="folio" name="folio" class="form-control" placeholder="buscar" aria-describedby="basic-addon1">
						
					</div>
				</div>
			{!!Form::close()!!}	
		</div>
		<br>
		<br>
		<br>
		<div class="col-12">
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
			      		<td><a class="btn btn-primary" href="{{url("predenuncias/".$registro->id."/edit")}}"><i class="fa fa-check" aria-hidden="true"></i></a></td>
			    	</tr>
					@empty
					<tr>
						<td style="text-align:center;" colspan="7">Sin Registros</th>
					</tr>
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