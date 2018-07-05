
		<div class="col-md-4 mb-3">
		<label class="col-form-labe "  for="formGroupExampleInput" >Tipo de persona</label>
		<div class="clearfix"></div>
		<div class="form-check form-check-inline">
			<label class="form-check-label">
				{{-- @if(isset($form['esEmpresa1']))
				<input class="form-check-input" type="radio" id="esEmpresa1" name="esEmpresa" value="1" {{$form['esEmpresa1']}}> Persona moral
				@else --}}
				<input class="form-check-input" type="radio" id="esEmpresa1" name="esEmpresa" value="1"> Persona moral
				{{-- @endif --}}
			</label>
		</div>
		<div class="form-check form-check-inline">
			<label class="form-check-label">
				{{-- @if(isset($form['esEmpresa2']))
				<input class="form-check-input" type="radio" id="esEmpresa2" name="esEmpresa" value="0" {{$form['esEmpresa2']}}> Persona física
				@else --}}
				<input class="form-check-input" type="radio" id="esEmpresa2" name="esEmpresa" value="0"> Persona física
				{{-- @endif --}}
			</label>
		</div>
		<div class="invalid-feedback">
			Debes seleccionar alguno.
		</div>
	</div>


		
	