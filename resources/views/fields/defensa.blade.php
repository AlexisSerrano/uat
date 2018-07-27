<div class="row">
	<input type="hidden" name="idCarpeta" name="idCarpeta" value="{{session('carpeta')}}">
	<div class="col-6">
		<div class="form-group">
			{!! Form::label('idAbogado', 'Abogado', ['class' => 'col-form-label-sm']) !!}
			<select name="idAbogado" id="idAbogado" class="form-control form-control-sm" required>
				<option value="">Seleccione un abogado</option>
				@foreach($abogados as $abogado)
				<option value="{{ $abogado->idAparicion }}">{{ $abogado->nombres." ".$abogado->primerAp." ".$abogado->segundoAp ." (".$abogado->tipo .")" }}</option>
				@endforeach
			</select>
		</div>
	</div>
	<div class="col-6">
		<div class="form-group">
			{!! Form::label('idInvolucrado', 'Involucrado', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idInvolucrado', [''=>'Seleccione un involucrado'], null, ['class' => 'form-control form-control-sm','data-validation'=>'required']) !!}
		</div>
	</div>
</div>