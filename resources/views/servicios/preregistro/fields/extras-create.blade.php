<div class="col-4" align="center">
	<div class="form-group">
		<label class="col-form-label col-form-label-sm"  for="formGroupExampleInput">¿Con violencia?</label>
		<div class="clearfix"></div>
			<div class="form-check form-check-inline">
				<label class="form-check-label col-form-label col-form-label-sm">
					<input class="form-check-input" type="radio" id="conViolencia" name="Violencia" value="1"> Sí
				</label>
			</div>
		<div class="form-check form-check-inline">
			<label class="form-check-label col-form-label col-form-label-sm">
				<input class="form-check-input" type="radio" id="sinViolencia" name="Violencia" value="0"> No
			</label>
		</div>
	</div>
</div>
<div class="col-4">
	<div class="form-group">
		{!! Form::label('idRazon', 'Razón:', ['class' => 'col-form-label-sm']) !!}
		{!! Form::select('idRazon', $razones, null, ['class' => 'form-control form-control-sm', 'placeholder' => 'Seleccione una razón', 'required']) !!}
	</div>
</div>