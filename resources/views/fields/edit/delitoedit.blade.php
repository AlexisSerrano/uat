<div class="row">
	<div class="col-8">
		@if(!empty($idCarpeta))
		{!! Form::hidden('idCarpeta', $idCarpeta) !!}
		@endif
		<div class="form-group">
			{!! Form::label('idDelito2', 'Delito', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('idDelito2', $delits, null, ['class' => 'form-control form-control-sm select2', 'placeholder' => 'Seleccione un delito', 'required', 'id'=>'idDelito2']) !!}
		</div>
	</div>
	<div class="col-sm-4">
			<div class="form-group">
				{!! Form::label('idAgrupacionD1', ' Primera desagregación', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idAgrupacionD1', ['placeholder'=>'Seleccione una desagregación'], null, ['class' => 'form-control form-control-sm select2', 'required']) !!}
			</div>
		</div>
		<div class="col-sm-4">
			<div class="form-group">
				{!! Form::label('idAgrupacionD2', ' Segunda desagregación', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('idAgrupacionD2', ['placeholder'=>'Seleccione una desagregación'], null, ['class' => 'form-control form-control-sm select2', 'required']) !!}
			</div>
		</div>
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('formaComisionD2', 'Forma de comisión', ['class' => 'col-form-label-sm']) !!}
			{!! Form::select('formaComisionD2', ['CULPOSO' => 'CULPOSO', 'DOLOSO' => 'DOLOSO'],  '$TipifDelito->formaComision', ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una forma de comisión', 'required']) !!}
		</div>
	</div>

{{-- 
	<div class="col-4">
		<div class="form-group">
			{!! Form::label('fecha2', 'Fecha', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="fechadeli" data-target-input="nearest">
				{!! Form::date('fecha2', null , ['class' => 'form-control form-control-sm', 'data-target' => '#fechadeli', 'required', 'placeholder' => 'DD/MM/AAAA', 'id'=>'fecha2']) !!}
				<span class="input-group-addon" data-target="#fechadeli">
					<div class="input-group-text"><i class="fa fa-calendar" aria-hidden="true"></i></div>
				</span>
			</div>
		</div>
	</div> --}}
	{{-- <div class="col-4">
		<div class="form-group">
			{!! Form::label('hora2', 'Hora', ['class' => 'col-form-label-sm']) !!}
			<div class="input-group date" id="horadeli" data-target-input="nearest">
				{!! Form::text('hora2',  'hora', ['class' => 'form-control form-control-sm', 'data-target' => '#horadeli', 'required', 'placeholder' => '00:00', 'id'=>'hora2']) !!}
				<div class="input-group-addon" data-target="#horadeli">
					<div class="input-group-text"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
				</div>
			</div>
		</div>
	</div> --}}
	<div class="col-4">
		{{-- <p class="col-form-label-sm">¿Con violencia?</p>
		<div class="form-group">
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conViolenciaD1" name="conViolenciaD" id="no" value="0" checked required>
					No
				</label>
			</div>
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conViolenciaD2" name="conViolenciaD" id="si" value="1">
					Sí
				</label>
			</div>
		</div> --}}
		<div class="form-group">

				{!! Form::label('Cviolencia', 'Con Violencia', ['class' => 'col-form-label-sm']) !!}
				{!! Form::select('Cviolencia', ['1' => 'SI', '0' => 'NO'], null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione si es con violencia', 'required']) !!}
				
				{{-- <label class="col-form-label col-form-label-sm">¿Con Violencia?</label>
				<div class="clearfix"></div>
				<div id="valor" class="form-check form-check-inline">
					<label class="form-check-label col-form-label col-form-label-sm">
						<input class="form-check-input" type="radio" id="conViolenciaD1" name="conViolenciaD" value="1" required> Sí
					</label>
				</div>
				<div class="form-check form-check-inline">
					<label class="form-check-label col-form-label col-form-label-sm">
						<input class="form-check-input" type="radio" id="conViolenciaD2" name="conViolenciaD" value="0"> No
					</label>
				</div> --}}
		
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