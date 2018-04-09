
		<div class="col-md-4 mb-3">
		<label class="col-form-labe "  for="formGroupExampleInput" >¿Es empresa?</label>
		<div class="clearfix"></div>
		<div class="form-check form-check-inline">
			<label class="form-check-label" for="">
				@if(isset($form['esEmpresa1']))
				<input class="form-check-input" type="radio" id="esEmpresa1" name="esEmpresa" value="1" {{$form['esEmpresa1']}}> Sí
				@else
				<input class="form-check-input" type="radio" id="esEmpresa1" name="esEmpresa" value="1"> Sí
				@endif
			</label>
		</div>
		<div class="form-check form-check-inline">
			<label class="form-check-label col-form-label col-form-label-sm">
				@if(isset($form['esEmpresa2']))
				<input class="form-check-input" type="radio" id="esEmpresa2" name="esEmpresa" value="0" {{$form['esEmpresa2']}}> No
				@else
				<input class="form-check-input" type="radio" id="esEmpresa2" name="esEmpresa" value="0"> No
				@endif
			</label>
		</div>
		<div class="invalid-feedback">
			Debes seleccionar alguno.
		</div>
	</div>


		
	