<div class="row">
	<div class="col-8">
		@if(!empty($idCarpeta))
		{!! Form::hidden('idCarpeta', $idCarpeta) !!}
		@endif
		<div class="form-group">
			{!! Form::label('idDelito', 'Delito', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idDelito', $delits, null, ['class' => 'delito form-control form-control-sm select2', 'placeholder' => 'Seleccione un delito', 'required']) !!}
		</div>
	</div>

	<div class="col-sm-4">
			<div class="form-group">
				{!! Form::label('idAgrupacion1', ' Primera Desagregación', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idAgrupacion1', ['placeholder'=>'Seleccione una desagregación'], null, ['class' => 'form-control form-control-sm select2', 'required']) !!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				{!! Form::label('idAgrupacion2', ' Segunda Desagregación', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idAgrupacion2', ['placeholder'=>'Seleccione una desagregación'], null, ['class' => 'form-control form-control-sm select2', 'required']) !!}
			</div>
		</div>


	<div class="col-4">
		<div class="form-group">
			{!! Form::label('formaComision', 'Forma de comisión', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('formaComision', ['CULPOSO' => 'CULPOSO', 'DOLOSO' => 'DOLOSO'], null, ['class' => 'delito form-control form-control-sm', 'placeholder' => 'Seleccione una forma de comisión', 'required']) !!}
		</div>
	</div>

	<div class="col-4">
		<div class="form-group">
			{!! Form::label('fecha', 'Fecha', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="fechadelit" data-target-input="nearest">
				{!! Form::date('fecha', date("Y-m-d"), ['class' => 'delito form-control form-control-sm', 'max'=>date("Y-m-d"), 'required']) !!}
				
			</div>
		</div>
	</div>
	
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('hora', 'Hora', ['class' => 'col-form-label-sm']) !!}
			{!! Form::time('hora', date('h:i'), ['class' => 'delito form-control form-control-sm', 'data-target' => '#fechadelit', 'required', 'placeholder' => 'DD/MM/AAAA']) !!}
				
			{{-- <div class="input-group date" id="horadelit" data-target-input="nearest">
				{!! Form::text('hora', null, ['class' => 'delito form-control form-control-sm datetimepicker-input', 'data-target' => '#horadelit', 'required', 'placeholder' => '00:00']) !!}
				<div class="input-group-addon" data-target="#horadelit" data-toggle="datetimepicker">
					<div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
				</div>
			</div> --}}
		</div>
	</div>
	<div class="col-4">
		<p class="col-form-label-sm">¿Con violencia?</p>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conViolencia1" name="conViolencia" id="no" value="0" checked required>
					No
				</label>
			</div>
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conViolencia2" name="conViolencia" id="si" value="1">
					Sí
				</label>
			</div>
		</div>
	</div>
	
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('idModalidad', 'Modalidad', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idModalidad', $modalidades, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una modalidad', 'required']) !!}
		</div>
	</div> --}}
	
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('consumacion', 'Consumación', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('consumacion', ['INSTANTÁNEA' => 'INSTANTÁNEA', 'PERMANENTE' => 'PERMANENTE'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una forma de consumación', 'required']) !!}
		</div>
	</div> --}}
</div>

